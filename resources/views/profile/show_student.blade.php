@extends('master.master_page_student')

@section('title')
@endsection

@section('sepirator')
    <section class="content-header">

    </section>
@endsection

@section('content')


    <div class="container emp-profile ">

        <div class="row pt-2">
            <div class="col-md-4">
                <div class="profile-img">
                    <img src="{{ asset('images/avatars/' . $profile->avatar) }}" class="rounded mx-auto d-block"
                        alt="avatar" />
                </div>
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{ $profile->name . ' ' . $profile->last_name }}
                    </h5>
                    <h6>
                        {{ $profile->subject }}
                    </h6>
                    @if (auth()->check())
                        <p class="proile-rating">Suivez de c'est cours:

                            <span>{{ App\Models\Folow::where('user_id', auth()->user()->id)->get()->count() }}</span>

                        </p>
                    @endif
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                aria-controls="home" aria-selected="true">About</a>
                        </li>

                    </ul>
                </div>
            </div>
            @if (auth()->check())
                @if (auth()->user()->id == $profile->id && (auth()->user()->role = 'student'))
                    <div class="col-md-2">
                        <a href="{{ Route('edit.student') }}" class="btn btn-block btn-outline-warning" name="btnAddMore"
                            value="Edit Profile">Modifier</a>


                    </div>
                @endif
            @endif



        </div>
        <div class="row">
            <div class="col-md-4">

            </div>
            <div class="col-md-8">
                <div class="tab-content profile-tab">


                    <div class="row">
                        <div class="col-md-6">
                            <label>Nom</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $profile->name }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Email</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $profile->email }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Telephone</label>
                        </div>
                        <div class="col-md-6">
                            <p>{{ $profile->phone }}</p>
                        </div>
                    </div>

                    @if ($profile->subject !== null)
                        <div class="row">
                            <div class="col-md-6">
                                <label>Profession</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ $profile->subject }}</p>
                            </div>
                        </div>
                    @endif
                    @if (auth()->check())
                        @if (auth()->user()->role == 'prof' && auth()->user()->role == 'admin')
                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                        Cours Total</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ App\Models\folow::where('user_id', auth()->user()->id)->get()->count() }}</p>
                                </div>
                            </div>
                        @endif
                    @endif




                </div>
            </div>
        </div>


        <div class="blog-home2 py-5">
            <div class="container">
                <!-- Row  -->
                @if (auth()->check())
                    @if (auth()->user()->role != 'student')
                        <div class="row justify-content-center">
                            <!-- Column -->
                            <div class="col-md-8 text-center">
                                <h3 class="my-3">Cours</h3>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                        </div>
                    @endif
                @endif



                <div class="row mt-4">
                    <!-- Column -->
                    @foreach ($events as $event)
                        <div class="col-md-4 on-hover ">
                            <div class="card border-0 mb-4">
                                <img class="card-img-top " style="height: 200px"
                                    src="{{ asset('images/event/' . $event->images[0]) }}" alt="wrappixel kit">

                                @if (App\Models\Folow::where('user_id', auth()->user()->id)->where('event_id', $event->id)->where('folow', 1)->exists())
                                    <form style="position: absolute;" class="favoris-form" method="post">

                                        @csrf
                                        <button class="btn btn-sm favoris-button" data-event-id="{{ $event->id }}"
                                            type="button">
                                            <i class="fa fa-star" id="favoris_{{ $event->id }}" aria-hidden="true"></i>
                                        </button>
                                    </form>
                                @else
                                    <form style="position: absolute;" class="favoris-form" method="post">

                                        @csrf
                                        <button class="btn btn-sm favoris-button" data-event-id="{{ $event->id }}"
                                            type="button">
                                            <i class="fa fa-star favoris_check" id="favoris_{{ $event->id }}"
                                                aria-hidden="true"></i>
                                        </button>
                                    </form>
                                @endif




                                <div
                                    class="date-pos bg-info-gradiant p-2 d-inline-block text-center rounded text-white position-absolute">
                                    {{ $event->created_at->format('M') }}<span
                                        class="d-block">{{ $event->created_at->format('d') }}</span></div>
                                <h5 class="font-weight-medium m-3 d-flex justify-content-between align-items-center">
                                    <p>{{ $event->title }} </p>
                                    <p>{{ $event->price }} Dh</p>
                                </h5>
                                <p class="m-3">{{ $event->description }}</p>

                                <a href="{{ Route('event.detail', $event->id) }}"
                                    class="btn btn-block btn-outline-info w-25 m-2">Voir</a>
                            </div>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'csrftoken': '{{ csrf_token() }}'
                }
            });
        </script>

        <script>
            /*  <form class="favoris-form " action="{{ Route('favoris.event', ` + element.id + `) }}" method="post"  style="position: absolute;">
                                                             @csrf
                                                            
                                                             <button class="btn btn-sm favoris-button" type="submit" >
                                                                 <i class="fa fa-star" aria-hidden="true"></i> 
                                                             </button>
                                                         </form> */

            /*  $(document).on('click', '.favoris-button', function(e) {
                        e.preventDefault();

                      
                        var route_folow = $(this).closest('.favoris-form').data('route');
                        var csrfToken = $('meta[name="csrf-token"]').attr('content');

                      
                        $.ajax({
                            type: "post",
                            url: route_folow,
                            headers: {
                                'X-CSRF-TOKEN': csrfToken 
                            },
                            success: function(response) {
                                console.log(response);
                            }
                        });
                    }); */
            /* 
                        var route_folow =
                                                "{{ route('favoris.event', ':id') }}"; // Define the route with a placeholder for ID
                                            route_folow = route_folow.replace(':id', element.user.id); // Replace the placeholder with the actual ID */
        </script>

        <script>
            $(document).ready(function() {

                /*  var eventId = $('.favoris-button').data('event-id');
                 var button = $("#favoris_" + eventId);
                 var buttonFolow = $('.favoris-button').data('favoris'); // Get the folow value
                 var url = '{{ route('check.favoris', ':id') }}';
                 url = url.replace(':id', eventId);


                
                for (let index = 0; index < button.length; index++) {
                 const element = button[index];

                 console.log(element);
                 
                } */






                /*       button.each(function(obj){

                                console.log(button);

                           $.ajax({
                                type: 'get',
                                url: url,
                                data: {
                                    _token: '{{ csrf_token() }}'
                                },
                                success: function(response) {
                                    
                                    response.forEach(element => {
                                       if(element.event_id == obj){
                                        obj.removeClass('favoris_check')
                                       }
                                       
                                    // Handle the response from the server
                                    });

                                  
                                },
                                error: function(xhr, status, error) {
                                    // Handle errors if the request fails
                                    console.error(error);
                                    console.log(url);
                                }
                            });


                             
        }); */








                $('.favoris-button').click(function() {
                    var eventId = $(this).data('event-id');
                    var buttonId = 'favoris_' + eventId;

                    // Use the route function to generate the correct URL
                    var url = '{{ route('create.favoris', ':id') }}';
                    url = url.replace(':id', eventId);


                    // Your AJAX request code here
                    $.ajax({
                        type: 'post', // Define the appropriate method
                        url: url, // Use the generated URL
                        data: {
                            _token: '{{ csrf_token() }}' // Include the CSRF token
                        },
                        success: function(response) {

                            var button = $("#" + buttonId);

                            if (response.message == 'Your create folow' || response.message ==
                                'Your update folow to 0') {
                                /*   check_favoris() */
                                button.addClass("favoris_check");

                            } else {
                                button.removeClass('favoris_check')
                            }
                            // Handle the response from the server
                            console.log(response);
                        },
                        error: function(xhr, status, error) {
                            // Handle errors if the request fails
                            console.error(error);
                            console.log(url);
                        }
                    });

                    /*   favoris(eventId); */
                });

                /*  function favoris(id) {
                    
                 } */
            });
        </script>





    @endsection
