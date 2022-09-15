<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{Auth::user()->profile_photo_url}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth()->user()->name}}</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
                <a href="{{route('user.dashboard')}}" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Album
                  </p>
                </a>
              </li>
          <li class="nav-item ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Albums
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Get_Album')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Albums</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Album.create')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Album</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Images
                <i class="right fas fa-angle-left"></i>
                <span class="badge badge-info right"></span>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('Get_Image')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Images</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('Image.create')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add New Images</p>
                </a>
              </li>

            </ul>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit(); " role="button">
                            <i class="nav-icon fas fa-th"></i>

                            {{ __('Log Out') }}
                        </a>
                </form>
              </li>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
