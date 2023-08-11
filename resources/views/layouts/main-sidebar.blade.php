<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src=" {{asset('assets/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
     
      <span class="brand-text font-weight-light">BlogTECH</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          
        </div>
        <div class="info">
          @auth('admin')
          
          <a href="#" class="d-block">{{ Auth::guard('admin')->user()->name }}</a>

          @else

          <a href="#" class="d-block">{{ Auth::user()->name }}</a>

          @endauth
          
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                List's
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">


              <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Home</p>
                </a>
              </li>


              <li class="nav-item">
                <a href="{{ route('show.all.blog') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p >Bloges & Comments </p>
                </a>
              </li>


              

              <li class="nav-item">
                <a href="{{ route('myblogs') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My blogs </p>
                </a>
              </li>
              

              <li class="nav-item">
                <a href="{{ route('upload') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Blog</p>
                </a>
              </li>

              
              <li class="nav-item">
                <a href="{{ url('/profile') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My profile </p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ route('allblogs') }}" class="nav-link ">
                  <i class="far fa-circle nav-icon"></i>
                  <p>all blogs </p>
                </a>
              </li>


            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>