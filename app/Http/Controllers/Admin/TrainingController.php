<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Test;
use App\Models\Training;
use App\Models\TrainingList;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['trainings'] = Training::with('types')->orderBy('name', 'asc')->paginate(10);
        return view('admin.trainings.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['types'] = Type::where('active', 1)->get();
        return view('admin.trainings.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'description' => 'required',
            'active' => 'required',
            'zip' => 'required|mimes:zip,rar',
            'image' => 'required|mimes:jpg,jpeg,png',
        ]);
//        if ($request->hasFile("zip") && $request->file('zip')->isValid()) {
//            $filename           = $request->file('zip')->getClientOriginalName();
//            $filename           = time()."-".$filename;
//            $destinationPath    = public_path('/trainings');
//            $name               = "trainings/".$filename;
//            $request->file('zip')->move($destinationPath, $filename);
//
//            $Path               = public_path("trainings/".$filename);
//    }
        if ($request->hasFile("image") && $request->file('image')->isValid()) {
            $imgFilename           = $request->file('image')->getClientOriginalName();
            $imgFilename           = time()."-".$imgFilename;
            $imgDestinationPath    = public_path('/images');
            $imgName               = "images/".$imgFilename;
            $request->file('image')->move($imgDestinationPath, $imgFilename);
        }
        $data = [
            'name'          => $request->name,
            'type_id'       => $request->type,
            'fee'           => $request->fee,
            'description'   => $request->description,
            'active'        => $request->active,
//            'material'      => $name,
            'avatar'        => $imgName
        ];
        $response = Training::create($data);
        $id       = $response->id;
        if ($request->hasFile("zip") && $request->file('zip')->isValid()) {
            $folder = public_path('../public/trainings/' . $id . '/');

    if (!\Storage::exists($folder)) {
        \Storage::makeDirectory($folder, 0775, true, true);
    }
            \Zipper::make($request->file('zip'))->extractTo($folder);
            $logFiles = \Zipper::make($request->file('zip'))->listFiles();

            foreach ($logFiles as $filesname){
                $filesave = [
                    'name'          => $filesname,
                    'training_id'   => $id,
                ];
                TrainingList::create($filesave);
            }
        }
        if ($response){
            return redirect()->route('admin.trainings.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function show(Training $training)
    {
        $data['trainings'] = $training;
        return view('admin.trainings.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function edit(Training $training)
    {
        $data['types'] = Type::where('active', 1)->get();
        $data['trainings']   = $training;
        return view('admin.trainings.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Training $training)
    {
        $request->validate([
            'name'          => 'required',
            'type'          => 'required',
            'fee'           => 'required',
            'description'   => 'required',
            'active'        => 'required',
        ]);
        $training->name          = $request->name;
        $training->type_id       = $request->type;
        $training->fee           = $request->fee;
        $training->description   = $request->description;
        $training->active        = $request->active;
        $response = $training->save();
        if ($response){
            return redirect()->route('admin.trainings.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Training  $training
     * @return \Illuminate\Http\Response
     */
    public function destroy(Training $training)
    {
        $training->active  = $training->active == 0 ? 1 : 0;
        $response       = $training->save();

        if ($response){
            return redirect()->route('admin.trainings.index')->with("success", "Completed Successfully.");
        }
        else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }
}
