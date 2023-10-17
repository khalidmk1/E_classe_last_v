@extends('master.master_landing_page');


@section('content')
    <div class="container ">
        <div class="row row-cols-1 row-cols-md-3 m-4 g-4 ">
            @foreach ($events as $event)
            <div class="col ">
                <div class="card h-100">

                    <img src="{{ asset('images/event/' . $event->event->images[0]) }}" class="card-img-top"
                        style="height: 250px" alt="Skyscrapers" />
                    
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->event->title }}</h5>
                        <div class="card-text d-flex gap-1">
                            <p class="text-muted text-sm">{{ $event->event->description }}</p>

                        </div>
                    </div>
                    <div class="card-footer">

                        <a href={{ Route('event.detail', $event->event->id) }} class="btn btn-info">Voir detail</a>
                    </div>
                </div>
            </div>
            @endforeach
         
        </div>

    </div>
@endsection
