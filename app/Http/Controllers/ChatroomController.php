<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Chatroom;
use Illuminate\Support\Facades\DB;

class ChatroomController extends Controller
{
    public function index()
    {
        $chatrooms = Chatroom::all();
        return view('index', ['chatrooms' => $chatrooms]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'character_name' => 'required',
            'message' => 'required',
        ]);

        $chatroom = new Chatroom();
        $chatroom->character_name = $request->character_name;
        $chatroom->message = $request->message;
        $chatroom->save();

        return back();
    }

    public function chat()
    {
        $messages = Chatroom::all();
        return view('chatroom', ['messages' => $messages]);
    }


public function like($id)
{
    $message = Chatroom::findOrFail($id);
    $message->increment('likes');
    return redirect()->back();

}

public function chatroom()
{
    $items = \DB::table('chatroom')->get();  
    return view('chatroom', ['items' => $items]);  // 全てのデータが取得できる
}
}