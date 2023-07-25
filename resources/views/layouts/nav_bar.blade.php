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
            <a href="#" class="nav-link">Contacter</a>
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
              <a href="" class="dropdown-item dropdown-footer">Voir toute les demande</a>
            </div>
           
           
          </li>
          @endif
         {{--  <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li> --}}
        
        </ul>
      </nav>
      <!-- /.navbar -->

