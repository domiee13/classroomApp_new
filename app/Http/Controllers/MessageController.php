<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Auth;
class MessageController extends Controller
{
    //
    function index(){
        $messages = Message::where('id_recv','=',Auth::id())->get();
        return view('messages.index',compact('messages', $messages));
    }

    function deleteMsg(Request $request){
        dd($request->id_msg);
        $message = Message::find($request->id_msg);
        $message->delete();
        return redirect()->back();
    }
}
