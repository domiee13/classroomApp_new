<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use Auth;
class ChallengeController extends Controller
{
    //
    public function index(){
        $challenges = Challenge::all();
        if(Auth::user()->isAdmin()){
            return view('challenges.admin', compact('challenges', $challenges));
        }
        return view('challenges.index', compact('challenges', $challenges));
    }
}
