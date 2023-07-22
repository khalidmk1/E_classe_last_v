<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Crypt;

class ProfileController extends Controller
{

    private $county_array;
    private $subject;

    public function __construct()
    {
        $this->county_array=['Casablanca','Ad Dakhla','Ad Darwa','Agadir','Aguelmous','Ain El Aouda','Ait Melloul','Ait Ourir','Al Aaroui','Al Fqih Ben Çalah',
        'Al Hoceïma','Al Khmissat','Al ’Attawia','Arfoud','Azemmour','Aziylal','Azrou','Aïn Harrouda','Aïn Taoujdat','Barrechid','Ben Guerir','Beni Yakhlef',
        'Berkane','Biougra','Bir Jdid','Bou Arfa','Boujad','Bouknadel','Bouskoura','Béni Mellal','Chichaoua','Demnat','El Aïoun','El Hajeb','El Jadid',
       'El Kelaa des Srarhna','Errachidia','Fnidq','Fès','Guelmim','Guercif','Iheddadene','Imzouren','Inezgane','Jerada','Kenitra','Khemis Sahel','Khénifra',
        'Kouribga','Ksar El Kebir','Larache','Laâyoune','Marrakech','Martil','Mechraa Bel Ksiri','Mediouna','Mehdya','Meknès','Midalt','Missour','Mohammedia',
       'Moulay Abdallah','Moulay Bousselham','Mrirt','My Drarga','M’diq','Nador','Oued Zem','Ouezzane','Oujda-Angad','Oulad Barhil','Oulad Tayeb','Oulad Teïma',
       'Oulad Yaïch','Qasbat Tadla','Rabat','Safi','Sale','Sefrou','Settat','Sidi Bennour','Sidi Qacem','Sidi Slimane','Sidi Smai’il','Sidi Yahia El Gharb',
       'Sidi Yahya Zaer','Skhirate','Souk et Tnine Jorf el Mellah','Tahla','Tameslouht','Tangier','Taourirt','Taza','Temara','Temsia','Tifariti','Tit Mellil',
       'Tétouan','Youssoufia','Zagora','Zawyat ech Cheïkh','Zaïo','Zeghanghane',
    ];
        $this->subject = ['Mathématiques' , 'Français' , 'Arabe' , 'Sciences de la Vie et de la Terre (SVT)' , 'Physique , Chimie' , 'Histoire et Géographie' , 
        'Éducation Islamique' , 'Éducation Civique' , 'Éducation Physique et Sportive (EPS)' , 'Anglais' , 'Technologie' , 'Informatique' , 'Économie et Gestion' ,
        'Philosophie' , 'Langues étrangères (Espagnol, Allemand, etc.)' , 'Sciences Économiques et Sociales (SES)' , 'Sciences et Technologies Industrielles (STI)'];
    }

    public function show(string $id){
        
        $profile = User::find( Crypt::decrypt($id));
        return view('profile.show')->with('profile' , $profile);
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'county_array' => $this->county_array,
            'subject' => $this->subject,
            'user' => $request->user(),
        ]);
    }


   

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        /* $request->user()->fill($request->validated(
            
        ));



        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::back()->with('status', 'profile-updated'); */
        

        $this->validate($request,[
            'name' => 'required',
            'last_name' => 'required',
            'phone' => 'required',
            'county' => 'required',
            'subject' => 'required',
        ]);

        if ($request->has('avatar')) {
            $file = $request ->avatar;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/avatars'),$image_name);

            User::find(auth()->user()->id)->update([
                'avatar' =>$image_name,
            ]);
            
        }
        User::find(auth()->user()->id)->update([
            'name' => $request->name,
            'last_name'=>$request->last_name,
            'phone' =>$request->phone,
            'email' => $request->email,
            'county' =>$request->county,
            'subject' =>$request->subject,
        ]);
        

       
        return redirect()->back();
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
