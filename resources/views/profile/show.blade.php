@extends('master.master_table')

@section('title')
@endsection

@section('sepirator')
    <section class="content-header">
        {{-- <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1></h1>
      </div>
    </div>
  </div><!-- /.container-fluid --> --}}
    </section>
@endsection

@section('content')
    {{-- <!-- Main content -->
    <section class="content">
    
        <!-- Default box -->
        <div class="card">
            <div class="card-body">
              
                <div class="row">
                    <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                        <div class="row">
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">suiveurs de ce cour</span>
                                        <span class="info-box-number text-center text-muted mb-0">5</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-4">
                                <div class="info-box bg-light">
                                    <div class="info-box-content">
                                        <span class="info-box-text text-center text-muted">Estimated project duration</span>
                                        <span class="info-box-number text-center text-muted mb-0">20</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4></h4>
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="{{asset('images/avatars/'. $profile->avatar)}}"
                                            alt="user image">
                                        <span class="username">
                                            <a href="#">{{$profile->name . " " .$profile->last_name}}</a>
                                        </span>
                                        <span class="description">Partagé publiquement - {{$profile->created_at}}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                    
                                    </p>

                                    <a href="{{Route('profile.edit')}}">update</a>

                                 
                                </div>

                               
                               

                          
                            </div>
                        </div>
                    </div>
                    

                    
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->






    </section>
    <!-- /.content --> --}}

    <style>

    </style>

    <div class="container emp-profile ">
        
        <div class="row pt-2">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{ asset('images/avatars/' . $profile->avatar) }}" class="rounded mx-auto d-block" alt="avatar" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{ $profile->name . ' ' . $profile->last_name }}
                    </h5>
                    <h6>
                        {{ $profile->subject }}
                    </h6>
                    <p class="proile-rating">Suivez de c'est cours:
                     
                        <span>{{ App\Models\Folow::where('user_id', auth()->user()->id)->get()->count() }}</span>
                    </p>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">About</a>
                        </li>

                    </ul>
                </div>
            </div>
            @if (auth()->user()->id == $profile->id)
                <div class="col-md-2">
                    <a href="{{ Route('profile.edit') }}" class="btn btn-block btn-outline-warning" name="btnAddMore"
                        value="Edit Profile">Modifier</a>
                        <i class="far fa-comments"></i>

                </div>
            @endif

        </div>
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab">


                    <div class="row">
                        <div class="col-md-6">
                            <label>Nom</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $profile->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $profile->email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Telephone</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $profile->phone }}</p>
                        </div>
                    </div>
                   
                    @if ( $profile->subject  !== null)
                    <div class="row">
                        <div class="col-md-6">
                            <label>Profession</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $profile->subject }}</p>
                        </div>
                    </div>
                    @endif
                    
                    @if (auth()->user()->role == 'prof' && auth()->user()->role == 'admin')
                    <div class="row">
                        <div class="col-md-6">
                            <label>
                                Cours Total</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ App\Models\folow::where('user_id', auth()->user()->id)->get()->count() }}</p>
                        </div>
                    </div>
                    @endif
                   


                </div>
            </div>
        </div>

        @if (auth()->user()->role == 'student' )
     
        @else
            <div class="blog-home2 py-5">
                <div class="container">
                    <!-- Row  -->
                    <div class="row justify-content-center">
                        <!-- Column -->
                        <div class="col-md-8 text-center">
                            <h3 class="my-3">Cours</h3>
                        </div>
                        <!-- Column -->
                        <!-- Column -->
                    </div>

                    <div class="row mt-4">
                        <!-- Column -->
                        @foreach ($events as $event)
                            <div class="col-md-4 on-hover ">
                                <div class="card border-0 mb-4">
                                    <img class="card-img-top " style="height: 200px"
                                        src="{{ asset('images/event/' . $event->images[0]) }}" alt="wrappixel kit">
                                    <div
                                        class="date-pos bg-info-gradiant p-2 d-inline-block text-center rounded text-white position-absolute">
                                        {{ $event->created_at->format('M') }}<span
                                            class="d-block">{{ $event->created_at->format('d') }}</span></div>
                                    <h5 class="font-weight-medium m-3"><a href="#"
                                            class="text-decoration-none link">{{ $event->title }}</a></h5>
                                    <p class="m-3">{{ $event->description }}</p>

                                    <a href="{{ Route('events.show', Crypt::encrypt($event->id)) }}"
                                        class="btn btn-block btn-outline-info w-25 m-2">Voir</a>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        @endif





        {{--  <div class="card-media">
            <!-- media container -->
            <div class="card-media-object-container">
              
                <div class="card-media-object"
                            style="background-image: url({{ asset('images/event/' . $event->images[0]) }});"></div>
                @endforeach
                 <div class="card-media-object" style="background-image: url({{ asset('images/event/' . $events->images[0]) }});"></div>
                <ul class="card-media-object-social-list">
                    <li>
                        <img src="https://s13.postimg.cc/c5aoiq1w7/stock3_f.jpg" class="">
                    </li>
                </ul>
            </div>
            <!-- body container -->
            <div class="card-media-body">
                <div class="card-media-body-top">
                    <span class="subtle">Mon, APR 09, 7:00 PM</span>
                    <div class="card-media-body-top-icons u-float-right">
                        <svg fill="#888888" height="16" viewBox="0 0 24 24" width="16"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M0 0h24v24H0z" fill="none" />
                            <path
                                d="M18 16.08c-.76 0-1.44.3-1.96.77L8.91 12.7c.05-.23.09-.46.09-.7s-.04-.47-.09-.7l7.05-4.11c.54.5 1.25.81 2.04.81 1.66 0 3-1.34 3-3s-1.34-3-3-3-3 1.34-3 3c0 .24.04.47.09.7L8.04 9.81C7.5 9.31 6.79 9 6 9c-1.66 0-3 1.34-3 3s1.34 3 3 3c.79 0 1.5-.31 2.04-.81l7.12 4.16c-.05.21-.08.43-.08.65 0 1.61 1.31 2.92 2.92 2.92 1.61 0 2.92-1.31 2.92-2.92s-1.31-2.92-2.92-2.92z" />
                        </svg>
                        <svg fill="#888888" height="16" viewBox="0 0 24 24" width="16"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M17 3H7c-1.1 0-1.99.9-1.99 2L5 21l7-3 7 3V5c0-1.1-.9-2-2-2z" />
                            <path d="M0 0h24v24H0z" fill="none" />
                        </svg>
                    </div>
                </div>
                <span class="card-media-body-heading">DAY // NIGHT - Tycho (Live) w/ Gold Panda, Com Truise + More at 1015
                    Folsom</span>
                <div class="card-media-body-supporting-bottom">
                    <span class="card-media-body-supporting-bottom-text subtle">1015 Folsom, San Francisco, CA</span>
                    <span class="card-media-body-supporting-bottom-text subtle u-float-right">$25 &ndash; $80</span>
                </div>
                <div class="card-media-body-supporting-bottom card-media-body-supporting-bottom-reveal">
                    <span class="card-media-body-supporting-bottom-text subtle">#Music #Performance</span>
                    <a href="#/" class="card-media-body-supporting-bottom-text card-media-link u-float-right">VIEW
                        TICKETS</a>
                </div>
            </div>
        </div>

    </div> --}}



    @endsection
