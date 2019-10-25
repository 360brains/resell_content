<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Test;
use App\Models\Training;
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
        $data['trainings'] = Training::with('types')->with('levels')->orderBy('name', 'asc')->paginate(10);
        return view('admin.trainings.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['levels'] = Level::get();
        $data['types'] = Type::get();
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
            'name'          => 'required',
            'type'          => 'required',
            'description'   => 'required',
            'level'         => 'required',
            'active'        => 'required',
        ]);

        $data = [
            'name'          => $request->name,
            'type_id'       => $request->type,
            'fee'           => $request->fee,
            'description'   => $request->description,
            'level_id'      => $request->level,
            'active'        => $request->active
        ];

        $response = Training::create($data);

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
        $data['levels'] = Level::get();
        $data['types'] = Type::get();
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
            'level'         => 'required',
            'active'        => 'required',
        ]);
        $training->name          = $request->name;
        $training->type_id       = $request->type;
        $training->fee           = $request->fee;
        $training->description   = $request->description;
        $training->level_id      = $request->level;
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
