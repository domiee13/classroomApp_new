<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use Auth;
use Storage;
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

    public function addChall(Request $request){
        // dd($request->all());
        $request->validate([
            'file' => 'required|mimes:txt',
        ]);
        // dd($request->file->getClientOriginalName());
        $fileName = $request->file->getClientOriginalName();
        $filePath = $request->file('file')->move('uploads', $fileName);
        // dd($filePath);
        
        Challenge::create([
            "name" => $request->challengename,
            "hint" => $request->hint,
            "filepath" => $filePath,
        ]);
        // return return redirect()->back()->withErrors($validator)->withInput();
        return redirect('/challenges');
    }

    public function delChall(Request $request){
        // dd($request->all());
        $challenge = Challenge::find($request->id_chall);
        $challenge->delete();
        return redirect()->back();
    }

    public function downloadChall($id){
        // dd(Storage::allFiles('uploads'));
        $chall = Challenge::find($id);
        $filePath = explode(".",$chall->filepath);
        // dd($filePath[1]);
        $fileDownloadName = "chall" . $chall->id ."." . $filePath[1];
        return Storage::download($chall->filepath, $fileDownloadName);
    }
}
