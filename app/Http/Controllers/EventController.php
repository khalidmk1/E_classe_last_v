<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\User;
use App\Models\Folow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use FFMpeg\FFMpeg;
use FFMpeg\FFProbe;
use Carbon\Carbon;


class EventController extends Controller
{

    public function __construct(){
        $this->subject = ['Mathématiques' , 'Français' , 'Arabe' , 'Sciences de la Vie et de la Terre (SVT)' , 'Physique , Chimie' , 'Histoire et Géographie' , 
        'Éducation Islamique' , 'Éducation Civique' , 'Anglais' ,  'Économie et Gestion' ,
        'Philosophie' , 'Langues étrangères (Espagnol, Allemand, etc.)' , 'Sciences Économiques et Sociales (SES)' , 'Sciences et Technologies Industrielles (STI)']; 

        $this->niveau = ['2 ème année bac' , '1 ère année bac' , 'Tronc commun' , '3ème année collège' , '2ème année collège' ,
        '1ème année collège'];
    }

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

   /*  public function send_subject(){
       
        return view('student.actions.prof')->with(
           []
        );
    } */



    public function sort(Request $request){
        
       


        $subject = $request->subject;
        $niveau = $request->niveau;

        if($subject && $niveau){
           /*  $output = ''; */

            if($request->ajax()) {

                /* $output = ''; */
    
                $events = event::with('user')->where('subject','LIKE', "%$subject%")->orwhere('niveau','LIKE', "%$niveau%")->get();

                return response()->json($events);
    
            } 
        }

        return view('student.actions.prof')->with([ 'subject'=>$this->subject , 'niveau'=>$this->niveau]);

    }


    public function all_event(Request $request){
        


        if($request->ajax()) {

          

            $events = event::with('user')->get();

            return response()->json($events);

        
        
        } 
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        
        return view('prof.event.create')->with(['subject'=>$this->subject , 'niveau'=>$this->niveau]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request )
    {
      
    
    $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'description' => ['required', 'string'],
        'programe' =>['required', 'string'],
        'price' =>['required' , 'integer'],
        'date' =>['required' , 'date'],
        'video' => ['required','mimes:mp4'], 
        'images.*' => ['image','mimes:jpeg,png,jpg,gif,webp'],
    ]);

   
    // Convert the date format to 'YYYY-MM-DD HH:MM:SS'
    $today = Carbon::now();
    $date = Carbon::createFromFormat('m/d/Y g:i A', $request->date);
    $dateFormatted = $date->format('Y-m-d H:i:s');
   
    $uploadedImages=[];
if ($request->hasFile('images')) {
    foreach ($request->file('images') as $image) {
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('images/event'), $imageName);
        $uploadedImages[] = $imageName;
    }

    if ($request->hasFile('video')) {
        $video = $request->file('video');
        $videoName = time() . '_' . $video->getClientOriginalName();
        $video->move(public_path('videos'), $videoName);
    } else {
        $videoName = null; // Set to null if no video is uploaded.
    }
   
    if(count($uploadedImages) < 5){
        if($today < $dateFormatted ){
            $event = event::create([
                'user_id' =>auth()->user()->id,
                'title' => $request->title,
                'description' =>$request->description,
                'programe' => $request->programe,
                'date'=>$dateFormatted,
                'price' => $request->price,
                'subject' =>$request->subject,
                'niveau' =>$request->niveau,
                'video' => $videoName,
                'images' => $uploadedImages,
            ]);
        
              
                
                return redirect()->back()->with('valide' , 'vous avez créé un Cour');
        }else{
            return redirect()->back()->with('faild' , ' la date n\'est correcte');
        }
       
     
    }else{
        return redirect()->back()->with('faild' , 'les maximum des images est 4');
    };


}










    

  
        
       
        

    }

    public function detail_student(string $id){
        $events = event::find($id); 
      
        return view('student.actions.detail_event')->with('events' , $events);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {  
       $events = event::find($id); 

      
       return view('prof.event.detail')->with('events' , $events);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = event::find(Crypt::decrypt($id));
        return view('prof.event.edit')->with(['event' => $event ,
        'subject'=>$this->subject , 'niveau'=>$this->niveau
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request , string $id)
    {
/* dd($id) */;
/* $event = event::find($id);
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('images/event'), $imageName);
                $uploadedImages[] = $imageName;
               $event->update('images' ->$uploadedImages);
            };
        }
    

        if ($request->hasFile('video')) {
            $file = $request->file('video');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('videos'), $fileName); // Move the uploaded video to the desired location
            event::find(auth()->user()->id)->update([
                'video' =>$fileName,
            ]);
        }
       
        $input = $request->all();
        $event->update($input);

        return redirect()->back()->with('seccuse' , 'Vous avez update le cour '); */


        $event = Event::find($id);

        $today = now();
     
        $date = Carbon::createFromFormat('m/d/Y g:i A', $request->date);
    $dateFormatted = $date->format('d-m-Y H:i:s');
    

    $uploadedImages = [];

    if ($request->hasFile('images')) {
        foreach ($request->file('images') as $image) {
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/event'), $imageName);
            $uploadedImages[] = $imageName;
        }
    }

    if ($request->hasFile('video')) {
        $video = $request->file('video');
        $videoName = time() . '_' . $video->getClientOriginalName();
        $video->move(public_path('videos'), $videoName);
        $event->video = $videoName; // Update the video
    }

    // Update the event attributes
    $event->title = $request->title;
    $event->description = $request->description;
    $event->programe = $request->programe;
    $event->date = $dateFormatted;
    $event->price = $request->price;
    $event->subject = $request->subject;
    $event->niveau = $request->niveau;

    // Update the images column
    if (!empty($uploadedImages)) {
        $event->images = $uploadedImages;
    }

    $event->save();

    return redirect()->back()->with('success', 'Vous avez mis à jour le cours');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(event $event)
    {
        //
    }
}
