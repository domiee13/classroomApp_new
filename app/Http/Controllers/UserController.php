<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
}
