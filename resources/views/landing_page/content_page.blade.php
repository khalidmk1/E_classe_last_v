@extends('master.master_landing_page')

@section('title')
@endsection

@section('content')
    <style>
        
    </style>




    <section class="container-fluid first_content p-3 " id="Accueil">
        <div class="row align-items-center justify-content-end row-gap-3 mt-1">
            <div class="col-md-6 content_introduction">
                <div class="row  align-items-center ">
                    <div class="col-12">
                        @error('message')
                            <div class="alert alert-warning alert-dismissible fade show"
                                style="display: flex; align-items: center;" role="alert">
                                <strong>{{ $message }}</strong>
                                <button style="background: #f9eb6e" type="button" class="close" data-dismiss="alert"
                                    aria-label="Close">
                                    <span style="color: #383c3a" aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @enderror
                    </div>
                    <div class="col-12">
                        <h5>Se Préparer à un Futur Prometteur</h5>
                    </div>
                    <div class="col-12">
                        <h2 class="big_title">E-Classe, l’éducation virtuelle du succés au primaire, collége et au lycée.
                        </h2>
                    </div>
                    <div class="col-12">
                        <h4>Bienvenue dans l'univers de l'apprentissage en ligne, où chaque élève peut exceller et réussir !
                        </h4>
                    </div>
                    <div class="col-12">
                        <a href="{{ Route('register') }}">
                            <button class="p-3">Je candidate</button>
                        </a>

                    </div>
                </div>
            </div>
            <div class="col-5  image_side">
                <img src="{{ asset('assets/landing_page_img/img_introduction_classe.png') }} " class="img-fluid"
                    alt="...">
            </div>
        </div>
    </section>


    <section class="container" style="padding: 160px 0px 160px 0;" id="about">
        <div class="row">
            <div class="col-12 pl-0">
                <h3>Obtenir un enseignement de qualité</h3>
            </div>
            <div class="col-12 ">
                <p>Problems trying to resolve the conflict between
                    the two major realms of Classical physics: Newtonian mechanics </p>
            </div>
            <div class="col-12">
                <div class="row align-items-center justify-content-between">
                    <div class="col-sm-6">
                        <img src="{{ asset('assets/landing_page_img/img_about_classes.png') }} " class="img-fluid"
                            alt="...">
                    </div>

                    <div class="col-sm-5 ">
                        <div class="row align-items-center number_introduction ">
                            <div class="col-12 title_do">
                                Le plus fiable dans notre domaine
                            </div>
                            <div class="col-12">
                                <p>Most calendars are designed for teams. Slate s designed
                                    for freelancers </p>
                            </div>
                            <div class="col-12 card_introduction">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <span class="">01</span>
                                    </div>
                                    <div class="col-10">
                                        <div class="row align-items-center">
                                            <div class="col-12">
                                                <h6>QUALITÉ</h6>
                                            </div>
                                            <div class="col-12">
                                                <p>Un choix d’enseignants qualifiés et notés par les élèves eux-mêmes.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-12 card_introduction">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <span>02</span>
                                    </div>
                                    <div class="col-10">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>INTERACTION EN DIRECT</h6>
                                            </div>
                                            <div class="col-12">
                                                <p>Vous pourrez assister à toutes les sessions en direct.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 card_introduction">
                                <div class="row align-items-center">
                                    <div class="col-2">
                                        <span>03</span>
                                    </div>
                                    <div class="col-10">
                                        <div class="row">
                                            <div class="col-12">
                                                <h6>COLLABRATION</h6>
                                            </div>
                                            <div class="col-12">
                                                <p>Posez toutes vos questions à tout moment dans votre groupe d'études.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="container-fluid bg_static p-5" id="Contact">

        <div class="row">
            <div class="col-sm-5 pl-5">
                <img src="{{ asset('assets/landing_page_img/img_setatic.png') }}" class="img-fluid" alt="...">
            </div>
            <div class="col-sm-6 m-auto">
                <div class="row ">
                    <hr>
                    <div class="col-12">
                        <h2 class="text-white">Obtenez d’excellents résultats sans jamais quitter la maison.</h2>
                    </div>
                    <div class="col-12 ">
                        <p class="text-white">Nous vous proposons les meilleurs professeurs depuis le confort de votre
                            maison !</p>
                    </div>
                   
                </div>


            </div>
        </div>

    </section>

    <!-- Team -->
    <section id="team" class="pb-5">
        <div class="container">
            <h2>Nos Prof</h2>
            <div class="row">
                @foreach ($users as $user)
                    <!-- Team member -->
                    <div class="col-xs-12 col-sm-6 col-md-4 ">
                        <div class="image-flip ">
                            <div class="mainflip flip-0">
                                <div class="frontside">
                                    <div class="card">
                                        <div class="card-body text-center shadow-sm p-3 mb-5 rounded">
                                            <p><img class=" img-fluid"
                                                    src="{{ asset('images/avatars/' . $user->avatar) }}" alt="card image">
                                            </p>
                                            <h4 class="card-title">{{ $user->name . ' ' . $user->last_name }}</h4>
                                            <p class="card-text">{{ $user->subject }}</p>
                                            <a href="{{ Route('event.sort') }}" class="btn btn-primary btn-sm"><i
                                                    class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


@endsection
