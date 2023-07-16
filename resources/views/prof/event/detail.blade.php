@extends('master.master_table')

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
                                        @foreach ($events->images as $image )
                                        <div class="col-sm p-1">
                                            <img src="{{asset('images/event/' . $image)}}" alt="..." class="img-thumbnail " style="height: 237px;" >
                                          </div>
                                        @endforeach
                                      
                                    
                                    </div>
                                  </div>
                               

                                
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                        <div>
                            <video autoplay id="v1" loop controls style="top: 0 !important">
                                <source src="{{ asset('videos/' . $events->video) }}" type="video/mp4" >
                            </video>
                        </div>
                        <div class="text-center mt-5 mb-3 position-absolute " style="bottom: 0 ; right: 0;">
                            <a href="#" class="btn btn-block btn-outline-warning">Modifier</a>
                        </div>
                    </div>

                    
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->






    </section>
    <!-- /.content -->
@endsection
