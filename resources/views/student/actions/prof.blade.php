@extends('master.master_landing_page')

@section('content')
    <style>
        .card {
            max-width: 700px;
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

        .img {
            height: 174px;
            width: 174px;
        }

        .cta-section {
            max-width: 40%;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            justify-content: space-between;
        }

        .card-text {
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

    <meta name="user-authenticated" content="{{ auth()->check() }}">

    <div class="input-group rounded" style="max-width: 300px;margin: auto;">
        <input type="search" id="search" class="form-control rounded" name="search" placeholder="Search"
            aria-label="Search" />
        <button class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
        </button>
    </div>




    <div class="container containe_1">


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
        function myFunction(id) {



            /*   console.log(route_store_folow); */
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
        }

        
        $(document).ready(function() {

            var value = $('#search').val();
            $('#search').on('change', function() {


                var value = $(this).val();

                if ($(this).val()) {
                    $.ajax({
                        type: "get",
                        url: "/event/search",
                        data: {
                            'search': value
                        },
                        success: function(data) {

                            var output = ""

                            data.forEach(element => {

                                var route =
                                    "{{ route('event.detail', ':id') }}"; // Define the route with a placeholder for ID
                                route = route.replace(':id', element
                                    .id); // Replace the placeholder with the actual ID
                                var route_folow =
                                    "{{ route('event.detail', ':id') }}"; // Define the route with a placeholder for ID
                                route_folow = route_folow.replace(':id', element
                                    .id); // Replace the placeholder with the actual ID

                                output +=
                                    `<div class="card dark">

                                        <img src=  "{{ asset('images/event/`+  element.images[0] +`') }}"  class="card-img-top img" alt="...">
<div class="card-body">
  <div class="text-section">
    <h5 class="card-title">` + element.title + `</h5>
    <p class="card-text">` + element.description + `</p>
  </div>
  <div class="cta-section">

  <button class="btn btn-sm" id="favoris" type="submit">
  <i class="fa fa-star"  aria-hidden="true"></i> 
</button>
<a href="` + route + `" class="btn btn-light">Voir detail</a>
   
  </div>
</div>

</div>`
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


                        var output = ""

                        data.forEach(element => {

                            var route =
                                "{{ route('event.detail', ':id') }}"; // Define the route with a placeholder for ID



                            route = route.replace(':id', element
                                .id); // Replace the placeholder with the actual ID

                            var route_folow =
                                "{{ route('event.detail', ':id') }}"; // Define the route with a placeholder for ID
                            route_folow = route_folow.replace(':id', element
                                .id); // Replace the placeholder with the actual ID


                            output +=
                                `<div class="card dark">

                                    <img src=  "{{ asset('images/event/`+  element.images[0] +`') }}"  class="card-img-top img" alt="...">
<div class="card-body">
  <div class="text-section">
    <h5 class="card-title">` + element.title + `</h5>
    <p class="card-text">` + element.description + `</p>
  </div>
  <div class="cta-section">
 
    ${isAuthenticated ? // Check if the user is authenticated
        `
                    
                    <button  class="btn btn-sm" id="favoris">
                            <i class="fa fa-star" onclick="myFunction(`+element.id +`)" aria-hidden="true"></i> 
                        </button>
                   
                ` :
    `<button class="btn btn-sm">
                            <i class="fa fa-star"   aria-hidden="true"></i> 
                        </button>`}
  

    <a href="` + route + `" class="btn btn-light">Voir detail</a>
  </div>
</div>

</div>`


                        });
                        $('.containe_1').html(output);





                    }
                });



            }






            all()

        });
    </script>
@endsection
