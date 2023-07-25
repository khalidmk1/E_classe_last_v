<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = event::where('user_id', auth()->user()->id)->get();
        $events_all = event::all();
        return view('prof.event.show')->with([
            'events' => $events,
            'events_all' => $events_all
    ]);
    }

    public function sort(Request $request){
        
        /* $query = event::query(); */
        $search = $request->search;
        $events = event::where('title','LIKE', "%$search%")->get();
        return view('prof.search')->with([
            'events' => $events, 
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('prof.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



       /*  dd($request); */
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string', 'max:255'],
            'programe' =>['required', 'string', 'max:255'],
            'video' => 'required|mimes:mp4', 
            'images.*' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $uploadedImages = [];
    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/event'), $imageName);
            $uploadedImages[] = $imageName;
        }
    }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('videos'), $fileName); // Move the uploaded video to the desired location
        }

        if(count($uploadedImages) <= 4){
            $event = event::create([
                'user_id' =>auth()->user()->id,
                'title' => $request->title,
                'description' =>$request->description,
                'programe' => $request->programe,
                'video' => $fileName,
                'images' => $uploadedImages,
            ]);
            return redirect()->back()->with('valide' , 'u create a event');
        }else{
            return redirect()->back()->with('faild' , 'u should create just 4 image');
        }
        ;
       

        

        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {  
       $events = event::find(Crypt::decrypt($id)); 
       return view('prof.event.detail')->with('events' , $events);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = event::find(Crypt::decrypt($id));
        return view('prof.event.edit')->with('event' , $event);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        if ($request->has('avatar')) {
            $file = $request ->avatar;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/avatars'),$image_name);

            User::find(auth()->user()->id)->update([
                'avatar' =>$image_name,
            ]);
            
            
        }

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('videos'), $fileName); // Move the uploaded video to the desired location
            User::find(auth()->user()->id)->update([
                'video' =>$fileName,
            ]);
        }
        User::find(auth()->user()->id)->update([
            'title' => $request->title,
            'description'=>$request->description,
            'programe' =>$request->programe,
        ]);

        return redirect()->back()->with('seccuse' , 'u have changes');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(event $event)
    {
        //
    }
}
