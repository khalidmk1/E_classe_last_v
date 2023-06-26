
<!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/images/project_images/WhatsApp Image 2023-06-10 at 13.00.23.jpg')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">E-classe</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
        </div>
      </div>

     

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="/" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Accuielle
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{Route('enseignement.create')}}" class="nav-link">
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
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p class="size_route">table des enseignements</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>table des etudiant</p>
                </a>
              </li>
            
            </ul>
          </li>
          
           
          <li class="nav-item">
            <a href="pages/kanban.html" class="nav-link">
              <i class="fas fa-calendar-check  nav-icon"></i>
              <p class="size_route">
                Demande des enseignement
              </p> 
            </a>
          </li>


         
       
          <li class="nav-header">Paramètre</li>
          <li class="nav-item">
            <a href="{{route('profile.edit')}}" class="nav-link">
              <i class="fas fa-id-card  nav-icon"></i>
              <p class="size_route">
                Mon Profille
              </p> 
            </a>
          </li>
          <li class="nav-item">
            <form method="post" action="{{route('logout')}}" >
              @csrf
              <button type="submit" class="nav-link">
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
