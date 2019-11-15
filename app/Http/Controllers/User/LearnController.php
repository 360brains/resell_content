<?php

namespace App\Http\Controllers\User;

use App\Models\Training;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LearnController extends Controller
{
    public function index(){
        $data['trainings']      = Training::paginate(10);
        return view('user.learn', $data);
    }
    public function learnDetails($id){
        $data['trainings']      = Training::with('trainingLists')->find($id);
        return view('user.learn-details', $data);
    }
}
