@extends('master.master_page')

@section('title')
@endsection





@section('content')



    <!-- Main content -->
    <section class="content ">
        <div class="container-fluid">
            <div class="col-12" style="height: 20px"></div>
            <div class="row">


                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset('images/avatars/' . $events->user->avatar) }}" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">
                                {{ $events->user->name . ' ' . $events->user->last_name }}
                            </h3>

                            <p class="text-muted text-center">{{ $events->title }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Participant</b> <a
                                        class="float-right">{{ App\Models\Folow::where(['event_id' => $events->id, 'participat' => 1])->count() }}</a>
                                </li>
                                <li class="list-group-item text-center">
                                    <b>{{ $events->date }}</b>
                                </li>


                                <li class="list-group-item">



                                    <form action="{{ Route('event.edit',Crypt::encrypt($events->id)) }}" method="get">
                                        @csrf
                                       
                                        <button type="submit" class="btn btn-block btn-outline-warning">Mis à jour</button>
                                    </form>



                                </li>




                                <li class="list-group-item">

                                  
                                        <form action="{{ Route('chat.create', $events->user_id) }}" method="get" >
                                            @csrf


                                            <button type="submit" class="btn btn-block btn-outline-primary">
                                                <i class="fas fa-comments" aria-hidden="true"></i> Conversation
                                            </button>


                                        </form>
                                   

                                </li>

                            </ul>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">A propo de moi</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fas fa-book mr-1"></i> Matière</strong>

                            <p class="text-muted">
                                {{ $events->user->subject }}
                            </p>

                            <hr>

                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Ville</strong>

                            <p class="text-muted">{{ $events->user->county }}</p>

                            <hr>

                            <strong><i class="fas fa-phone"></i>Telephone</strong>

                            <p class="text-muted">
                                <span class="tag tag-danger">{{ $events->user->phone }}</span>

                            </p>



                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Utilisateur associé à ce cours</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            @foreach ($users as $user )
                            <div class="d-flex align-items-center justify-content-between">
                                <img src="{{asset('images/avatars/' . $user->avatar)}}" alt="user-avatar"
                                class="img-circle img-fluid" style="height: 100px ; width: 100px"> 
    
                                <strong class="text-muted">
                                    {{ $user->name . " " . $user->last_name}}
                                </strong>

                               
                                <form action="{{ Route('chat.create', $user->id) }}" method="get">
                                    @csrf


                                    <button type="submit" class="btn btn-block btn-outline-primary">
                                        <i class="fas fa-comments" aria-hidden="true"></i>
                                    </button>


                                </form>
                         

                            </div>
                           

                            <hr>
                            @endforeach

                            

                           

                           



                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="card">

                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane">

                                    <!-- Post -->
                                    <div class="post">

                                        <div class="row mb-3 ">

                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <strong>Description :</strong>
                                                    </div>
                                                    <div class="col-12">
                                                        <p>
                                                            {{ $events->description }}
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                            <div class="col-md-12 ">
                                                <video autoplay id="video" loop controls
                                                    style="  height: 100%; width: 100%">
                                                    <source src="{{ asset('videos/' . $events->video) }}" type="video/mp4"> 
                                                </video>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-12 mt-3">
                                                        <strong>Programme :</strong>
                                                    </div>
                                                    <div class="col-12">
                                                        <p>
                                                            {!! $events->programe !!}
                                                        </p>
                                                    </div>
                                                </div>

                                            </div>

                                            <!-- /.col -->
                                            <div class="col-md-12 mt-3">
                                                <div class="card">

                                                    <!-- /.card-header -->
                                                    <div class="card-body">
                                                        <div id="carouselExampleIndicators" class="carousel slide"
                                                            data-ride="carousel">
                                                            <ol class="carousel-indicators">
                                                                <li data-target="#carouselExampleIndicators"
                                                                    data-slide-to="0" class="active"></li>
                                                                <li data-target="#carouselExampleIndicators"
                                                                    data-slide-to="1"></li>
                                                                <li data-target="#carouselExampleIndicators"
                                                                    data-slide-to="2"></li>
                                                            </ol>
                                                            <!-- ... Previous code ... -->

                                                            <div class="carousel-inner">
                                                                <div class="carousel-item active ">
                                                                    <img class="d-block w-100 "
                                                                        src="{{ asset('images/event/' . $events->images[0]) }}"
                                                                        alt="First slide" style="height: 400px;">
                                                                </div>

                                                                @foreach ($events->images as $index => $image)
                                                                    <!-- Use a loop to access each image URL -->
                                                                    @if ($index !== 0)
                                                                        <!-- Skip the first image as it's already displayed as the active slide -->
                                                                        <div class="carousel-item">
                                                                            <img class="d-block w-100"
                                                                                src="{{ asset('images/event/' . $image) }}"
                                                                                alt="Slide {{ $index + 1 }}"
                                                                                style="height: 400px;">
                                                                            <!-- Provide an alt text for each slide -->
                                                                        </div>
                                                                    @endif
                                                                @endforeach

                                                            </div>

                                                            <!-- ... Next code ... -->

                                                            <a class="carousel-control-prev"
                                                                href="#carouselExampleIndicators" role="button"
                                                                data-slide="prev">
                                                                <span class="carousel-control-custom-icon"
                                                                    aria-hidden="true">
                                                                    <i class="fas fa-chevron-left"></i>
                                                                </span>
                                                                <span class="sr-only">Previous</span>
                                                            </a>
                                                            <a class="carousel-control-next"
                                                                href="#carouselExampleIndicators" role="button"
                                                                data-slide="next">
                                                                <span class="carousel-control-custom-icon"
                                                                    aria-hidden="true">
                                                                    <i class="fas fa-chevron-right"></i>
                                                                </span>
                                                                <span class="sr-only">Next</span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <!-- /.card-body -->
                                                </div>
                                                <!-- /.card -->
                                            </div>
                                            <!-- /.col -->
                                        </div>
                                        <!-- /.row -->
                                    </div>
                                    <!-- /.post -->
                                </div>

                            </div>
                            <!-- /.tab-content -->
                        </div><!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    <script>
        function stop_video() {
            var media = $("#video").get(0);
            media.pause();
            media.currentTime = 0;
        }
        stop_video()
    </script>

@endsection
