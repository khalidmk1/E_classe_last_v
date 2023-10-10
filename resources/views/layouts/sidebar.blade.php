
<!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4 ">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-classe</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if (auth()->user()->avatar)
          <img src="{{asset('images/avatars/'.auth()->user()->avatar)}}" class="img-circle elevation-2" alt="User Image">
          @else
          <img src="{{asset('images/avatars/1688305003_8 Grunge Yes No Icon PNG Transparent  OnlyGFX.com_thumbnail.png')}}" class="img-circle elevation-2" alt="User Image">
          @endif
         
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->name . " " . auth()->user()->last_name}}</a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{Route('dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Accuielle
              </p>
            </a>
          </li>

          

          @if (auth()->user()->role === 'admin')
            
        
          <li class="nav-item">
            <a href="{{route('enseignement.create')}}" class="nav-link">
              <i class="nav-icon  fas fa-user-plus"></i>
              <p>
                Ajouter enseignement
              </p>
            </a>
          </li>
      
      
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Table des utulisateurs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('table.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="size_route">table des enseignements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('table.student')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>table des etudiant</p>
                </a>
              </li>
            
            </ul>
          </li>
          
           
          <li class="nav-item">
            <a href="{{Route('table.demande')}}" class="nav-link">
              <i class="fas fa-calendar-check  nav-icon"></i>
              <p class="size_route">
                Demande des enseignement
              </p> 
            </a>
          </li>

          @elseif (auth()->user()->role == "prof")

          <li class="nav-item">
            <a href="{{Route('event.create')}}" class="nav-link">
              <img src="{{asset('assets/images/project_images/icons8-class-50.png')}}" class="nav-icon" alt="">
             
              <i class="fa-regular fa-screen-users  nav-icon"></i>
              <p>
                Crée des Cours
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('event.index')}}" class="nav-link">
              <i class="fa fa-eye nav-icon" aria-hidden="true"></i>
              <p>
                voir tes Cours
              </p>
            </a>
          </li>


         <li class="nav-item">
   
    <a href="{{ route('folow.accepte', auth()->user()->id) }}" class="nav-link">
        <i class="fa fa-eye nav-icon" aria-hidden="true"></i>
        <p>
            Demande de participation
        </p>
    </a>
</li>

          



         {{--  <li class="nav-item">
            <a href="{{Route('calender')}}" class="nav-link">
              <i class="fa fa-calendar  nav-icon" aria-hidden="true"></i>
              <p>
                calendrier
              </p>
            </a>
          </li> --}}
          

          @elseif (auth()->user()->role == "student")

          <li class="nav-item">
            <a href="{{Route('events.index')}}" class="nav-link">
              <i class="fa fa-eye nav-icon" aria-hidden="true"></i>
              <p>
                Voir les Cours
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('favoris.event')}}" class="nav-link">
              <i class="fa fa-star nav-icon" aria-hidden="true"></i>
              <p>
                Favoris
              </p>
            </a>
          </li>
          @endif
         
         
       
          <li class="nav-header">Paramètre</li>
          <li class="nav-item">
            <a href="{{route('profile.show' ,auth()->user()->id )}}" class="nav-link">
              <i class="fas fa-id-card  nav-icon"></i>
              <p class="size_route">
                Mon Profille
              </p> 
            </a>
          </li>
          <li class="nav-item ">
            <form method="post" action="{{route('logout')}}" >
              @csrf
              <button type="submit" class="nav-link w-50 m-auto">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p class="size_route">
                  Log out
                </p> 
              </button>
            </form>
            
          </li>
         
          
         
 
  
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
