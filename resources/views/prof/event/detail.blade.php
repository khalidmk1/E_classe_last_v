{{-- @extends('master.master_table')

@section('title')
@endsection


@section('content')
    <!-- Main content -->
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
                                        <span class="info-box-number text-center text-muted mb-0">2000</span>
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
                                <h4>{{$events->title}}</h4>
                                <div class="post">
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="{{asset('images/avatars/'. $events->user->avatar)}}"
                                            alt="user image">
                                        <span class="username">
                                            <a href="#">{{$events->user->name . " " .$events->user->last_name}}</a>
                                        </span>
                                        <span class="description">Partagé publiquement - {{$events->created_at}}</span>
                                    </div>
                                    <!-- /.user-block -->
                                    <p>
                                      {{$events->description}}
                                    </p>

                                 
                                </div>

                                <div class="container">
                                    <div class="row align-items-center">
                                        @foreach ($events->images as $image)
                                        <div class="col-sm p-1">
                                            <img src="{{asset('images/event/' . $image)}}" alt="..." class="img-thumbnail " style="height: 237px;" >
                                          </div>
                                        @endforeach
                                      
                                    
                                    </div>
                                  </div>
                               

                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2 ">
                        <div>
                            <video autoplay id="v1" loop controls style="top: 0 !important">
                                <source src="{{ asset('videos/' . $events->video) }}" type="video/mp4" >
                            </video>
                        </div>
                        @if (auth()->user()->role == 'prof')
                        <div class="text-center mt-5 mb-3 position-absolute " style="bottom: 0 ; right: 0;">
                            <a href="#" class="btn btn-block btn-outline-warning">Modifier</a>
                        </div>
                        @else
                       
                        <form action="{{Route('update.event' , $events->id)}}" method="post">
                            @csrf
                            @if (App\Models\Folow::where(['user_id' => auth()->user()->id, 'event_id' => $events->id])->where('participat', 0)->exists())
                            <div class="text-center mt-5 mb-3 position-absolute " style="bottom: 0 ; right: 0;">
                                <button type="submit" class="btn btn-block btn-outline-success">Partciper</button>  
                            </div>
                            @endif
                        </form>
                        
                       
                       
                        @endif
                       
                    </div>

                    
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->






    </section>
    <!-- /.content -->
@endsection --}}



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

                            <h3 class="profile-username text-center">{{ $events->user->name . $events->user->last_name }}
                            </h3>

                            <p class="text-muted text-center">{{ $events->title }}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Suivis</b> <a class="float-right">{{App\Models\Folow::where(['event_id' => $events->id , 'folow' => 1 ])->count()}}</a>
                                </li>
                                @if (auth()->user()->role == 'prof')
                                    <li class="list-group-item">

                                        <a href="#" class="btn btn-block btn-outline-warning">Modifier</a>

                                    </li>
                                @else
                                    <li class="list-group-item">
                                        @if (App\Models\Folow::where(['user_id' => auth()->user()->id, 'event_id' => $events->id , 'participat'=>0])->exists())
                                            <form action="{{ Route('store.folow', $events->id) }}" method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-block btn-outline-success">Partciper</button>
                                            </form>
                                        @elseif  (App\Models\Folow::where(['user_id' => auth()->user()->id, 'event_id' => $events->id])->where('participat', 1)->exists())
                                            <form action="{{ Route('update.event', $events->id) }}" method="post">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-block btn-outline-success">unPartciper</button>
                                            </form>
                                           
                                        @endif


                                    </li>
                                @endif
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
                                                <video autoplay id="v1" loop controls
                                                    style="  height: 100%; width: 100%">
                                                    <source src="{{ asset('videos/' . $events->video) }}" type="video/mp4">
                                                </video>
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
@endsection
