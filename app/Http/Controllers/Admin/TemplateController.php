<?php

namespace App\Http\Controllers\Admin;

use App\Models\Template;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['templates'] = Template::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.templates.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.templates.create');
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
            'body'         => 'required',
        ]);

        $data = [
            'name'          => $request->name,
            'body'         => $request->body,
        ];
        $response = Template::create($data);
        if ($response){
            return redirect()->route('admin.templates.index')->with("success", "Successfully Completed.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        $data['templates'] = $template;
        return view('admin.templates.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        $data['templates'] = $template;
        return view('admin.templates.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Template $template)
    {
        $request->validate([
            'name'          => 'required',
            'body'         => 'required',
        ]);

        $template->name          = $request->name;
        $template->body         = $request->body;
        $response = $template->save();
        if ($response){
            return redirect()->route('admin.templates.index')->with("success", "Successfully Completed.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        $template->active    = $template->active == 0 ? 1 : 0;
        $response            = $template->save();

        if ($response){
            return redirect()->route('admin.templates.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }
}
