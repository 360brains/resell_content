<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Category;
use App\Models\Type;
use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['projects'] = Project::orderBy('name', 'asc')->paginate(10);
        return view('admin.projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['types']      = Type::get();
        $data['categories'] = Category::get();
        $data['levels']     = Level::get();
        return view("admin.projects.create", $data);
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
        ]);

        $data = [
        'name'         => $request->name,
        'quantity'     => $request->quantity,
        'type_id'      => $request->type,
        'deadline'     => $request->deadline,
        'category_id'  => $request->category,
        'level_id'     => $request->level,
        'description'  => $request->description,
        'active'       => $request->active,
        ];

        $response = Project::create($data);

        if ($response){
            return redirect()->route('admin.projects.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $data['project'] = $project;
        return view('admin.projects.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $data['types']      = Type::get();
        $data['categories'] = Category::get();
        $data['levels']     = Level::get();
        $data['project']    = $project;
        return view('admin.projects.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name'          => 'required',
            'type'          => 'required',
            'description'   => 'required',
            'level'         => 'required',
        ]);

        $data = [
            'name'         => $request->name,
            'quantity'     => $request->quantity,
            'type_id'      => $request->type,
            'deadline'     => $request->deadline,
            'category_id'  => $request->category,
            'level_id'     => $request->level,
            'description'  => $request->description,
            'active'       => $request->active,
        ];

        $response = $project->update($data);

        if ($response){
            return redirect()->route('admin.projects.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->active    = $project->active == 0 ? 1 : 0;
        $response           = $project->save();

        if ($response){
            return redirect()->back()->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }
}
