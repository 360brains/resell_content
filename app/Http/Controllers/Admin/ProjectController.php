<?php

namespace App\Http\Controllers\Admin;

use App\Models\Level;
use App\Models\Category;
use App\Models\Project;
use App\Models\Task;
use App\Models\Template;
use App\Models\Training;
use App\Models\Type;
use App\Notifications\TaskResult;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ProjectController extends Controller
{
    public function index(Request $request)
    {
//        datatable code start
        return view('admin.projects.index');
    }


    public function create()
    {
        $data['types']      = Type::where('active', 1)->get();
        $data['categories'] = Category::where('active', 1)->get();
        $data['levels']     = Level::where('active', 1)->get();
        $data['trainings']  = Training::where('active', 1)->get();
        $data['templates']  = Template::where('active', 1)->get();
        return view("admin.projects.create", $data);
    }


    public function store(Request $request)
    {

        $request->validate([
            'name'          => 'required',
            'type'          => 'required',
            'description'   => 'required',
            'level'         => 'required',
            'price'         => 'required',
            'points'        => 'required',

        ]);

        $project = new Project();
        $project->name          = $request->name;
        $project->quantity      = $request->quantity;
        $project->available     = $request->quantity;
        $project->type_id       = $request->type;
        $project->template_id   = $request->template;
        $project->deadline      = $request->deadline;
        $project->category_id   = $request->category;
        $project->level_id      = $request->level;
        $project->description   = $request->description;
        $project->active        = $request->active;
        $project->price         = $request->price;
        $project->points        = $request->points;

        if ($request->special == 'on') {
            $project->special = 1;

            $response           = $project->save();
            $lastInsertedId     = $project->id;

            $details = [
                'taskName'      => $request->name,
                'date'          => now(),
                'message'       => 'Congratulations! You have been assigned a special task.',
                'tooltip'       => ' It is a project that is only available and visible to the special users that we have chosen.',
                'link'          => "<a href=".route("pages.project.details", $lastInsertedId)." class='d-inline'>Details</a>",
            ];

            $users = User::where('special', 1)->get();
            foreach ($users as $user){
                $user->notify(new TaskResult($details));
            }
        }else{
            $response          = $project->save();
        }

        if ($response){
            $project->trainings()->sync($request->trainings);
        }
        if ($response){
            return redirect()->route('admin.projects.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }


    public function show(Project $project)
    {
        $data['project'] = $project;
        $data['tasks'] = Task::where('project_id', $project->id)->orderBy('Created_at', 'desc')->paginate(10);
        return view('admin.projects.show', $data);
    }


    public function edit(Project $project)
    {
        $data['types']      = Type::where('active', 1)->get();
        $data['categories'] = Category::where('active', 1)->get();
        $data['levels']     = Level::where('active', 1)->get();
        $data['trainings']  = Training::where('active', 1)->get();
        $data['templates']  = Template::where('active', 1)->get();
        $data['project']    = $project;
        $projectTrainings   = [];
        $data['projectTrainings']  = $projectTrainings = [];
        if(!is_null($project->trainings)){
            foreach ($project->trainings as $training){
                $projectTrainings[] = $training->name;
            }
            $data['projectTrainings']    = $projectTrainings;
        }
        return view('admin.projects.edit', $data);
    }


    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name'          => 'required',
            'type'          => 'required',
            'description'   => 'required',
            'level'         => 'required',
            'price'         => 'required',
            'points'        => 'required',
        ]);

        $project->name          = $request->name;
        $project->quantity      = $request->quantity;
        $project->type_id       = $request->type;
        $project->template_id   = $request->template;
        $project->deadline      = $request->deadline;
        $project->category_id   = $request->category;
        $project->level_id      = $request->level;
        $project->description   = $request->description;
        $project->price         = $request->price;
        $project->points        = $request->points;
        $project->active        = $request->active;

        if ($request->special == 'on') {
            $project->special = 1;
            $response           = $project->save();
            $lastInsertedId     = $project->id;

            $details = [
                'taskName'      => $request->name,
                'date'          => now(),
                'message'       => 'Congratulations! You have been assigned a special task.',
                'tooltip'       => ' It is a project that is only available and visible to the special users that we have chosen.',
                'link'          => "<a href=".route("pages.project.details", $lastInsertedId)." class='d-inline'>Details</a>",
            ];

            $users = User::where('special', 1)->get();
            foreach ($users as $user){
                $user->notify(new TaskResult($details));
            }
        }else{
            $project->special = 0;
            $response          = $project->save();
        }

        if ($response){
            $project->trainings()->sync($request->trainings);
        }

        if ($response){
            return redirect()->route('admin.projects.index')->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }


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

    public function getProjects(Request $request)
    {
        if ($request->ajax()){
            $columns = array(
                0   => 'id',
                1   => 'name',
                2   => 'quantity',
                3   => 'Type_id',
                4   => 'deadline',
                5   => 'level_id',
                6   => 'price',
                7   => 'id',
                8   => 'active',
            );

            $totalData = Project::count();

            $totalFiltered = $totalData;
            $counter = 1;


            $limit = $request->input('length');
            $start = $request->input('start');
            $order = $columns[$request->input('order.0.column')];
            $dir   = $request->input('order.0.dir');

            if(empty($request->input('search.value')))
            {
                $projects = Project::offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();
            }
            else {
                $search = $request->input('search.value');

                $projects =  Project::where('price','LIKE',"%{$search}%")
                    ->orWhereHas('type', function ($query) use ($search){
                        $query->where('name', 'like', '%'.$search.'%');
                    })->
                    orWhereHas('level', function ($query) use ($search){
                        $query->where('name', 'like', '%'.$search.'%');
                    })
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->orWhere('quantity', 'LIKE',"%{$search}%")
                    ->orWhere('deadline', 'LIKE',"%{$search}%")
                    ->offset($start)
                    ->limit($limit)
                    ->orderBy($order,$dir)
                    ->get();

                $totalFiltered = Project::where('price','LIKE',"%{$search}%")
                    ->orWhere('name', 'LIKE',"%{$search}%")
                    ->orWhere('deadline', 'LIKE',"%{$search}%")
                    ->count();
            }

            $data = array();
            if(!empty($projects))
            {
                foreach ($projects as $project)
                {
                    $show   =  route('admin.projects.show',$project->id);
                    $edit   =  route('admin.projects.edit',$project->id);
                    $delete =  route('admin.projects.destroy',$project->id);
                    $btn = null;
                    $status = null;
                    $token = csrf_token();

                    if ($project->active == 1){
                        $status =  'DEACTIVE';
                        $btn = 'btn-danger';
                    }
                    elseif($project->active == 0){
                        $status =  'ACTIVE';
                        $btn = 'btn-success';

                    }

                    $nestedData['sr']       = $counter++;
                    $nestedData['name']     = $project->name;
                    $nestedData['quantity'] = $project->quantity;
                    $nestedData['type']     = $project->type->name;
                    $nestedData['deadline'] = $project->deadline;
                    $nestedData['level']    = $project->level->name;
                    $nestedData['price']    = $project->price;
                    $nestedData['active']   = $project->active == 1 ? 'ACTIVE' : 'DEACTIVE';
                    $nestedData['options']  = "<a href='{$show}' title='SHOW' class='btn btn-info btn-xs'>SHOW</a>
                                               <a href='{$edit}' title='EDIT' class='btn btn-primary btn-xs'>EDIT</a>
                                               <form action='{$delete}' method='post'>
                                               <input type='hidden' name='_method' value='DELETE'>
                                               <input type='hidden' name='_token' value='$token'>
                                               <button type='submit' title='$status' class='btn $btn btn-outline btn-xs sbold uppercase'>$status</button>
                                               </form>";
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
