<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
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
        // dd($request->all());
        // $request->validate([
        //     'file' => 'mimes:txt,doc,pdf',
        // ]);
        $fileName = $request->file->getClientOriginalName();
        $filePath = $request->file('file')->move('uploads', $fileName);
        dd($fileName,$filePath);
        dd(Carbon::parse($request->deadline)->format('Y-m-d'));
    }
}
