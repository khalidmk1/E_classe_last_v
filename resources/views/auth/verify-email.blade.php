{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Resend Email') }}
                </x-primary-button>
            </div>
        </form>


        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit"
                class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout> --}}


@extends('master.blank_master_page')

@section('content')
    <div class="card card-outline card-primary w-50 mt-5">

        <div class="card-body ">

            <div class="row justify-content-center">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><strong>
                                    Merci pour l'enregistrement ! Avant de commencer, pourriez-vous s'il vous plaît
                                    vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer
                                    par e-mail ?
                                    Si vous n'avez pas reçu l'e-mail, nous vous en enverrons volontiers un autre.</strong>
                            </h5>
                            @if (session('status') == 'verification-link-sent')
                                <p class="card-text ">Un nouveau lien de vérification a été envoyé à l'adresse e-mail que
                                    vous avez
                                    fournie lors de l'inscription.</p>
                            @endif

                            <div class="row justify-content-between align-items-cente mt-5">
                                <form method="POST" action="{{ route('verification.send') }}">
                                    @csrf

                                    <div>
                                        <button type="submit" class="btn btn-block btn-outline-info">
                                            Ré-envoyer l'email
                                        </button>

                                    </div>
                                </form>


                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <button type="submit" class="btn btn-block btn-outline-danger">
                                        Log Out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
