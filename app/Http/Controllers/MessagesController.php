<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;
use App\Models\Conversation ;
use Illuminate\Support\Facades\Auth;

class MessagesController extends Controller
{
    
public function __construct()
{
  $this->middleware('auth');
}

public function index()
{
  return view('chat');
}

public function fetchMessages()
{
  return Messages::with('user')->get();
}

public function sendMessage(Request $request)
{
  $user = Auth::user();

  $message = $user->messages()->create([
    'message' => $request->input('message')
  ]);

  return ['status' => 'Message Sent!'];
}




public function startConversation($id)
    {

      Conversation::create([
        "sender_id" => Auth::user()->id,
        "receiver_id" => $id
    ]);
    return redirect()->route('chat');

      
       
    }
}






