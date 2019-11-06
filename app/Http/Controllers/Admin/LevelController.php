<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['levels'] = Level::where('active', 1)->orderBy('min_points', 'asc')->paginate(10);
        return view('admin.levels.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.levels.create");
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
            'min_points'    => 'required',
            'max_points'    => 'required',
            'active'        => 'required',
        ]);

        $data = [
            'name'          => $request->name,
            'min_points'    => $request->min_points,
            'max_points'    => $request->max_points,
            'description'   => $request->description,
            'active'        => $request->active,
        ];

        $response = Level::create($data);

        if ($response){
            return redirect()->route('admin.levels.index')->with("success", "Successfully Completed.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        $data['level'] = $level;
        return view('admin.levels.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit(Level $level)
    {
        $data['level'] = $level;
        return view('admin.levels.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        $request->validate([
            'name'          => 'required',
            'min_points'    => 'required',
            'max_points'    => 'required',
            'active'        => 'required',
        ]);
            $level->name          = $request->name;
            $level->min_points    = $request->min_points;
            $level->max_points    = $request->max_points;
            $level->description   = $request->description;
            $level->active        = $request->active;

        $response = $level->save();
//        dd($level);

        if ($response){
            return redirect()->route('admin.levels.index')->with("success", "Successfully Completed.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy(Level $level)
    {

        $level->active  = $level->active == 0 ? 1 : 0;
        $response       = $level->save();

        if ($response){
            return redirect()->route('admin.levels.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }
}
