@extends('master.master_table')

@section('title')
@endsection

@section('model')
@endsection

@section('content')

    <!-- Main content -->
    @if (auth()->user()->role == 'prof')
        <section class="content">

            <!-- Default box -->

            <div class="card-body pb-0">
                <div class="row">

                    @foreach ($events as $event)
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog " role="document" style="top: 25%">
                                <div class="modal-content bg-transparent">
                                    <div class="modal-header border-0">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <video autoplay id="v1" loop controls>
                                            <source src="{{ asset('videos/' . $event->video) }}" type="video/mp4">
                                        </video>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">

                            <div class="card bg-light d-flex flex-fill">
                                <div class="card-header text-muted border-bottom-0">
                                    {{ $event->title }}
                                </div>

                                @if (!empty($event->images) && count($event->images) > 0)
                                    <img class="card-img-top" src="{{ asset('images/event/' . $event->images[0]) }}"
                                        alt="Card image cap" style="height: 300px; ">
                                @endif

                                <div class="card-body pt-0">
                                    <div class="row align-items-center">
                                        <div class="col-5 text-center">
                                            <a type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target="#exampleModal">
                                                <i class="fas fa-play"></i>

                                            </a>

                                        </div>
                                        <div class="col-7">
                                            <h2 class="lead">
                                                <b>{{ $event->user->name . ' ' . $event->user->last_name }}</b>
                                            </h2>
                                            <p class="text-muted text-sm"><b>A prorpos: </b> {{ $event->user->subject }}</p>
                                            <p class="text-muted text-sm"><b>Description: </b>
                                                {{ substr($event->description, 0, 120) }}...</p>
                                            <ul class="ml-4 mb-0 fa-ul text-muted">
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-building"></i></span>
                                                    Ville: {{ $event->user->county }}</li>
                                                <li class="small"><span class="fa-li"><i
                                                            class="fas fa-lg fa-phone"></i></span>
                                                    Phone : {{ $event->user->phone }}</li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="{{ Route('event.show', Crypt::encrypt($event->id)) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-credit-card" aria-hidden="true"></i> Voir detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
            <!-- /.card-body -->


            <!-- /.card -->

            <script>
                var modal = document.getElementById('exampleModal');
                const video = document.querySelector("#v1");
                if (modal.classList.contains('show')) {
                    console.log('is show');
                } else {
                    video.pause();
                }

                // if modal is not shown/visible then do something
            </script>

        </section>
        <!-- /.content -->
    @else
        <section class="content">

            @if (session('valide'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('valide') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @elseif (session('failed'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>{{ session('failed') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <!-- Default box -->

            <!-- Main content -->
            <section class="content">
                <div style="height: 20px"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form action="{{ route('event.sort') }}" method="get">
                                @csrf
                                <div class="input-group">
                                    <input type="search" name="search" class="form-control form-control-lg"
                                        placeholder="Chercher par le titre de cour" ">
                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-lg btn-default">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </section>

                        <div class="card-body pb-0">
                            <div class="row">

                                   @foreach ($events_all as $event)
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog " role="document" style="top: 25%">
                                            <div class="modal-content bg-transparent">
                                                <div class="modal-header border-0">
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <video autoplay id="v1" loop controls>
                                                        <source src="{{ asset('videos/' . $event->video) }}"
                                                            type="video/mp4">
                                                    </video>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">

                                        <div class="card bg-light d-flex flex-fill">
                                            <div class="row justify-content-between">
                                                <div class="card-header text-muted border-bottom-0">
                                                    {{ $event->title }}
                                                </div>
                                                @if (App\Models\Folow::where(['user_id' => auth()->user()->id, 'event_id' => $event->id, 'folow' => 1])->exists())
                                                    <div class="card-header text-muted border-bottom-0">
                                                        <i class="fa fa-star" aria-hidden="true"></i>
                                                    </div>
                                                @endif

                                            </div>

                                            @if (!empty($event->images) && count($event->images) > 0)
                                                <img class="card-img-top"
                                                    src="{{ asset('images/event/' . $event->images[0]) }}"
                                                    alt="Card image cap" style="height: 300px; ">
                                            @endif

                                            <div class="card-body pt-0">
                                                <div class="row align-items-center">
                                                    <div class="col-5 text-center">
                                                        <a type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#exampleModal">
                                                            <i class="fas fa-play"></i>

                                                        </a>

                                                    </div>
                                                    <div class="col-7">
                                                        <h2 class="lead">
                                                            <b>{{ $event->user->name . ' ' . $event->user->last_name }}</b>
                                                        </h2>
                                                        <p class="text-muted text-sm"><b>A prorpos: </b>
                                                            {{ $event->user->subject }}
                                                        </p>
                                                        <p class="text-muted text-sm"><b>Description: </b>
                                                            {{ substr($event->description, 0, 120) }}...</p>
                                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                                            <li class="small"><span class="fa-li"><i
                                                                        class="fas fa-lg fa-building"></i></span>
                                                                Ville: {{ $event->user->county }}</li>
                                                            <li class="small"><span class="fa-li"><i
                                                                        class="fas fa-lg fa-phone"></i></span>
                                                                Phone : {{ $event->user->phone }}</li>
                                                        </ul>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-right d-flex justify-content-between">
                                                    <a href="{{ Route('events.show', Crypt::encrypt($event->id)) }}"
                                                        class="btn btn-sm btn-primary">
                                                        <i class="fa fa-credit-card" aria-hidden="true"></i> Voir detail
                                                    </a>
                                                    @if (!App\Models\Folow::where(['user_id' => auth()->user()->id, 'event_id' => $event->id, 'folow' => 1])->exists())
                                                        <form action="{{ Route('store.folow', $event->id) }}"
                                                            method="POST">
                                                            @csrf

                                                            <button class="btn btn-sm btn-primary" type="submit">
                                                                <i class="fa fa-star" aria-hidden="true"></i> Suivez
                                                            </button>

                                                        </form>
                                                    @endif


                                                </div>
                                            </div>
                                        </div>
                                    </div>
    @endforeach

    </div>
    </div>
    <!-- /.card-body -->


    <!-- /.card -->

    <script>
        var modal = document.getElementById('exampleModal');
        const video = document.querySelector("#v1");
        if (modal.classList.contains('show')) {
            console.log('is show');
        } else {
            video.pause();
        }

        // if modal is not shown/visible then do something
    </script>

    </section>
    <!-- /.content -->
    @endif

@endsection
