<?php

namespace App\Http\Controllers\Admin;

use App\Models\Test;
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
        return view('admin.tests.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tests.create');
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
            'fee'           => 'required',
            'description'   => 'required',
            'level_id'      => 'required',
        ]);

        $data = [
            'name'          => $request->name,
            'type'          => $request->type,
            'fee'           => $request->fee,
            'description'   => $request->description,
            'level_id'      => $request->level,
        ];

        $response = Test::create($data);

        if ($response){
            return redirect()->route('admin.tests.index')->with("success", "Category created successfully.");
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        $data['test']   = $test;
        return view('admin.tests.edit', $data);
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
            'fee'           => 'required',
            'description'   => 'required',
            'level_id'      => 'required',
        ]);

        $data = [
            'name'          => $request->name,
            'type'          => $request->type,
            'fee'           => $request->fee,
            'description'   => $request->description,
            'level_id'      => $request->level,
        ];

        $response = Test::update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Test  $test
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {
        //
    }
}
