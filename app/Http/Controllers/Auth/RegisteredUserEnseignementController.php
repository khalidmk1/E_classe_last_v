<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Storage;

class RegisteredUserEnseignementController extends Controller
{

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
    
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register_enseignement')->with(
            [
                'county_array'=>$this->county_array,
                'subject' =>$this->subject,
                ]
        );
    }

    
    public function demande()
    {
       

    return view('auth.demande_enseignement')->with([
        'county_array' => $this->county_array,
        'subject' => $this->subject
    ]);
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name'=>['required', 'string', 'max:255'],
            'subject'=>['required', 'string', 'max:255'],
            'county_array'=>['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
          
        ]);

        if ($request->has('avatar')) {
           
            $file = $request ->avatar;
            $image_name = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/avatars'),$image_name);
         
    }
       
            $user = User::create([
                'avatar' =>$image_name,
                'name' => $request->name,
                'last_name'=>$request->last_name,
                'phone' =>$request->phone,
                'subject' => $request->subject,
                'county' =>$request->county_array,
                'email' => $request->email,
                'password' => Hash::make($request->password), 
                'role' => 'prof',  
                'confirmed' => true,
               
            ]);

            

            event(new Registered($user));

            /*   Auth::login($user); */
      
            return redirect()->route('dashboard')->with('success','Votre inscription de enseignement a réussi');
        
       
    
        }

        public function send_demand(Request $request): RedirectResponse
        {

            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'last_name'=>['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'phone' => ['required' , 'string', 'max:255'],
                'county' => ['required' , 'string', 'max:255'],
                'subject' => ['required' , 'string', 'max:255'],
                'license' => ['required', 'mimes:pdf' ,'max:2048'],
                'cin' => ['required', 'mimes:pdf' ,'max:2048'],
                'work_status' =>['required', 'string', 'max:255'],
                'name_school' =>['required', 'string', 'max:255'],
            ]);


            if ($request->has('avatar')) {
                $file_image = $request ->avatar;
                $image_name = time() . '_' . $file_image->getClientOriginalName();
                $file_image->move(public_path('images/avatars'),$image_name);
            }
            if ($request->hasFile('cin')) {
                $file_cin = $request->cin;
                $fileCin = time() . '_' . $file_cin->getClientOriginalName();
                $file_cin->move(public_path('images/cin'),$fileCin);
            }

            if($request->hasFile('license')){
                $file_license = $request->license;
                $filelicense = time() . '_' . $file_license->getClientOriginalName();
                $file_license->move(public_path('images/license'), $filelicense);
            }

           
            
            
        if($request->has('terms')){

            $user = User::create([
                'name' => $request->name,
                'last_name'=>$request->last_name,
                'avatar' =>$image_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' =>'prof',
                'phone' =>$request->phone,
                'county' => $request->county,
                'subject' => $request->subject,
                'name_school' => $request->name_school,
                'license' =>$filelicense,
                'cin' =>$fileCin,
                'work_status' => $request->work_status,
                'confirmed' => false,
                'block' => false,

            ]);
            event(new Registered($user));

            Auth::login($user);
       return redirect()->route('verification.notice');
             /*  return redirect()->route('login')->with('success','Votre demande a été bien envoyer'); */

        }
        else{
            return redirect()->back()->with('failed','Votre demande a été bien envoyer');
        }
          
        } 


        public function accepte_demande(string $id){

            $accepte = User::find($id);
            if ($accepte) {
                $accepte->update([
                    'confirmed' => true
                ]);
        
                return redirect()->back()->with('success', 'La demande a été acceptée avec succès.');
            }
        
        
            return redirect()->back()->with('error', 'Utilisateur non trouvé.');

        }

        
       
    }


