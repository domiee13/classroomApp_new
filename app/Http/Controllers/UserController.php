<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Auth;
use Carbon\Carbon;
class UserController extends Controller
{
    //
    public function index(){
        $users = User::all();
        return view('users.index',['users' => $users]);
    }
    public function detailById($id){
        $user = User::find($id);
        // echo gettype($user);     
        $messages = Message::where('id_recv','=',$id)->get();
        // echo $messages;
        return view('users.detail',['user' => $user, 'messages' => $messages]);
    }
    public function editUser($id){
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }
    public function getSentMsg($id_recv){
    }

    public function sendMsg(Request $request){
        // dd($request->all());
        // dd(Carbon::now()->toDateTimeString());
        Message::create([
            'id_send' => $request['id_send'],
            'id_recv' => $request['id_recv'],
            'content' => $request['content'],
            'time_send' => Carbon::now()->toDateTimeString(),
            'name_send' => Auth::user()->name,
        ]);
        return redirect()->back();
    }
}
