<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Folow;
use App\Models\event;


class FolowController extends Controller
{
    public function index(  ){
       
    }

    public function store(string $id){

        $eventId  = event::find($id);
        $existingFolow = Folow::where('user_id', auth()->user()->id)
        ->where('event_id', $eventId->id)->where('folow' , 0)->first();
        $participate = Folow::where('user_id', auth()->user()->id)
        ->where('event_id', $eventId->id)->where('participat' , 0)->first();

        if($existingFolow){

            $existingFolow->update([
                'folow' =>true
               ]);

            
               return redirect()->back()->with('valide', 'Vous avez suivi le cour avec succès.');
        }
        elseif($participate){
            $participate->update(
                [
                    'participat' =>true
                ]
                );

                return redirect()->back()->with('valide', 'Vous avez participer a cour avec succès.');

        }
        else{
            $folow = Folow::create([
                'user_id' =>auth()->user()->id,
                'event_id' => $eventId->id ,
                'folow' => true,
                'participat' =>true
            ]);
    
            return redirect()->back()->with('valide', 'Vous avez suivi le cour avec succès.');
        }

       
    }



    public function upadte_paticipate(string $id){

        $eventId  = event::find($id);
        $existingFolow = Folow::where('user_id', auth()->user()->id)
        ->where('event_id', $eventId->id)->where('participat' , 1);
       
        if($existingFolow){

           $existingFolow->update([
            'participat' =>false
           ]);

           return redirect()->back()->with('valide', 'Vous avez participer dans le cour avec succès.');

        }

       
    }

    public function favoris(){
        $favoris = Folow::where('user_id', auth()->user()->id)->where('folow', 1)->with('event')->get();
        return view('student.event_favoris')->with('favoris' , $favoris);
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
