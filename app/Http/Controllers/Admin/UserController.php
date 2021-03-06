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
        return view('admin.users.index');
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

        if ($response) {
            return redirect()->route('admin.users.index')->with("success", "Completed Successfully.");
        } else {
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
        $tasks                = Task::where('user_id', $id)->where('status', 'approved')->get();
        $data['user']         = User::find($id);
        $totalEarned          = 0;

        foreach ($tasks as $task) {
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
        if ($request->password) {
            $data['password']  = bcrypt($request->password);
        }

        $response = User::find($id)->update($data);

        if ($response) {
            return redirect()->route('admin.users.index')->with("success", "Completed Successfully.");
        } else {
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

        if ($response) {
            return redirect()->route('admin.users.index')->with("success", "Completed Successfully.");
        } else {
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }

    public function addToSpecial(Request $request, $id)
    {
        $user           = User::find($id);

        if ($request->action == 'special') {
            $user->special  = 1;
            $response       = $user->save();
        } elseif ($request->action == 'non-special') {
            $user->special  = 0;
            $response       = $user->save();
        }


        if ($response) {
            return redirect()->back()->with("success", "Completed Successfully.");
        } else {
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }

    public function getUsers(Request $request)
    {
        if ($request->ajax()) {
            $columns = array(
                0   => 'id',
                1   => 'name',
                2   => 'gender',
                3   => 'email',
                4   => 'tasks',
                5   => 'active',
            );

            $totalData = User::count();

            $totalFiltered = $totalData;
            $counter = 1;


            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir   = $request->input('order.0.dir');

            if (empty($request->input('search.value'))) {
                $users = User::offset($start)
                    ->limit($limit)
                    ->latest($order, $dir)
                    ->get();
            } else {
                $search = $request->input('search.value');

                $users =  User::where('email', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('gender', 'LIKE', "%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->latest($order, $dir)
                    ->get();

                $totalFiltered = User::where('email', 'LIKE', "%{$search}%")
                    ->orWhere('name', 'LIKE', "%{$search}%")
                    ->orWhere('gender', 'LIKE', "%{$search}%")
                    ->count();
            }

            $data = array();
            if (!empty($users)) {
                foreach ($users as $user) {
                    $show   =  route('admin.users.show', $user->id);
                    $edit   =  route('admin.users.edit', $user->id);
                    $delete =  route('admin.users.destroy', $user->id);
                    $btn = null;
                    $status = null;
                    $token = csrf_token();

                    if ($user->active == 1) {
                        $status =  'DEACTIVE';
                        $btn = 'btn-danger';
                    } elseif ($user->active == 0) {
                        $status =  'ACTIVE';
                        $btn = 'btn-success';
                    }

                    $nestedData['sr']       = $counter++;
                    $nestedData['name']     = $user->name;
                    $nestedData['gender']   = $user->gender;
                    $nestedData['email']    = $user->email;
                    $nestedData['tasks']    = count($user->tasks);
                    $nestedData['active']   = $user->active == 1 ? 'ACTIVE' : 'DEACTIVE';
                    $nestedData['options']  = "
                                            <div class='disp_flex'>
                                                <a href='{$show}' title='SHOW' class='btn btn-info '>SHOW</a>
                                                <a href='{$edit}' title='EDIT' class='btn btn-primary '>EDIT</a>
                                                <form action='{$delete}' method='post'>
                                                <input type='hidden' name='_method' value='DELETE'>
                                                <input type='hidden' name='_token' value='$token'>
                                                <button type='submit' title='$status' class='btn $btn btn-outline  sbold uppercase'>$status</button>
                                                </form>
                                            </div>";
                    $data[] = $nestedData;
                }
            }

            $json_data = array(
                "draw"            => intval($request->input('draw')),
                "recordsTotal"    => intval($totalData),
                "recordsFiltered" => intval($totalFiltered),
                "data"            => $data
            );

            return response()->json($json_data);
        }
    }
}
