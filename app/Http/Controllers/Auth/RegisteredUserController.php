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
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class RegisteredUserController extends Controller
{


  
   
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
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
            'phone' => ['required', 'string', 'max:255'],
            'avatar' =>['required' , 'mimes:jpeg,png,jpg,gif,webp'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
          
        ]);

        if ($request->has('avatar')) {
           
                $file = $request ->avatar;
                $image_name = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images/avatars'),$image_name);
             
        }

        if($request->has('terms') ){
            $user = User::create([
                'avatar' =>$image_name,
                'name' => $request->name,
                'last_name'=>$request->last_name,
                'phone' =>$request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),   
                'confirmed' => true,
            ]);

            $user->sendEmailVerificationNotification();

            event(new Registered($user));

            Auth::login($user);
            return redirect()->route('verification.notice');
             /*  return redirect()->route('login')->with('success','Votre inscription a réussi'); */
    
        }
        else{
            return redirect()->back()->with('failed','il faut accepter les termes');
        }
     
    }


    
}
