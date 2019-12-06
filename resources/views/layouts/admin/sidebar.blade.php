
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{url('images/logo.png')}}" alt="Logo" class="img w-25 img-circle elevation-3"
           style="opacity: .8">
      <span class="text-center">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          @if(Auth::user()->profile_pic)
          <img src="{{url('images/profiles/'.Auth::user()->profile_pic)}}" class="img-circle elevation-2" alt="User Image" height="100" width="100" id="profile-preview">
          @else
          <img src="{{url('images/profiles/Profile.png')}}" class="img-circle elevation-2" alt="User Image" height="100" width="100" id="profile-preview">
          @endif
        </div>
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                  <span class="right badge badge-danger">New</span>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="{{route('user.list')}}" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p> Users </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{route('setting.list')}}" class="nav-link">
              <i class="nav-icon fas fa-cogs"></i>
              <p> Settings </p>
            </a>
          </li>
          <li class="nav-item">
           <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="nav-icon fas fa-sign-out-alt"></i>
                {{ __('Logout') }}
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>