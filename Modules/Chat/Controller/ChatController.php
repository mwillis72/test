<?php

namespace Modules\Chat\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Modules\Signup\Models\User;
use DB;

class ChatController
{
    public function loadChats()
    { 
        // $chatUsers = DB::table('users') 
        //             ->get();

        //return view('dashboard::chat.chats',['chatUsers' => $chatUsers]);
        return view('dashboard::apps-chat');
    }

    public function sendMessage(Request $request){

        $attributes = request()->validate([
            'message' => ['required', 'max:50'], 
            'receiver_userid' => ['required'], 
        ]);
       
        DB::table('chat')
        ->insert([
            'sender_userid'    => Auth::user()->id,
            'receiver_userid' => $attributes['receiver_userid'],
            'message'     => $attributes['message'], 
            'status'    => 1,
        ]);

        return redirect()->back()->with('success','Message sent successfully');
    }

}
