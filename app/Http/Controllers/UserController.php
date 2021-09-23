<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Message;
use Auth;
use Hash;
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
        $messages = Message::where('id_recv','=',$id)->where('id_send','=',Auth::id())->get();
        // echo $messages;
        return view('users.detail',['user' => $user, 'messages' => $messages]);
    }
    public function editUser($id){
        $user = User::find($id);
        return view('users.edit', ['user' => $user]);
    }
    public function getSentMsg($id_recv){
    }

    // public function sendMsg(Request $request){
    //     // dd($request->all());
    //     // dd(Carbon::now()->toDateTimeString());
    //     Message::create([
    //         'id_send' => $request['id_send'],
    //         'id_recv' => $request['id_recv'],
    //         'content' => $request['content'],
    //         'time_send' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
    //         'name_send' => Auth::user()->name,
    //     ]);
    //     return redirect()->back();
    // }

    public function createUser(Request $request){
        // dd($request->all());
        if($request->password != $request->password_confirmation){
            return redirect('/users/create')
                ->with('error','Passwords do not match.');
        }
        else{
            User::create([
                'name' => $request['name'],
                'username' => $request['username'],
                'email' => $request['email'],
                'password' => bcrypt($request['password']),
                'phone' => $request['phone'],
                'role' => 1
            ]);
            return redirect('users');
        }
       
    }

    // Show profile 
    public function profile(){
        return view('users.profile');
    }

    //user's edit profile function
    public function editProfile(Request $request){
        // dd($request->all(),Auth::user()->password, bcrypt($request->oldpassword));
        $user = User::find(Auth::id());
        //Check old password 
        if(Hash::check($request->oldpassword, $user->password) && 
            $request->password == $request->password_confirmation){
            $user->update([
                'name' => $request->name,
                'username' => $request->username,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => bcrypt($request->password),
                'role' => $user->role
            ]);
            Auth::logout();
            return redirect('/login');
        }
        else{
            return redirect('/profile')->with('error', 'Invalid information');
        }
    }

    // edit user info by admin 
    public function getEditUser($id){
        $user = User::find($id);
        return view('users.edit',['user' => $user]);
    }
    public function postEditUser(){
        return view('users.edit');
    }
    public function deleteUser(Request $request){
        // dd($request->all());
        $user = User::find($request->id_user)->delete();
        return redirect()->back();
    }
}
