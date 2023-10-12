<!-- Preloader -->



<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTELogo" height="60" width="60">
  </div>


    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Accueil</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            
            <a href="{{Route('chat')}}" class="nav-link">Contacter</a>
          </li>
        </ul>
    
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
      
          @if (auth()->user()->role == "admin")
          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge"> {{App\Models\User::where('confirmed' , 0 )->count()}}</span>
            </a>
           
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">Notification</span>
             
              <div class="dropdown-divider"></div>
              <div href="" class="dropdown-item">
                <i class="fas fa-users mr-2"></i> 
                {{App\Models\User::where('confirmed' , 0 )->count()}}
                 demande des ensiengement
              </div>
            
             
              <div class="dropdown-divider"></div>
              <a href="{{Route('table.demande')}}" class="dropdown-item dropdown-footer">Voir toute les demande</a>
            </div>
           
           
          </li>
          @else

          <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
              <i class="far fa-bell"></i>
              <span class="badge badge-warning navbar-badge" id="messages"></span>
            </a>
           
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
              <span class="dropdown-item dropdown-header">Notification</span>
             
              <div class="dropdown-divider"></div>
              <div  class="dropdown-item">
                <i class="fas fa-users mr-2"></i>
                <span id="message_id"></span> 
                 demande des ensiengement
              </div>
            
             
              <div class="dropdown-divider"></div>
              <a href="{{Route('folow.accepte')}}" class="dropdown-item dropdown-footer">Voir toute les demande</a>
            </div>
           
           
          </li>

          @endif

          
         
        
        </ul>
      </nav>
      <!-- /.navbar -->

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

      <script>
        
        function message_inccepted() {
            var url_message = "{{ route('inccepted.message') }}";
           
           
            var csrfToken = $('meta[name="csrf-token"]').attr('content');

            $.ajax({
                type: 'get',
                url: url_message,
                headers: {
                    'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the headers
                },
                success: function(response) {

                  $('#messages').text(response)
                  $('#message_id').text(response)

                   console.log(response);





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

       /*  setInterval(() => {
          message_inccepted()
        }, 1000); */
       
      </script>

