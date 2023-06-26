<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="{{asset('assets/landing_page_img/logo_e-classe.png')}}" alt="logo_virtuelle" 
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
          <a class="nav-link " href="Contact">Contact</a>
          @auth()
          <a class="nav-link " href="{{Route('dashboard')}}">Espace</a>
          @endauth
       
        </div>
        @if (!Auth::check())
        <div class="navbar-nav auth_link col justify-content-center">
          <a class="nav-link "  href="{{Route('login')}}">Login</a>
         <button  type="submit" > <a class="nav-link " href="{{Route('register')}}">Rejoignez-nous<i class="fas fa-arrow-right "></i></a></button>
        </div>
        @endif

      
       

      </div>
    </div>
  </nav>