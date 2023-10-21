<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folow;
use App\Models\event;
use App\Models\User;

use Illuminate\Support\Facades\DB;


class FolowController extends Controller
{
    public function index(  ){
       
    }

   

    public function store(string $id){
       
        $eventId  = event::find($id);
       $Folow_true = Folow::where(['event_id'=>$eventId->id ,'participat' => 0 ]); 
        $existingFolow = Folow::where('user_id', auth()->user()->id)->where('event_id', $eventId->id)->exists(); 

        if(!$existingFolow){

            Folow::create([
                'user_id' => auth()->user()->id,
                'event_id' => $eventId->id,
                'participat' =>true
            ]);
            $response = ['message' => 'Your create folow '];
    
            return response()->json($response);
        }else{
            $Folow_true->update([
                'participat' =>true
            ]);
        }


        }

    public function upadte_paticipate(string $id){

        $eventId  = event::find($id);
        $existingFolow = Folow::where('event_id', $eventId->id)->where('participat' , 1);
       
        if($existingFolow){

           $existingFolow->update([
            'participat' =>false,
            'accepte' =>false
           ]);

           $response = ['message' => 'Your unticipated'];
           return response()->json($response);
      

        }

       
    }


    public function meesage_folow(){
        $accepted = Folow::where('user_id' , auth()->user()->id)->where('participat', 1)
        ->where('accepte', 1);
        return response()->json($accepted);
    }

  
    


    public function all_inccepte_folow(){


        $events = Event::where('user_id', auth()->user()->id)->get();

        $users = Folow::whereIn('event_id', $events->pluck('id'))
            ->where('participat', 1)
            ->where('accepte', 0)
            ->get();     
     
        return view('prof.table_accepte')->with('users', $users); 
    
    }


    public function meesage_inccepted(){
        $events = Event::where('user_id', auth()->user()->id)->get();

        $users = Folow::whereIn('event_id', $events->pluck('id'))
            ->where('participat', 1)
            ->where('accepte', 0)->count();

            return response()->json($users);
    }

    public function accepte_folow(string $id){

        $accepted = Folow::find($id);
      
        
        $accepted->update([
            'accepte'=>true
        ]);

        return redirect()->back();

    }

    public function check_participate(string $id){
        $events  = event::find($id);
        $participate = Folow::where('event_id', $events->id)->where('participat', 0)->exists();
        return response()->json($participate);
    }

    public function check_unparticipte(string $id){
        $events  = event::find($id);
        $unparticipate = Folow::where('event_id', $events->id)->where('participat', 1)->exists();
        return response()->json($unparticipate);
    }

    public function count(string $id){
        $events  = event::find($id);
        $count  = Folow::where(['event_id' => $events->id, 'participat' => 1])->count() ;
    
        return response()->json($count);
       
    }

    public function check_accepted(string $id){
        $events  = event::find($id);
        $accepted  = Folow::where(['event_id' => $events->id, 'participat' => 1 , 'accepte' => 1])->exists() ;
        return response()->json($accepted);
    }

    public function cours_participate(){

        $events  = Folow::with('event')->where(['user_id' => auth()->user()->id, 'participat' => 1 , 'accepte' => 1])->get();
        
            return view('student.actions.participate_event')->with('events' , $events);
       
     

    }

    public function create_favoris($id){

        $eventId  = event::find($id);
        $Folow_true = Folow::where(['event_id'=>$eventId->id ,'folow' => 0 ]); 
         $existingFolow = Folow::where('user_id', auth()->user()->id)->where('event_id', $eventId->id)->exists();
 
         if(!$existingFolow){
 
             Folow::create([
                 'user_id' => auth()->user()->id,
                 'event_id' => $eventId->id,
                 'folow' =>true
             ]);
             $response = ['message' => 'Your create folow '];
             
     
             return response()->json($response);
         }else{
            $response_1 = ['message' => 'Your update folow '];
             $Folow_true->update([
                 'folow' =>true
             ]);
             return response()->json($response_1);
         }

    }


    public function favoris(){     

            $favoris = Folow::with('event')->where('folow' , 1)->get();

                return response()->json($favoris); 
       /*  return response()->json(['favoris' => $favoris]); */
    }

    public function favoris_list() {
        return view('event.favoris');
    }




    

    public function unfolow(string $id){
        $eventId  = event::find($id);
        $existingFolow = Folow::where('user_id', auth()->user()->id)
        ->where('event_id', $eventId->id);

        if($existingFolow){

           $existingFolow->update([
            'folow' =>false
           ]);

           return redirect()->back()->with('valide', 'Vous avez unfolow dans le cour avec succès.');

        }else{
            return redirect()->back()->with('valide', 'Vous avez participer dans le cour avec succès.');
        }
    }


}
