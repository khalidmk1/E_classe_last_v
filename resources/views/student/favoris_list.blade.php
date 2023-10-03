{{-- @extends('master.master_table')

@section('title')
@endsection


@section('content')
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
                                    placeholder="Chercher par le titre de cour">
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

                @foreach ($favoris as $event)
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal{{ $event->id }}" tabindex="-1" role="dialog"
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
                                        <source src="{{ asset('videos/' . $event->event->video) }}" type="video/mp4">
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">

                        <div class="card bg-light d-flex flex-fill">
                            <div class="row justify-content-between">
                                <div class="card-header text-muted border-bottom-0">
                                    {{ $event->event->title }}
                                </div>
                                @if (App\Models\Folow::where(['user_id' => auth()->user()->id, 'event_id' => $event->event->id])->exists())
                                    <div class="card-header text-muted border-bottom-0">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </div>
                                @endif

                            </div>

                            @if (!empty($event->event->images) && count($event->event->images) > 0)
                                <img class="card-img-top" src="{{ asset('images/event/' . $event->event->images[0]) }}"
                                    alt="Card image cap" style="height: 300px; ">
                            @endif

                            <div class="card-body pt-0">
                                <div class="row align-items-center">
                                    <div class="col-5 text-center">
                                        <a type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#exampleModal{{ $event->id }}">
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
                                            {{ substr($event->event->description, 0, 120) }}...</p>
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
                                    <a href="{{ Route('events.show', Crypt::encrypt($event->event->id)) }}"
                                        class="btn btn-sm btn-primary">
                                        <i class="fa fa-credit-card" aria-hidden="true"></i> Voir detail
                                    </a>
                                    <form action="{{ Route('unfolow.event', $event->event->id) }}" method="POST">
                                        @csrf
                                        <button class="btn btn-sm btn-primary" type="submit">
                                            <i class="fa fa-star" aria-hidden="true"></i> ne plus suivre
                                        </button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <!-- /.card-body -->


        <!-- /.card -->

    </section>
    <!-- /.content -->
@endsection --}}


@extends('master.master_landing_page')

@section('content')
<style>
  
    .card {
      max-width:700px;
      flex-direction: row;
      background-color: #696969;
      border: 0;
      box-shadow: 0 7px 7px rgba(0, 0, 0, 0.18);
      margin: 3em auto;
    }
    .card.dark {
      color: #fff;
    }
    .card.card.bg-light-subtle .card-title {
      color: dimgrey;
    }

  
    
    .card img {
      max-width: 25%;
      margin: auto;
      padding: 0.5em;
      border-radius: 0.7em;
    }
    .card-body {
      display: flex;
      justify-content: space-between;
    }
    .text-section {
      max-width: 60%;
    }
    .cta-section {
      max-width: 40%;
      display: flex;
      flex-direction: column;
      align-items: flex-end;
      justify-content: space-between;
    }
    .card-text{
      color: #020202;
    }
    
    .fa-star:before {
       
        color: aliceblue;
    }
    
    @media screen and (max-width: 475px) {
      .card {
        font-size: 0.9em;
      }
    }
    
    </style>

<div class="container containe_1">
 
   
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
</script>

<script>
    setInterval(() => {
        $(document).ready(function() {
            
        });

    }, 1000);

    $(document).ready(function() {
        $.ajax({
              type: "GET",
              url: "/favoris/event",
              
              success: function (response) {
                var event = "";

                if (response.length > 0) {
                    response.forEach(function(item) {
                       
                        event +=
                            `
                            <div class="card dark">
                            <img src="/images/event/`+item.event.images[0] +`" class="card-img-top img" alt="...">
                            <div class="card-body">
                                <div class="text-section">
                                  
                                    <h5 class="card-title">`+item.event.title +`</h5>
                                    <p class="card-text">`+item.event.description +`</p>
                                </div>
                                <div class="cta-section">
                                    <button class="btn btn-sm" type="submit">
                                        <i class="fa fa-star" aria-hidden="true"></i> 
                                    </button>
                                    <a href="/event/show/${item.id}" class="btn btn-light">Voir detail</a>
                                </div>
                            </div>
                        </div>
                                `
                    });

                    $('.containe_1').html(event);
                  
                }
              
                  
              }
          });
});

    
</script>
@endsection