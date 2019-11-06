<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Test;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['tests'] = Test::with('types')->with('levels')->orderBy('name', 'asc')->paginate(10);
        return view('admin.test.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['levels'] = Level::where('active', 1)->get();
        $data['types'] = Type::where('active', 1)->get();
        return view('admin.test.create', $data);
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
            'deadline'      => 'required',
        ]);

        $data = [
            'name'          => $request->name,
            'type_id'       => $request->type,
            'fee'           => $request->fee,
            'description'   => $request->description,
            'level_id'      => $request->level,
            'active'        => $request->active,
            'deadline'      => $request->deadline

        ];

        $response = Test::create($data);

        if ($response){
            return redirect()->route('admin.test.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        $data['test'] = $test;
        return view('admin.test.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        $data['levels'] = Level::where('active', 1)->get();
        $data['types'] = Type::where('active', 1)->get();
        $data['test']   = $test;
        return view('admin.test.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Test $test)
    {
        $request->validate([
            'name'          => 'required',
            'type'          => 'required',
            'description'   => 'required',
            'level'         => 'required',
            'active'        => 'required',
            'deadline'      => 'required',
        ]);


            $test->name          = $request->name;
            $test->type_id       = $request->type;
            $test->fee           = $request->fee;
            $test->description   = $request->description;
            $test->level_id      = $request->level;
            $test->active        = $request->active;
            $test->deadline      = $request->deadline;

        $response = $test->save();

        if ($response){
            return redirect()->route('admin.test.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        $test->active   = $test->active == 0 ? 1 : 0;
        $response       = $test->save();

        if ($response){
            return redirect()->back()->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }
}
