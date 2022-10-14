<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request){
       // dd($request);
        $data =$request->validate([
            'name' =>'required',
            'email' => 'required',
            'subject' => 'required',
            'message'=>'required'

        ]);
        Message::create([
'fullname'=>$request->name,
'email'=>$request->email,
'subject'=>$request->subject,
'message'=>$request->message
        ]);
        return redirect()->back();
    }
}
