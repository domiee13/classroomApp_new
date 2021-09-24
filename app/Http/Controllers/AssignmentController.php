<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Auth;
class AssignmentController extends Controller
{
    //
    public function index(){
        $assignments = Assignment::all();
        if(Auth::user()->isAdmin()){
            return view('assignments.admin',['assignments' => $assignments]);
        }
        return view('assignments.index',['assignments' => $assignments]);
    }

    public function addAssignment(Request $request){
        dd($request->all());
    }
}
