<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Auth;
use Carbon\Carbon;
class MessageController extends Controller
{
    //
    function index(){
        $messages = Message::where('id_recv','=',Auth::id())->get();
        return view('messages.index',compact('messages', $messages));
    }

    public function sendMsg(Request $request){
        // dd($request->all());
        // dd(Carbon::now()->toDateTimeString());
        Message::create([
            'id_send' => $request['id_send'],
            'id_recv' => $request['id_recv'],
            'content' => $request['content'],
            'time_send' => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
            'name_send' => Auth::user()->name,
        ]);
        return redirect()->back();
    }

    function deleteMsg(Request $request){
        // dd($request->id_msg);
        $message = Message::find($request->id_msg);
        $message->delete();
        return redirect()->back();
    }

    function editMsg(Request $request){
        // dd($request->all());
        $message = Message::find($request->id_msg);
        $message->update([
            "content" => $request->content,
            "time_send" => Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(),
        ]);
    }
}
