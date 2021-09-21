<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Assignment;
use App\Models\Challenge;
use App\Models\Message;
use Auth;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        $assignments = Assignment::all();
        $challenges = Challenge::all();
        $messages = Message::where('id_recv', '=', Auth::id())->get();
        return view('home', compact('users','assignments','challenges','messages'));
    }
}
