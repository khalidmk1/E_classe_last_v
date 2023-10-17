
<style>


</style>

<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{asset('assets/landing_page_img/AdminLTELogo-removebg-preview.png')}}" alt="logo_virtuelle" 
        style="height: 120px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse row " id="navbarNavAltMarkup">
        <div class="navbar-nav col justify-content-end">
          <a class="nav-link " aria-current="page" href="/">Accueil</a>
          <a class="nav-link" href="#about">À propos-nous</a>
          <a class="nav-link" href="#niveau">Tarif</a>
          {{-- <a class="nav-link" href="{{route('profile.search')}}">Professeur</a> --}}
          <a class="nav-link" href="{{route('event.sort')}}">Trouver enseignement</a>
          <a class="nav-link " href="Contact">Contact</a>
          @auth()

          @if (auth()->user()->role == 'admin')
          <a class="nav-link " href="{{Route('dashboard.admin')}}">Espace</a>
          @elseif (auth()->user()->role == 'prof')
          <a class="nav-link " href="{{Route('dashboard.prof')}}">Espace</a>
          @endif
         
        
          @endauth
       
        </div>
        @if (!Auth::check())
      
        <div class="navbar-nav auth_link col justify-content-end">
          <a class="nav-link "  href="{{Route('login')}}">Login</a>
         <button  type="submit" > <a class="nav-link " href="{{Route('register')}}">Rejoignez-nous<i class="fas fa-arrow-right "></i></a></button>
        </div>
        @else

        @if (auth()->user()->role == 'student')
        <div class="navbar-nav auth_link col justify-content-center align-items-end">

          <div class="col-lg-4 col-md-6 profile-circel-image-60 text-end">
            <img src="{{asset('images/avatars/' . auth()->user()->avatar)}}" alt="user_logo"  class="img-fluid rounded-circle avatar_logo ">
            </div>
        
         <div class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{auth()->user()->name . " " .auth()->user()->last_name}}</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{Route('profile.show_student' , auth()->user()->id)}}" >Profile</a></li>
            <li><a class="dropdown-item" href="#">Favoris</a></li>
            <li><a class="dropdown-item" href="{{Route('participate.event')}}">Votre Cours</a></li>
            <li><hr class="dropdown-divider"></li>
            <li>
              <form action="{{Route('logout')}}" method="post">
                @csrf
                <button type="submit" class="dropdown-item" style="color: black !important" >Log out</button>
              </form>
             
            </li>
          </ul>
         </div>
         
        </div>
        @else

        <div class="navbar-nav auth_link col justify-content-center align-items-end">
          <div class="col-lg-4 col-md-6 profile-circel-image-60 text-end">
            <img src="{{asset('images/avatars/' . auth()->user()->avatar)}}" alt="user_logo"  class="img-fluid rounded-circle avatar_logo ">
            </div>

            <div class="col-3">
              <a class="nav-link" style="position: absolute; bottom: 36%;" href="{{route('profile.show' ,auth()->user()->id )}}">{{auth()->user()->name . " " .auth()->user()->last_name}}</a>
            </div>


        </div>


        @endif
       
        @endif

      
       

      </div>
    </div>
  </nav>

