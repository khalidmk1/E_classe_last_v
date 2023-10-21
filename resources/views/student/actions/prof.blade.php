@extends('master.master_landing_page')

@section('content')
    <style>
        span {
            color: #696969 !important;
        }

        .title {
            font-size: 20px;
            font-weight: 400;


        }

        .cursor_style {
            cursor: auto;
        }
    </style>

    <meta name="user-authenticated" content="{{ auth()->check() }}">



    <div class="d-flex justify-content-around">
        <div class="form-group col-4">
            <label class="title" for="selected">Niveau</label>
            <select class="form-control select2" name="niveau" id="niveau" style="width: 100%; height: 100px;">
                @foreach ($niveau as $niv)
                    <option value="{{ $niv }}" @if (old('subject') == $niv) selected @endif>
                        {{ $niv }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group col-4">
            <label class="title" for="selected">Matière</label>
            <select class="form-control select2" name="subject" id="subject" style="width: 100%; height: 100px;">
                @foreach ($subject as $sub)
                    <option value="{{ $sub }}" @if (old('subject') == $sub) selected @endif>
                        {{ $sub }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>





    <div class="container ">
        <div class="row row-cols-1 row-cols-md-3 m-4 g-4 containe_1">

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
        /*  function myFunction(id) {

                               
                                $.ajax({
                                    type: "POST",
                                    url: "http://127.0.0.1:8000/folow/event/" + id,


                                    success: function(data) {
                                        console.log(data);
                                    },
                                    error: function(error) {
                                        // Handle errors if any
                                        console.error("error");
                                    }
                                });
                            } */


        $(document).ready(function() {

            var value = $('#subject').val();
            $('#subject').on('change', function() {


                var subject = $(this).val();
                var niveau = $('#niveau').val();
                console.log(niveau);

                if ($(this).val()) {
                    $.ajax({
                        type: "get",
                        url: "/event/search",
                        data: {
                            'subject': subject,
                            'niveau': niveau
                        },
                        success: function(data) {
                            var output = "";
                            var processedIds = []; // Initialize an array to store processed IDs
                            var userId = ''; // Variable to store the user ID

                            data.forEach(element => {
                                var elementId = element.user.id;


                                console.log(processedIds.indexOf(elementId));
                                // Check if this ID has already been processed
                                if (processedIds.indexOf(elementId) === -1) {
                                    processedIds.push(
                                        elementId
                                    ); // Add the ID to the list of processed IDs

                                    console.log(processedIds.indexOf(elementId));


                                    var route =
                                        "{{ route('profile.show_student', ':id') }}"; // Define the route with a placeholder for ID
                                    route = route.replace(':id', element.user
                                        .id
                                    ); // Replace the placeholder with the actual ID

                                    var route_folow =
                                        "{{ route('create.favoris', ':id') }}"; // Define the route with a placeholder for ID
                                    route_folow = route_folow.replace(':id', element
                                        .id
                                    ); // Replace the placeholder with the actual ID

                                    output += `
                                    <div class="col ">
          <div class="card h-100">
            <img src="{{ asset('images/avatars/`+  element.user.avatar +`') }}" class="card-img-top" alt="Skyscrapers"/>
            <form class="favoris-form " data-route="` + route_folow + `" style="position: absolute;">
                                    @csrf
                                   
                                    <button class="btn btn-sm favoris-button" type="submit" >
                                        <i class="fa fa-star" style= aria-hidden="true"></i> 
                                    </button>
                                </form>
            <div class="card-body">
                <h5 class="card-title">` + element.user.name + " " + element.user.last_name + `</h5>
              <div class="card-text d-flex gap-1" >
                <p class="btn btn-secondary btn-rounded cursor_style">` + element.subject + `</p>
                <p class="btn btn-secondary btn-rounded cursor_style">` + element.niveau + `</p>
              </div>
            </div>
            <div class="card-footer">
                
                <a href="` + route + `"  class="btn btn-info">Voir detail</a>
            </div>
          </div>
        </div>`;
                                }
                            });

                            $('.containe_1').html(output);
                        }
                    });
                }



                if (value == 0) {
                    all()
                }


            });




            var value = $('#subject').val();
            $('#niveau').on('change', function() {


                var niveau = $(this).val();
                var subject = $('#subject').val();


                if ($(this).val()) {
                    $.ajax({
                        type: "get",
                        url: "/event/search",
                        data: {
                            'subject': subject,
                            'niveau': niveau
                        },
                        success: function(data) {
                            var output = "";
                            var processedIds = []; // Initialize an array to store processed IDs
                            var userId = ''; // Variable to store the user ID

                            data.forEach(element => {
                                var elementId = element.user.id;


                                console.log(processedIds.indexOf(elementId));
                                // Check if this ID has already been processed
                                if (processedIds.indexOf(elementId) === -1) {
                                    processedIds.push(
                                        elementId
                                    ); // Add the ID to the list of processed IDs

                                    console.log(processedIds.indexOf(elementId));


                                    var route =
                                        "{{ route('profile.show_student', ':id') }}"; // Define the route with a placeholder for ID
                                    route = route.replace(':id', element.user
                                        .id
                                    ); // Replace the placeholder with the actual ID

                                    var route_folow =
                                        "{{ route('event.detail', ':id') }}"; // Define the route with a placeholder for ID
                                    route_folow = route_folow.replace(':id', element
                                        .id
                                    ); // Replace the placeholder with the actual ID

                                    output += `<div class="col ">
          <div class="card h-100">
            <img src="{{ asset('images/avatars/`+  element.user.avatar +`') }}" class="card-img-top" alt="Skyscrapers"/>
            <form class="favoris-form " data-route="` + route_folow + `" style="position: absolute;">
                                    @csrf
                                   
                                    <button class="btn btn-sm favoris-button" type="submit" >
                                        <i class="fa fa-star" aria-hidden="true"></i> 
                                    </button>
                                </form>
            <div class="card-body">
                <h5 class="card-title">` + element.user.name + " " + element.user.last_name + `</h5>
              <div class="card-text d-flex gap-1" >
                <p class="btn btn-secondary btn-rounded cursor_style" >` + element.subject + `</p>
                <p class="btn btn-secondary btn-rounded cursor_style">` + element.niveau + `</p>
              </div>
            </div>
            <div class="card-footer">
                
                <a href="` + route + `"  class="btn btn-info">Voir detail</a>
            </div>
          </div>
        </div>`;
                                }
                            });

                            $('.containe_1').html(output);
                        }
                    });
                }



                if (value == 0) {
                    all()
                }


            });




            function all() {


                var isAuthenticated = $('meta[name="user-authenticated"]').attr('content') === '1';
                $.ajax({
                    type: "get",
                    url: "/event/all",

                    success: function(data) {


                        var output = "";
                        var processedIds = []; // Initialize an array to store processed IDs
                        var userId = ''; // Variable to store the user ID

                        data.forEach(element => {
                            var elementId = element.user.id;

                            var route =
                                "{{ route('profile.show_student', ':id') }}"; // Define the route with a placeholder for ID
                            route = route.replace(':id', element.user
                                .id); // Replace the placeholder with the actual ID

                            var route_folow =
                                "{{ route('favoris.event', ':id') }}"; // Define the route with a placeholder for ID
                            route_folow = route_folow.replace(':id', element
                                .id); // Replace the placeholder with the actual ID





                            // Check if this ID has already been processed
                            if (processedIds.indexOf(elementId) === -1) {
                                processedIds.push(
                                    elementId); // Add the ID to the list of processed IDs



                                output += `
                                <div class="col ">
          <div class="card h-100">
            <img src="{{ asset('images/avatars/`+  element.user.avatar +`') }}" class="card-img-top" alt="Skyscrapers"/>
            <button class="btn btn-sm favoris-button" id="btn_click"  type="submit" onclick=" favoris()" >
                                        <i class="fa fa-star" aria-hidden="true"></i> 
                                    </button>
            <form>
                                          @csrf
                                        
                                          
                                      </form>
            
            
            <div class="card-body">
              <h5 class="card-title">` + element.user.name + " " + element.user.last_name + `</h5>
              <div class="card-text d-flex gap-1" >
                <p class="btn btn-secondary btn-rounded cursor_style">` + element.subject + `</p>
                <p class="btn btn-secondary btn-rounded cursor_style">` + element.niveau + `</p>
              </div>
            </div>
            <div class="card-footer">
                
                <a href="` + route + `"  class="btn btn-info">Voir detail</a>
            </div>
          </div>
        </div>`;
                            }

                       


                        });
                        $('.containe_1').html(output);

                        $('#btn_click').on('click' , function favoris() {
                                console.log('hello');

                               /*  e.preventDefault();

                                // Get the route from the data attribute
                                var route_folow = $(this).closest('.favoris-form')
                                    .data(
                                        'route');

                                // Use AJAX to submit the form
                                $.ajax({
                                    type: "post",
                                    url: route_folow,
                                    headers: {
                                        'csrftoken': '{{ csrf_token() }}'
                                    }


                                    success: function(response) {
                                        console.log(response);
                                    }
                                }); */

                            });
                            favoris();

                        

                           



                    }
                });

            }









            /*       <form class="favoris-form " data-route="` + route_folow + `" style="position: absolute;">
                                          @csrf
                                         
                                          
                                      </form> */

            all()

        });
    </script>
@endsection














{{-- ${isAuthenticated ? // Check if the user is authenticated
    `
                                
                                <button  class="btn btn-sm" id="favoris">
                                        <i class="fa fa-star" onclick="myFunction(`+element.id +`)" aria-hidden="true"></i> 
                                    </button>
                               
                            ` :
`<button class="btn btn-sm">
                                        <i class="fa fa-star"   aria-hidden="true"></i> 
                                    </button>`} --}}
