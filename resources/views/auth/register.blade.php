{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('master.blank_master_page')

@section('title')
@endsection


@section('content')
    

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Conditions pour les étudiants</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p><h5>Effective Date: 21/07/2023</h5>
                        <br>
                        These terms and conditions ("Terms") govern your use of E-Classe ("Platform"), provided by G-Code
                        ("Company"). By accessing or using the Platform, you agree to comply with and be bound by these
                        Terms. If you do not agree with these Terms, please do not use the Platform.

                        <b>Eligibility and Age Restrictions</b>
                        <br>
                        1.1.You must be under the age of 18 to use this Platform. If you are under 18, you represent and
                        warrant that you have obtained the necessary consent from your parent or legal guardian to use the
                        Platform.
                        <br>

                        <b>Account Registration</b>
                        <br>
                        2.1. You may be required to create an account to access certain features of the Platform.
                        <br>
                        2.2. When registering, you agree to provide accurate, current, and complete information about
                        yourself.
                        <br>
                        2.3. You are responsible for maintaining the confidentiality of your account information and
                        password.
                        <br>

                        <b>Content and Use of the Platform</b>
                        <br>
                        3.1. The Platform provides educational content and resources.
                        <br>
                        3.2. You may not use the Platform for any illegal, unauthorized, or prohibited purposes.
                        <br>
                        3.3. You agree not to engage in any activity that may disrupt or interfere with the Platform's
                        functionality.
                        <br>

                        <b>User Conduct</b>
                        <br>
                        4.1. You agree to respect other users and not engage in any form of harassment, discrimination, or
                        bullying.
                        <br>
                        4.2. You will not post, transmit, or share any content that is offensive, harmful, or violates the
                        rights of others.
                        <br>

                        <b>Privacy</b>
                        <br>
                        5.1. We collect and use your personal information in accordance with our Privacy Policy, which is
                        incorporated into these Terms.
                        <br>

                        <b>Parental Consent and Supervision</b>
                        <br>
                        6.1. Parents or legal guardians are responsible for supervising and monitoring their child's use of
                        the Platform.
                        <br>
                        6.2. Parents or legal guardians should contact us immediately if they believe their child is using
                        the Platform without their consent.
                        <br>

                        <b>Termination</b>
                        <br>
                        7.1. We reserve the right to terminate or suspend your access to the Platform at our discretion,
                        with or without cause.
                        <br>
                        7.2. You may terminate your account by contacting us.
                        <br>

                        <b>Modifications to Terms</b>
                        <br>
                        8.1. We may update or modify these Terms at any time, and any changes will be effective immediately
                        upon posting.
                        <br>
                        8.2. You are responsible for reviewing these Terms regularly.
                        <br>

                        <b>Limitation of Liability</b>
                        <br>
                        9.1. We are not liable for any direct, indirect, incidental, consequential, or special damages
                        resulting from your use of the Platform.
                        <br>

                        <b>Governing Law</b>
                        <br>
                        10.1. These Terms are governed by the laws of Morrocan Kingdom.
                        <br>


                        <b>Contact Information</b>
                        <br>
                        11.1. For questions or concerns regarding these Terms, please contact us at
                        <a href="">EclassePlatform@gmail.com</a>
                        <br>


                        By using the Platform, you acknowledge that you have read, understood, and agreed to these Terms and
                        any applicable policies or guidelines. If you do not agree to these Terms, please do not
                        use the Platform.&hellip;</p>
                </div>
                <div class="modal-footer justify-content-between">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    >
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->





    <div class="register-box">
        @if (session('failed'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ session('failed') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        @error('name')
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @enderror

    @error('last_name')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('avatar')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('email')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('phone')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('password')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror
    @error('password_confirmation')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror


    <div class="card card-outline card-primary">




        <div class="card-header text-center">
            <a href="../../index2.html" class="h1"><b>E-</b>classe</a>
        </div>
        <div class="card-body">
            <p class="login-box-msg">Enregistrer une nouvelle utilisateur</p>

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf

                <div class="input-group mb-3">
                    <img src="{{ asset('assets/images/project_images/default_avatar.png') }}" id="blah"
                        class="rounded mx-auto d-block mb-2" style="height: 200px;width:200px;" alt="your image">

                </div>

                <div class="input-group mb-3">
                    <div class="custom-file">
                        <input type="file" name="avatar" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">choiser un photo de profille</label>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nom" name="name"
                        value="{{ old('name') }}" required autofocus autocomplete="name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>

                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="last_name" placeholder="Prenom"
                        value="{{ old('last_name') }}" required autofocus autocomplete="last_name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>

                </div>

                <!-- phone mask -->

                <div class="input-group mb-3">
                    <input type="text" name="phone" class="form-control" data-mask placeholder="Telephone"
                        data-inputmask='"mask": "(99) 999-99999"'value="{{ old('phone') }}" required autofocus
                        autocomplete="phone">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <!-- /.form group -->


                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email"
                        value="{{ old('email') }}" required autocomplete="username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Mot de passe" name="password" required
                        autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>

                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Confirmer Mot de passe"
                        name="password_confirmation" required autocomplete="new-password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                            <label for="agreeTerms">
                                I agree to the <a href="" data-toggle="modal"
                                    data-target="#modal-default">terms</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center">
                <a href="{{ Route('enseignement.demande') }}" class="btn btn-block btn-primary">
                    <i class="fas fa-user-graduate mr-2"></i>
                    Envoyer un demande pour etre an enseignement
                </a>
            </div>

            <a href="{{ route('login') }}" class="text-center">j'ai déjà un mail</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
@endsection
