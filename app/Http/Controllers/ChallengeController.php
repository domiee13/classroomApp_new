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
        $request->validate([
            'file' => 'required|mimes:txt',
        ]);
        // dd($request->file->getClientOriginalName());
        $fileName = $request->file->getClientOriginalName();
        $filePath = $request->file('file')->move(Storage::disk('public')->getAdapter()->getPathPrefix(), $fileName);
        // Storage::disk('public')->put($request->file);
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
        // dd(Storage::disk('public')->allFiles());
        $chall = Challenge::find($id);
        $filePath = explode(".",$chall->filepath);
        // dd($filePath[1]);
        $fileDownloadName = "chall" . $chall->id ."." . $filePath[1];
        return response()->download($chall->filepath, $fileDownloadName);
        // return Storage::download($chall->filepath);
    }
    
    public function playChall($id){
        $chall = Challenge::find($id);
        return view('challenges.playground', compact('chall', $chall));
    }

    public function submitAnswerChall($id, Request $request){
        // dd($id, $request->all());
        $filepath = Challenge::find($id)->filepath;
        $challName = explode(".", $filepath)[0];
        $challName = explode("//", $challName)[8];
        // dd(file_get_contents($filepath));
        if($request->answer == $challName){
            $content = file_get_contents($filepath);
            return redirect()->back()->with('true', $content);
        }else{
            return redirect()->back()->with('error', "Wrong answer");
        }
    }
}
