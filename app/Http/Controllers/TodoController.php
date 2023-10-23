<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;

class TodoController extends Controller
{
    public function create(){
        return view('prof.todo_list');
    }

    public function store(Request  $request ){

      

        // Validate the request data
$request->validate([
    'description' => ['required', 'string'],// Define your validation rules here
]);


// Create and store the to-do item
$todo = Todo::create([
    'user_id' => auth()->user()->id, // Assuming you are storing the user's ID
    'description' => $request->input('description'),
]);

return response()->json(['message' => 'To-do item created successfully', 'todo' => $todo]);



    }

    public function get_list(){
        $list = Todo::where('user_id' , auth()->user()->id)->get(); 
        return response()->json($list);
    }

    public function Drop_list($id){
        $todo = Todo::find($id);

        $message = "u delete the list";

        if($todo){
            $todo->delete();

            return response()->json($message);
        }
        
    }


}
