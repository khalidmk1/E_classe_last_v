
<style>


</style>

<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{asset('assets/landing_page_img/AdminLTELogo-removebg-preview.png')}}" alt="logo_virtuelle" 
        style="height: 85px;">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse row " id="navbarNavAltMarkup">
        <div class="navbar-nav col justify-content-end">
          <a class="nav-link " aria-current="page" href="#Accueil">Accueil</a>
          <a class="nav-link" href="#about">À propos-nous</a>
          <a class="nav-link" href="#niveau">Niveau</a>
          <a class="nav-link" href="{{route('profile.search')}}">Professeur</a>
          <a class="nav-link" href="{{route('event.sort')}}">Lesson</a>
          <a class="nav-link " href="Contact">Contact</a>
          @auth()
          @if (auth()->user()->role != 'student')
          <a class="nav-link " href="{{Route('dashboard')}}">Espace</a>
          @endif
          @if (auth()->user()->role == 'student')
          <a class="nav-link " href="{{Route('profile.show' , auth()->user()->id)}}">Profille</a>
          @endif
         
          {{-- <a class="nav-link " href="{{Route('dashboard')}}">Espace</a> --}}
          @endauth
       
        </div>
        @if (!Auth::check())
        <div class="navbar-nav auth_link col justify-content-center">
          <a class="nav-link "  href="{{Route('login')}}">Login</a>
         <button  type="submit" > <a class="nav-link " href="{{Route('register')}}">Rejoignez-nous<i class="fas fa-arrow-right "></i></a></button>
        </div>
        @else
        <div class="navbar-nav auth_link col justify-content-center align-items-center">
          @if (auth()->user()->avatar)
          <div class="col-lg-4 col-md-6 vv profile-circel-image-60 text-end">
            <img src="{{asset('images/avatars/' . auth()->user()->avatar)}}" alt="user_logo"  class="img-fluid rounded-circle avatar_logo ">
            </div>
          @else
          <div class="col-lg-4 col-md-6 vv profile-circel-image-60 text-end">
            <img src="{{asset('assets/images/project_images/default_avatar.png')}}" alt="user_logo"  class="img-fluid rounded-circle avatar_logo ">
            </div>
          @endif
         
          <a class="nav-link "  href="{{route('profile.show' ,auth()->user()->id )}}">{{auth()->user()->name . " " .auth()->user()->last_name}}</a>
         
        </div>
       
        @endif

      
       

      </div>
    </div>
  </nav>

