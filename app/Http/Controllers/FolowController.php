<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folow;
use App\Models\event;

use Illuminate\Support\Facades\DB;


class FolowController extends Controller
{
    public function index(  ){
       
    }

    public function store(string $id){

        $eventId  = event::find($id);
        $existingFolow = Folow::where('event_id', $eventId->id)->first();
      

       

        if($existingFolow){

            $existingFolow->update([
            'participat' =>true
           ]);
           $response = ['message' => 'Your message goes here'];
           return response()->json($response);
        }
      
        }


     

       
    



    public function upadte_paticipate(string $id){

        $eventId  = event::find($id);
        $existingFolow = Folow::where('event_id', $eventId->id)->where('participat' , 1);
       
        if($existingFolow){

           $existingFolow->update([
            'participat' =>false
           ]);

           $response = ['message' => 'Your unticipated'];
           return response()->json($response);
      

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
