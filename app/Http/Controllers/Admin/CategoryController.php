<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        $data['categories'] = Category::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.categories.index', $data);
    }

    public function create()
    {
        $data['categories'] = Category::whereNull('parent_id')->orderBy('name', 'asc')->get();
        return view("admin.categories.create", $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'avatar' => 'required',
        ]);
        $category           = new Category();
        $category->name          = $request->name;
        if ($request->hasFile("avatar") && $request->file('avatar')->isValid()) {
            $filename           = $request->file('avatar')->getClientOriginalName();
            $filename           = time()."-".$filename;
            $destinationPath    = public_path('/images');
            $category->avatar  = "images/".$filename;
            $request->file('avatar')->move($destinationPath, $filename);
        }

//        $category           = new Category;
//        $category->name       = $request->name;
//
        $response = $category->save();

//        $response = Category::create($request->all());

        if ($response){
            return redirect()->route('admin.categories.index')->with("success", "Category created successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }


    public function show(Category $category)
    {
        $data['categories'] = $category->childCategories()->paginate(10);
        $data['category'] = $category;
        return view("admin.categories.show", $data);
    }

    public function edit(Category $category)
    {
        $data['categories'] = Category::whereNull('parent_id')->orderBy('name', 'asc')->get();
        $data['category'] = $category;
        return view('admin.categories.edit', $data);
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
        ]);
//        $category           = new Category;
        $category->name          = $request->name;
        if ($request->hasFile("avatar") && $request->file('avatar')->isValid()) {
            $filename           = $request->file('avatar')->getClientOriginalName();
            $filename           = time()."-".$filename;
            $destinationPath    = public_path('/images');
            $category->avatar  = "images/".$filename;
            $request->file('avatar')->move($destinationPath, $filename);
        }
        $response = $category->save();

        if ($response){
            return redirect()->route('admin.categories.index')->with("success", "Category updated successfully.");
        }else{
            return redirect()->back()->withInput($request->all())->with("error", "Something went wrong. Please try again.");
        }
    }



    public function destroy(Request $request, Category $category){
        $response = false;
        // Getting all children ids
        $array_of_ids = $this->getChildren($category);
        // Appending the parent category id
        array_push($array_of_ids, $category->id);
        // Deactive all of them
        if ($request->action == 'active'){
            $data['active'] = 1;
            for ($i=0; $i < count($array_of_ids); $i++){
                $response = Category::where('id', $array_of_ids[$i])->update($data);
            }
        }
        if ($request->action == 'inactive'){
            $data['active'] = 0;
            for ($i=0; $i < count($array_of_ids); $i++){
                $response = Category::where('id', $array_of_ids[$i])->update($data);
            }
        }
        if ($response){
            return redirect()->back()->with("success", "Completed Successfully.");
        }else{
            return redirect()->back()->with("error", "Something went wrong. Please try again.");
        }
    }
    private function getChildren($category){
        $ids = [];
        foreach ($category->childCategories as $cat) {
            $ids[] = $cat->id;
            $ids = array_merge($ids, $this->getChildren($cat));
        }
        return $ids;
    }

}
