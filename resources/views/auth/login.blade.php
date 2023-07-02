

{{-- <x-guest-layout> --}}
{{--     @if (session('status'))
<div>
 {{ session('status')}}
</div> --}}





   {{--  <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ml-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
 --}}


@extends('master.blank_master_page')

@section('title')
    
@endsection

@section('content')

@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>{{ session('success')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

@elseif (session('failed'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>{{ session('failed')}}</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

 <div class="login-box">
    <!-- /.login-logo -->
    <div class="card card-outline card-primary">
      <div class="card-header text-center">
        <a href="../../index2.html" class="h1"><b>E-</b>Classe</a>
      </div>
      <div class="card-body">
        <p class="login-box-msg">Connectez-vous pour démarrer votre tableau de bord</p>
  
        <form  method="POST" action="{{ route('login') }}">
            @csrf

          
          <div class="input-group mb-3">
            <input type="email" id="email"  class="form-control" placeholder="Email" 
            name="email" :value="old('email')" required autofocus autocomplete="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
            @error('email')
          <div class="text-danger mx-4 mb-2 ereur_style">{{ $message }}</div>
          @enderror
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Mots de passe"
            name="password" required autocomplete="current-password" >
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
            @error('password')
            <div class="text-danger mx-4 mb-2 ereur_style">{{ $message }}</div>
            @enderror
          </div>


        
          <div class="row">
            <div class="col-6">
              <div class="icheck-primary">
                <input type="checkbox" id="remember"  name="remember">
                <label for="remember">
                Souviens-moi 
                </label>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-6">
              <button type="submit" class="btn btn-primary btn-block size_route">Connectez-vous</button>
            </div>
            <!-- /.col -->
          </div>


        </form>
  
  
        <p class="mb-1">
          <a href="{{ route('password.request') }}">j'ai oublié mon mot de passe</a>
        </p>
        <p class="mb-0">
          <a href="{{route('register')}}" class="text-center">
            Enregistrer un nouveau compte</a>
        </p>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

 @endsection