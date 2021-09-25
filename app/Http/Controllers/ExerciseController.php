<?php

namespace App\Http\Controllers;
use App\Models\Exercise;

use Illuminate\Http\Request;

class ExerciseController extends Controller
{
    //
    public function downloadExercise($id){
        $exercise = Exercise::find($id);
        // Storage::download($assignment->filepath, "test");
        return response()->download($exercise->filepath);
        // return redirect()->back();
    }
}
