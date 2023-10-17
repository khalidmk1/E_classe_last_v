@extends('master.master_page')

@section('title')
@endsection


@section('content')
    <!-- Main content -->

      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">

       

        <!-- Default box -->
        <div class="card card-solid">
            <div class="card-body pb-0">
                <div class="row">


                    @foreach ($events as $event)
   
                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    {{ $event->title }}
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-7">
                                            <h2 class="lead">
                                                <b>{{ $event->user->name . ' ' . $event->user->last_name }}</b></h2>
                                            <p class="text-muted text-sm"><b>Description: </b> {{ $event->description }}
                                            </p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-building"></i></span> Address:
                                                    {{ $event->user->county }}</li>
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-phone"></i></span> Telephone:
                                                    {{ $event->user->phone }}</li>
                                            </ul>
                                        </div>

                                       
                                        

                                        <div class="col-5 text-center">
                                            @if (!empty($event->images) && count($event->images) > 0)
                                                <img class="img-fluid"
                                                    src="{{ asset('images/event/' . $event->images[0]) }}"
                                                    alt="Card image cap">
                                            @endif
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        
                                        <a href="{{ Route('events.show',$event->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> Voir Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endforeach

                </div>
            </div>
        </div>



        <!-- /.card-body -->


        <!-- /.card -->


    </section>
    <!-- /.content -->
@endsection
