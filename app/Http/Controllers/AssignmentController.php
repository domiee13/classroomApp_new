<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    //
    public function index(){
        $assignments = Assignment::all();
        return view('assignments.admin',['assignments' => $assignments]);
    }
}
