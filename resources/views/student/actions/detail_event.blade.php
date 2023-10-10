@extends('master.master_page_student')






@section('content')



    <style>
        .float-right {
            text-decoration: none;
        }

        .btn_chat {
            color: blue !important;
        }

        .btn_chat:hover {
            color: white !important;
        }

        .btn_participate {
            color: green !important;
        }

        .btn_participate:hover {
            color: white !important;
        }
    </style>




    <!-- Modal 1 -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                {{--  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div> --}}
                <div class="modal-body text-center">
                    il faut etre ithentifier
                </div>
                <a href="{{ Route('login') }}" class="btn btn-primary w-50 m-auto">login</a>
                <a href="{{ Route('register') }}" class="btn btn-secondery w-50 m-auto">register</a>
                {{--  <div class="modal-footer">
                    
                </div> --}}
            </div>
        </div>
    </div>



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
                                    <b>Participant</b> <a class="float-right" data-event-id="{{ $events->id }}"
                                        id="participate_count"></a>
                                </li>

                                <li class="list-group-item text-center" id="accepted_li"
                                    data-event-id="{{ $events->id }}">
                                    <b>{{ $events->date }}</b>
                                </li>

                                @if (auth()->check() && auth()->user()->role == 'student')
                                    <li class="list-group-item">




                                        @if (auth()->check() )


                                      

                                            <form action="{{ Route('store.folow', $events->id) }}" method="post"
                                                id="Myform">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-block btn_participate btn-outline-success"
                                                    data-event-id="{{ $events->id }}"
                                                    id="participate-btn">Partciper</button>
                                            </form>

                                           

                                            <form action="{{ Route('update.event', $events->id) }}" method="post"
                                                id="Myform_unparticipate">
                                                @csrf
                                                <button type="submit"
                                                    class="btn btn-block btn_participate btn-outline-success"
                                                    data-event-id="{{ $events->id }}"
                                                    id="unparticipate-btn">unPartciper</button>
                                            </form>


                                        @else
                                            <button type="submit" class="btn btn-block btn_participate btn-outline-success"
                                                data-bs-toggle="modal" data-bs-target="#exampleModal">Partciper</button>
                                        @endif





                                    </li>
                                @endif




                                <li class="list-group-item">
                                    @if (auth()->check())
                                        @if (\App\Models\Conversation::where('sender_id', auth()->user()->id)->where('receiver_id', $events->user_id)->orWhere('sender_id', $events->user_id)->where('receiver_id', auth()->user()->id)->count() === 0)
                                            <form action="{{ Route('chat.create', $events->user_id) }}" method="get">
                                                @csrf


                                                <button type="submit" class="btn btn-block btn_chat btn-outline-primary">
                                                    <i class="fa fa-comments-o" aria-hidden="true"></i> Conversation
                                                </button>


                                            </form>
                                        @else
                                            <a href="{{ Route('chat.etudiant') }}"
                                                class="btn btn-block btn-outline-primary">chat</a>
                                        @endif
                                    @else
                                        <button type="submit" class="btn btn-block btn_chat btn-outline-primary"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa fa-comments-o"></i> Conversation
                                        </button>
                                    @endif





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
        $('#Myform_unparticipate').hide();
        $('#Myform').hide();

        function stop_video() {
            var media = $("#video").get(0);
            media.pause();
            media.currentTime = 0;
        }


        
        


        function check_accepted() {
            var url_accepte = "{{ route('check.accepte', ':id') }}";
            var eventId = $('#accepted_li').data('event-id');
            url_accepte = url_accepte.replace(':id', eventId)
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'get',
                url: url_accepte,
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                },
                success: function(response) {

                    if (response) {
                        $('#accepted_li').show()
                    } else {
                        $('#accepted_li').hide()
                    }





                    // Handle success, e.g., update button appearance or show a message


                    // Reload the page or update UI as needed
                },
                error: function(xhr, status, error) {
                    console.log(url);
                    // Handle errors if any
                    console.error(xhr.responseText);
                }
            });
        }

        check_accepted()

        function participate_count() {
            var url_count = "{{ route('paticipate.count', ':id') }}";
            var eventId = $('#participate_count').data('event-id');
            url_count = url_count.replace(':id', eventId)
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'get',
                url: url_count,
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                },
                success: function(response) {

                    $('#participate_count').text(response);





                    // Handle success, e.g., update button appearance or show a message
                    console.log(response);

                    // Reload the page or update UI as needed
                },
                error: function(xhr, status, error) {
                    console.log(url);
                    // Handle errors if any
                    console.error(xhr.responseText);
                }
            });
        }

        function check_unparticiapate() {
            var url_unparticipate = "{{ route('check.unparticipte', ':id') }}";
            var eventId = $('#unparticipate-btn').data('event-id');
            url_unparticipate = url_unparticipate.replace(':id', eventId)
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'get',
                url: url_unparticipate,
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                },
                success: function(response) {

                    if (response) {
                        $('#Myform').hide();
                        $('#Myform_unparticipate').show();
                    } else {
                        $('#Myform').show();
                        $('#Myform_unparticipate').hide();
                    }


                    // Handle success, e.g., update button appearance or show a message
                    console.log(response);

                    // Reload the page or update UI as needed
                },
                error: function(xhr, status, error) {
                    console.log(url);
                    // Handle errors if any
                    console.error(xhr.responseText);
                }
            });
        }



        function check_participate() {

            var url_participate = "{{ route('check.participate', ':id') }}";
            var eventId = $('#participate-btn').data('event-id');
            url_participate = url_participate.replace(':id', eventId)
            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'get',
                url: url_participate,
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                },
                success: function(response) {
                    if (response) {
                        $('#Myform').show();
                        $('#Myform_unparticipate').hide();
                    } else {
                        $('#Myform').hide();
                        $('#Myform_unparticipate').show();
                    }

                    // Handle success, e.g., update button appearance or show a message
                    console.log(response);

                    // Reload the page or update UI as needed
                },
                error: function(xhr, status, error) {
                    console.log(url);
                    // Handle errors if any
                    console.error(xhr.responseText);
                }
            });
        }

        // Call the function to check participation status when the page loads
        $(document).ready(function() {
            check_participate()
            check_unparticiapate();
            setInterval(() => {
                participate_count();
            }, 1000);

            stop_video()


        });




        // Participation button click event
        $('#participate-btn').on('click', function(event) {
            event.preventDefault();

            var eventId = $(this).data('event-id');
            var url = "{{ route('store.folow', ':id') }}";

            url = url.replace(':id', eventId);

            var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                },
                success: function(response) {

                    check_unparticiapate();

                    // Handle success, e.g., update button appearance or show a message
                    console.log(response.message);

                    // Reload the page or update UI as needed
                },
                error: function(xhr, status, error) {
                    console.log(url);
                    // Handle errors if any
                    console.error(xhr.responseText);
                }
            });



        });

        // Unparticipation button click event
        $('#unparticipate-btn').on('click', function(event) {
            event.preventDefault()
            var eventId = $(this).data('event-id');
            var url = "{{ route('update.event', ':id') }}";
            url = url.replace(':id', eventId);

            $.ajax({
                type: 'POST',
                url: url,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response) {
                    check_participate()

                    // Handle success, e.g., update button appearance or show a message
                    console.log(response.message);
                    // Reload the page or update UI as needed
                },
                error: function(xhr, status, error) {
                    // Handle errors if any
                    console.error(xhr.responseText);
                }
            });
        });
    </script>





@endsection
