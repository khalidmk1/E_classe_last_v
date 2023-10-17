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

      $table_existe  = Conversation::where('sender_id' , auth()->user()->id)->where('receiver_id' , $id)->exists();
      $user_existe = Conversation::where('sender_id' , $id)->where('receiver_id' , auth()->user()->id)->exists();
      if(!$table_existe && !$user_existe){
        Conversation::create([
          "sender_id" => Auth::user()->id,
          "receiver_id" => $id
        ]);
        if(auth()->user()->role == 'prof'){
          return redirect()->route('chat');
        }else{
          return redirect()->route('chat.etudiant');
        }
       
        
      }else{
        if(auth()->user()->role == 'prof'){
          return redirect()->route('chat');
        }else{
          return redirect()->route('chat.etudiant');
        }
      }
     

      
       
    }
}






