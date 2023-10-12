@extends('master.master_table')

@section('title')
@endsection

@section('model')
@endsection

@section('content')
    {{-- <style>

video:-webkit-full-page-media{
  height: 300px;
}

iframe{
  height: 500px;
    width: 100%;
}
  
  .modal-dialog {
      max-width: 800px;
      margin: 30px auto;
  }
video {
  width: 100%    !important;
  height: auto   !important;
}
.modal-body {
  position:relative;
  padding:0px;
}
.close {
  position:absolute;
  right:-30px;
  top:0;
  z-index:999;
  font-size:2rem;
  font-weight: normal;
  color:#fff;
  opacity:1;
}
</style>

<!-- Main content -->
<section class="content ">

    <!-- Default box -->
      <div class="card-body pb-0 ">
        <div class="row">
          @foreach ($events as $event)
          <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
            <div class="card bg-light d-flex flex-fill">
              <div class="card-header text-muted border-bottom-0">
                <div class="card bg-dark text-white">

              
                  <video>
                    <source src="{{ asset('videos/' . $event->video) }}" />
                  </video>
                   
                
                  

<div class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                Video
            </div>
            <div class="modal-body">
              <div class="embed-responsive embed-responsive-16by9">
                  <iframe src="{{ asset('videos/' . $event->video) }}" title="Vimeo video"  allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
                 
                </div>
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-7">
                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address: Demo Street 123, Demo City 04312, NJ</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                    </ul>
                  </div>
                  <div class="col-5 text-center">
                    <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar" class="img-circle img-fluid">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <a href="#" class="btn btn-sm bg-teal">
                    <i class="fas fa-comments"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i> View Profile
                  </a>
                </div>
              </div>
            </div>
          </div>
          @endforeach

         
          
   


        </div>
      </div>
      <!-- /.card-body -->
     



  </section>
  <!-- /.content -->

  <script>
const video = document.querySelector("video");

function startPreview() {
  video.muted = true;
  video.currentTime = 1;
  /* video.playbackRate = 0.5; */
  video.play();
}

function stopPreview() {
  video.currentTime = 0;
  /* video.playbackRate = 1; */
  video.pause();
}

let previewTimeout = null;

video.addEventListener("mouseenter", () => {
  startPreview();
  previewTimeout = setTimeout(stopPreview, 4000);
});

video.addEventListener("mouseleave", () => {
  clearTimeout(previewTimeout);
  previewTimeout = null;
  stopPreview();
});

  </script>
     --}}








    {{-- 
    <div class="container ">
        <div class="row align-items-center">

            @foreach ($events as $event)
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                              <iframe width="420" height="315"
                              src="{{ asset('videos/' . $event->video) }}">
                              </iframe>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4 mt-3">
                    <div class="card">

                        <video src="{{ asset('videos/' . $event->video) }}" class="card-img-top" muted autoplay
                            loop></video>
                        <a data-toggle="modal" data-target="#exampleModal"> 
                          <i class="fas fa-play position-absolute "style="top: 16%; font-size: 58px; left: 41%;"></i>
                        </a>


                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endforeach



        </div>

    </div> --}}

    {{-- 
    <h1>jQuery videopopup.js: HTML5 Video Lightbox Demo</h1>
    <div class="jquery-script-ads" style="margin:30px auto"><script type="text/javascript"><!--
google_ad_client = "ca-pub-2783044520727903";
/* jQuery_demo */
google_ad_slot = "2780937993";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>
    <a href="javascript:void(0)" id="video1">
      -- open video --
    </a>
    <div id="vidBox">
        <div id="videCont">
            <video autoplay id="v1" loop controls>
                <source src="http://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                <source src="http://www.w3schools.com/html/mov_bbb.ogg" type="video/ogg">
            </video>
        </div>
    </div>
    <script type="text/javascript">
    $(function() {
        $('#vidBox').VideoPopUp({
            backgroundColor: "#17212a",
            opener: "video1",
            idvideo: "v1",
            pausevideo: false
        });
    });
    </script>
</body>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-46156385-1', 'cssscript.com');
  ga('send', 'pageview');

</script> --}}







    <!-- Main content -->
{{--     @if (auth()->user()->role == 'prof')
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
    @else --}}
        <section class="content">

            <!-- Default box -->

            <!-- Main content -->
            {{-- <section class="content">
                <div style="height: 20px"></div>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form action="{{route('event.sort')}}" method="POST">
                                @csrf
                               

                                <div class="input-group">
                                    <input type="search" name="search" class="form-control form-control-lg"
                                        >
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
 --}}
            <div class="card-body pb-0">
                <div class="row">

                    @foreach ($events as $event)
                        {{-- <!-- Modal -->
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
                        </div> --}}

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
                                            <p class="text-muted text-sm"><b>A prorpos: </b> {{ $event->user->subject }}
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
                                    <div class="text-right">
                                        <a href="{{ Route('events.show', Crypt::encrypt($event->id)) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-credit-card" aria-hidden="true"></i> Voir detail
                                        </a>
                                        <a href="{{ Route('event.show', Crypt::encrypt($event->id)) }}"
                                            class="btn btn-sm btn-primary">
                                            <i class="fa fa-star" aria-hidden="true"></i> Suivez
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

       

        </section>
        <!-- /.content -->
   {{--  @endif --}}

@endsection
