<?php

namespace App\Http\Controllers\Admin;

use App\Models\Task;
use App\Models\Transaction;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::orderBy('name', 'asc')->paginate(10);
        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create");
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
            'name'           => 'required',
            'email'          => 'required',
            'password'       => 'required',
        ]);

        $data = [
            'name'         => $request->name,
            'email'        => $request->email,
            'password'     => bcrypt($request->password),
            'gender'       => $request->gender,
            'contact'      => $request->contact,
            'active'       => $request->active,
        ];

        $response = User::create($data);

        if ($response){
            return redirect()->route('admin.users.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['transactions'] = Transaction::where('user_id', $id)->paginate(10);
        $data['tasks']        = Task::where('user_id', $id)->paginate(10);
        $tasks  = Task::where('user_id', $id)->where('status', 'approved')->get();
        $data['user'] = User::find($id);
        $totalEarned = 0;

        foreach ($tasks as $task){
            $totalEarned = $totalEarned + $task->project->price;
        }
        $data['totalEarned'] = $totalEarned;

        return view("admin.users.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['users'] = User::find($id);
        return view('admin.users.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'           => 'required',
            'email'          => 'required',
        ]);

        $data = [
            'name'         => $request->name,
            'email'        => $request->email,
            'gender'       => $request->gender,
            'contact'      => $request->contact,
            'active'       => $request->active,
        ];
        if ($request->password){
            $data['password']  = bcrypt($request->password);
            }

        $response = User::find($id)->update($data);

        if ($response){
            return redirect()->route('admin.users.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user           = User::find($id);
        $user->active     = $user->active == 0 ? 1 : 0;
        $response       = $user->save();

        if ($response){
            return redirect()->route('admin.users.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }

    public function addToSpecial(Request $request, $id)
    {
        $user           = User::find($id);

        if ($request->action == 'special'){
            $user->special  = 1;
            $response       = $user->save();
        }
        elseif ($request->action == 'non-special'){
            $user->special  = 0;
            $response       = $user->save();
        }


        if ($response){
            return redirect()->back()->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }
}
