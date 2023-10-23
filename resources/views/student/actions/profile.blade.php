@extends('master.master_page_student')

@section('content')

<style>
    .btn_detail{
        background-color: #dddde1;
    }
</style>
    <div class="input-group rounded" style="max-width: 300px;margin: auto;">
        <input type="search" id="search" class="form-control rounded" name="search" placeholder="Search"
            aria-label="Search" />
        <button class="input-group-text border-0" id="search-addon">
            <i class="fas fa-search"></i>
        </button>
    </div>

    <div class="row containe justify-content-center row-cols-1 row-cols-md-3 g-4 mt-2 mb-2">

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
        $(document).ready(function() {


            var value = $('#search').val();
            $('#search').on('keyup', function() {


                var value = $(this).val();

                if ($(this).val()) {
                    $.ajax({
                        type: "get",
                        url: "/profile/search",
                        data: {
                            'search': value
                        },
                        success: function(data) {


                            var output = ""

                            data.forEach(element => {

                                 var route =
                                     "{{ route('profile.show_student', ':id') }}"; // Define the route with a placeholder for ID
                                 route = route.replace(':id', element
                                     .id); 

                                output +=
                                    `
                                    <div class="card-group">
  <div class="card">
    <img src="{{ asset('images/avatars/`+  element.avatar +`') }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">${element.name} ` + " " + ` ${element.last_name}</h5>
      <p class="card-text">${element.subject}</p>
    </div>
    <div class="card-footer">
      <small class="text-body-secondary">Last updated 3 mins ago</small>
    </div>
  </div>
</div>`
                            });




                            $('.containe').html(output);

                        }
                    });

                }

                if (value == 0) {
                    all()
                }


            });

            function all() {
                $.ajax({
                    type: "get",
                    url: "/profile/all",

                    success: function(data) {


                        var output = ""

                        data.forEach(element => {

                             var route =
                                 "{{ route('profile.show_student', ':id') }}"; // Define the route with a placeholder for ID
                             route = route.replace(':id', element
                                 .id); 


                            output +=
                                `
    

        <div class="card-group">
  <div class="card">
    <img src="{{ asset('images/avatars/`+  element.avatar +`') }}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">${element.name} ` + " " + ` ${element.last_name}</h5>
      <p class="card-text">${element.subject}</p>
    </div>
    <div class="card-footer">
        <a href="` + route + `" class="btn btn-light btn_detail">Voir detail</a>
    </div>
  </div>
</div>


     
    `
                        });




                        $('.containe').html(output);

                    }
                });
            }

            all()
           
        })
    </script>
@endsection
