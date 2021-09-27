<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Exercise;
use App\Models\User;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use Storage;
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
        // $filePath = $request->file('file')->move('uploads', $fileName);
        $filePath = $request->file('file')->move(Storage::disk('public')->getAdapter()->getPathPrefix(), $fileName);


        // dd($filePath);
        $deadline = Carbon::parse($request->deadline)->format('Y-m-d');
        Assignment::create([
            "deadline" => $deadline,
            "desc" => $request->desc,
            "filepath" => $filePath,
            'filename' => $fileName,
        ]);
        return redirect('/assignments');
    }

    public function getAssignmentDetail($id){
        $assignment = Assignment::find($id);
        $exercises = Exercise::where('assignment_id','=',$id)->where('student_name','=',Auth::user()->name)->get();
        return view('assignments.detail', compact('assignment', $assignment, 'exercises', $exercises));
    }
    public function downloadAssignment($id){
        $assignment = Assignment::find($id);
        // Storage::download($assignment->filepath, "test");
        return response()->download($assignment->filepath);
        // return redirect()->back();
    }

    public function viewExercise($id, Request $request){
        // $users = User::where('id', '=', $id);
        // dd($users);
        $exercises = Exercise::where('assignment_id','=',$id)->get();
        // dd($exercises);
        $assignment = Assignment::find($id);
        return view('assignments.view',compact('assignment', $assignment, 'exercises', $exercises));
    }

    public function submitAssignment(Request $request){
        // dd($request->all());
        $request->validate([
            'file' => 'required|mimes:doc,docx,txt,pdf',
        ]);
        $file = $request->file;
        $student = User::find($request->user_id)->name;
        $fileName = $request->file->getClientOriginalName();
        $filePath = $request->file('file')->move(Storage::disk('public')->getAdapter()->getPathPrefix(), $fileName);
        Exercise::create([
            'assignment_id' => $request->assignment_id,
            'student_name' => $student,
            'time_send' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
            'filepath' => $filePath,
            'filename' => $fileName,
        ]);
       return redirect()->back();
    }

    public function deleteAssignment(Request $request){
        // dd($request->all());
        $assignment = Assignment::find($request->assignment_id);
        $assignment->delete();
        return redirect()->back();
    }
}
