<?php

namespace App\Http\Controllers\Admin;

use App\Models\Membership;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['memberships']   = Membership::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.memberships.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.memberships.create');
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
            'description'   => 'required',
            'price'         => 'required',
            'duration'         => 'required',
        ]);

        $membership = new Membership();
        $membership->name          = $request->name;
        $membership->description   = $request->description;
        $membership->price         = $request->price;
        $membership->duration      = $request->duration;

        if ($request->hasFile("image") && $request->file('image')->isValid()) {
            $filename           = $request->file('image')->getClientOriginalName();
            $filename           = time()."-".$filename;
            $destinationPath    = public_path('/images');
            $membership->badge  = "images/".$filename;
            $request->file('image')->move($destinationPath, $filename);
        }

        $response               = $membership->save();

        if ($response){
            return redirect()->route('admin.memberships.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function show(Membership $membership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function edit(Membership $membership)
    {
        $data['membership'] = $membership;
        return view('admin.memberships.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Membership $membership)
    {
        $request->validate([
            'name'          => 'required',
            'description'   => 'required',
            'price'         => 'required',
            'duration'         => 'required',
        ]);

        $membership = new Membership();
        $membership->name          = $request->name;
        $membership->description   = $request->description;
        $membership->price         = $request->price;
        $membership->duration      = $request->duration;

        if ($request->hasFile("image") && $request->file('image')->isValid()) {
            $filename           = $request->file('image')->getClientOriginalName();
            $filename           = time()."-".$filename;
            $destinationPath    = public_path('/images');
            $membership->badge  = "images/".$filename;
            $request->file('image')->move($destinationPath, $filename);
        }

        $response               = $membership->save();

        if ($response){
            return redirect()->route('admin.memberships.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Membership  $membership
     * @return \Illuminate\Http\Response
     */
    public function destroy(Membership $membership)
    {
        //
    }
}
