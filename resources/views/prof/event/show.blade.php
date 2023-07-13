@extends('master.master_table')

@section('title')
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


    




@endsection
