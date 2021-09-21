<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;

class ChallengeController extends Controller
{
    //
    public function index(){
        $challenges = Challenge::all();
        return view('challenges.admin', compact('challenges', $challenges));
    }
}
