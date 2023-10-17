@extends('master.master_landing_page')

@section('title')
@endsection

@section('content')
    <style>
        .btn-primary:hover,
        .btn-primary:focus {
            background-color: #108d6f;
            border-color: #108d6f;
            box-shadow: none;
            outline: none;
        }

        .btn-primary {
            color: #fff;
            background-color: #007b5e;
            border-color: #007b5e;
        }

        section {
            padding: 60px 0;
        }

        section .section-title {
            text-align: center;
            color: #007b5e;
            margin-bottom: 50px;
            text-transform: uppercase;
        }

        #team .card {
            border: none;
            background: #ffffff;
        }

        .frontside .card .card-body img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
        }
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
                                Most trusted in our field
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


    <section class="container card_title" style="padding: 50px 0px;" id="niveau">
        <div class="col-12 p-2">
            <h6 style="color:#FF6551 !important">Practice Advice</h6>
        </div>
        <div class="col-12 p-2">
            <h2>Nos niveaux</h2>
        </div>
        <div class="col-12 p-2">
            <p>Problems trying to resolve the conflict between
                the two major realms of Classical physics: Newtonian mechanics </p>
        </div>
        {{--  <div class="row mb-5">
        <div class="col-12">
            <div class="row">
                <div class="col-6">
                    <div class="row">
                        <div class="col-12">
                            <h6 style="color:#FF6551 !important">Practice Advice</h6>
                        </div>
                        <div class="col-12">
                            <h2>Nos niveaux</h2>
                        </div>
                        <div class="col-12">
                            <p>Problems trying to resolve the conflict between 
                                the two major realms of Classical physics: Newtonian mechanics </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}


        <div class="row text-center justify-content-between">
            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5 text-centre">
                <div class="bg-white rounded shadow-sm py-5 px-4 m-auto" style="width: 222px;">
                    <div class="col-12 text-start ">
                        <i class="fa fa-graduation-cap  icon_niveaux" aria-hidden="true"></i>
                    </div>
                    <div class="col-12 text-start pt-3"><span class="small text-uppercase   ">Primaire</span></div>
                    <hr class="lin_card">
                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item text-start ">The gradual
                            accumulation of
                            information about </li>
                    </ul>
                </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5 text-centre">
                <div class="bg-white rounded shadow-sm py-5 px-4 m-auto" style="width: 222px;">
                    <div class="col-12 text-start ">
                        <i class="fa fa-graduation-cap  icon_niveaux" aria-hidden="true"></i>
                    </div>
                    <div class="col-12 text-start  pt-3"><span class="small text-uppercase   ">Primaire</span></div>
                    <hr class="lin_card">
                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item text-start ">The gradual
                            accumulation of
                            information about </li>
                    </ul>
                </div>
            </div>
            <!-- End-->

            <!-- Team item-->
            <div class="col-xl-3 col-sm-6 mb-5 text-centre">
                <div class="bg-white rounded shadow-sm py-5 px-4 m-auto" style="width: 222px;">
                    <div class="col-12 text-start ">
                        <i class="fa fa-graduation-cap  icon_niveaux" aria-hidden="true"></i>
                    </div>
                    <div class="col-12 text-start  pt-3"><span class="small text-uppercase   ">Primaire</span></div>
                    <hr class="lin_card">
                    <ul class="social mb-0 list-inline mt-3">
                        <li class="list-inline-item text-start ">The gradual
                            accumulation of
                            information about </li>
                    </ul>
                </div>
            </div>
            <!-- End-->




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
                    <div class="col-12">
                        <a href="" class="learn_more">Learn More <i class="fas fa-angle-right"></i></a>
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


    {{--  contact --}}
    <section>
        <div class="container text-center" style="justify-content: space-evenly; display: flex">
            <div class="row flex-column justify-content-center align-items-center" style="height: 600px">
                <div class="col">
                    <h2>Contactez-nous</h2>
                </div>
                <div class="col">
                    <input type="text" class="form-control" placeholder="Nom">
                </div>
                <div class="col">
                    <input type="email" class="form-control" placeholder="Email">
                </div>
                <div class="col">
                    <input type="text" name="phone" class="form-control" data-mask placeholder="Telephone"
                        data-inputmask='"mask": "(99) 999-99999"' required autocomplete="phone">
                </div>
                <div class="col">
                    <select name="" class="form-control" id="">
                        <option value="Comment nous avez-vous trouvé?">Comment nous avez-vous trouvé?</option>
                    </select>
                </div>
                <div class="col">
                    <button
                        style="background: #DD5471; display: flex;
                    width: 100%;
                    height: 50px;
                    padding: 12px 24px;
                    justify-content: center;
                    align-items: center;
                    gap: 10px;">Send</button>
                </div>
                <div class="col-12">
                    <div class="row">
                        <div class="col">
                            <div class="d-flex ">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="29" height="29"
                                        viewBox="0 0 29 29" fill="none">
                                        <path
                                            d="M16.2039 0.423828V2.35227C18.1113 2.35227 19.8982 2.83437 21.5647 3.79859C23.1508 4.74272 24.4157 6.00826 25.3594 7.5952C26.3231 9.2625 26.805 11.0503 26.805 12.9587H28.7324C28.7324 10.6887 28.1602 8.57951 27.0158 6.63098C25.9115 4.74272 24.4157 3.24618 22.5284 2.14134C20.5809 0.996333 18.4727 0.423828 16.2039 0.423828ZM6.23538 3.31648C5.69328 3.31648 5.22146 3.48723 4.8199 3.82872L1.7179 6.99257L1.80825 6.9323C1.30631 7.35415 0.975027 7.87643 0.814406 8.49916C0.673862 9.12188 0.714017 9.72452 0.934872 10.3071C1.49705 11.8739 2.24996 13.481 3.19361 15.1282C4.51874 17.3981 6.09484 19.437 7.92191 21.2449C10.8532 24.1978 14.4973 26.528 18.8542 28.2355H18.8843C19.4666 28.4364 20.0488 28.4766 20.6311 28.356C21.2334 28.2355 21.7655 27.9744 22.2273 27.5726L25.269 24.5293C25.6706 24.1275 25.8714 23.6354 25.8714 23.0528C25.8714 22.4502 25.6706 21.948 25.269 21.5462L21.3238 17.5688C20.9222 17.1671 20.4203 16.9662 19.8179 16.9662C19.2156 16.9662 18.7137 17.1671 18.3121 17.5688L16.4148 19.4973C14.8889 18.7741 13.5637 17.8802 12.4394 16.8155C11.315 15.7308 10.4216 14.415 9.75901 12.8683L11.6865 10.9398C12.1081 10.4979 12.3189 9.97562 12.3189 9.37298C12.3189 8.75026 12.078 8.24806 11.5961 7.86639L11.6865 7.95678L7.65086 3.82872C7.2493 3.48723 6.77748 3.31648 6.23538 3.31648ZM16.2039 4.2807V6.20914C17.4287 6.20914 18.553 6.51046 19.577 7.11309C20.621 7.71573 21.4442 8.53933 22.0466 9.5839C22.6489 10.6084 22.95 11.7333 22.95 12.9587H24.8775C24.8775 11.3918 24.486 9.93544 23.703 8.58955C22.9199 7.28384 21.8759 6.23927 20.5708 5.45584C19.2256 4.67242 17.77 4.2807 16.2039 4.2807ZM6.23538 5.24492C6.29561 5.24492 6.36588 5.27505 6.4462 5.33532L10.3915 9.37298C10.4115 9.45333 10.3915 9.52364 10.3312 9.5839L7.47016 12.4163L7.68097 13.0189L8.07249 13.8626C8.39373 14.5456 8.76517 15.2085 9.1868 15.8513C9.76905 16.7553 10.4115 17.5287 11.1143 18.1715C12.0579 19.0955 13.1923 19.9392 14.5174 20.7025C15.18 21.0842 15.7422 21.3654 16.2039 21.5462L16.8063 21.8174L19.7276 18.8946C19.7677 18.8545 19.7979 18.8344 19.8179 18.8344C19.838 18.8344 19.8681 18.8545 19.9083 18.8946L23.974 22.9624C24.0142 23.0026 24.0342 23.0327 24.0342 23.0528C24.0342 23.0528 24.0142 23.0729 23.974 23.1131L20.9624 26.0961C20.5206 26.4778 20.0388 26.5783 19.5168 26.3975C15.4209 24.8105 12.0077 22.641 9.27715 19.889C7.59062 18.2016 6.11491 16.2832 4.85002 14.1338C3.94652 12.587 3.24381 11.0905 2.74186 9.64417V9.61404C2.66155 9.43324 2.65151 9.22232 2.71175 8.98127C2.77198 8.72012 2.88241 8.51925 3.04303 8.37863L6.02456 5.33532C6.0848 5.27505 6.15507 5.24492 6.23538 5.24492ZM16.2039 8.13758V10.066C17.0071 10.066 17.6897 10.3472 18.2519 10.9097C18.814 11.4722 19.0951 12.1552 19.0951 12.9587H21.0226C21.0226 12.0949 20.8017 11.2914 20.36 10.5481C19.9384 9.80487 19.3561 9.22232 18.6133 8.80048C17.8704 8.35854 17.0673 8.13758 16.2039 8.13758Z"
                                            fill="black" />
                                    </svg>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    Telephone <br><span>065659798</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    viewBox="0 0 28 28" fill="none">
                                    <path
                                        d="M7.95455 2.625V4.59624L1.75 8.63565V25.375H26.5682V8.63565L20.3636 4.59624V2.625H7.95455ZM10.0227 4.69318H18.2955V12.6428L14.1591 15.3249L10.0227 12.6428V4.69318ZM11.0568 6.76136V8.82955H17.2614V6.76136H11.0568ZM7.95455 7.0522V11.2855L4.6907 9.18501L7.95455 7.0522ZM20.3636 7.0522L23.6275 9.18501L20.3636 11.2855V7.0522ZM11.0568 9.86364V11.9318H17.2614V9.86364H11.0568ZM3.81818 11.0916L14.1591 17.7809L24.5 11.0916V23.3068H3.81818V11.0916Z"
                                        fill="black" />
                                </svg>
                                <div class="flex-grow-1 ms-3">
                                    Email <br><span>E_classe@gmail.com</span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="d-flex ">
                                <div class="flex-shrink-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                        viewBox="0 0 28 28" fill="none">
                                        <path
                                            d="M10.0625 1.64062V6.5625H8.09375V4.59375H2.1875V22.3125H4.15625V23.2969C4.15625 24.0967 4.44336 24.7837 5.01758 25.3579C5.6123 25.9526 6.30957 26.25 7.10938 26.25C7.90918 26.25 8.59619 25.9526 9.17041 25.3579C9.76514 24.7837 10.0625 24.0967 10.0625 23.2969V22.3125H25.8125V6.5625H21.875V1.64062H10.0625ZM12.0312 3.60938H19.9062V8.53125H12.0312V3.60938ZM4.15625 6.5625H6.125V20.3438H4.15625V6.5625ZM8.09375 8.53125H10.0625V10.5H21.875V8.53125H23.8438V20.3438H8.09375V8.53125ZM11.0469 12.4688V14.4375H13.0156V12.4688H11.0469ZM14.9844 12.4688V14.4375H16.9531V12.4688H14.9844ZM18.9219 12.4688V14.4375H20.8906V12.4688H18.9219ZM11.0469 16.4062V18.375H13.0156V16.4062H11.0469ZM14.9844 16.4062V18.375H16.9531V16.4062H14.9844ZM18.9219 16.4062V18.375H20.8906V16.4062H18.9219ZM6.125 22.3125H8.09375V23.2969C8.09375 23.5635 7.99121 23.7993 7.78613 24.0044C7.60156 24.189 7.37598 24.2812 7.10938 24.2812C6.84277 24.2812 6.60693 24.189 6.40186 24.0044C6.21729 23.7993 6.125 23.5635 6.125 23.2969V22.3125Z"
                                            fill="black" />
                                    </svg>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    Fax <br><span>005659798</span>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="row  justify-content-center">
                <div class="col-8" style=" position: relative; top: 10%;">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3323.3310522156403!2d-7.612773199999999!3d33.5967139!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xda7d282b7c663cb%3A0xe95e482a5cf0a110!2sIFIAG%20Casablanca!5e0!3m2!1sfr!2sma!4v1696260922924!5m2!1sfr!2sma"
                        width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="col-4"style="background: #183A4A;">col-4</div>
            </div>
        </div>
    </section>
@endsection
