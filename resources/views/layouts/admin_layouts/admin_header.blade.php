<!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index3.html" class="nav-link">Home</a>
      </li>
     
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
           @if(Session::get('page')=="settings")
               <?php $active = "active"; ?>
            @else
               <?php $active = ""; ?>
            @endif
      <li class="nav-item dropdown">
        <a class="nav-link {{ $active }}" data-toggle="dropdown" href="#">
          <i class="fa fa-user-circle"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
           @if(Session::get('page')=="settings")
               <?php $active = "active"; ?>
            @else
               <?php $active = ""; ?>
            @endif
          <a href="{{ url('admin/settings')}}" class="dropdown-item {{ $active }}">
            <i class="fas fa-cog mr-2"></i> Update Password           
          </a>
          <div class="dropdown-divider"></div>
           @if(Session::get('page')=="update-admin-details")
               <?php $active = "active"; ?>
            @else
               <?php $active = ""; ?>
            @endif
          <a href="{{ url('admin/update-admin-details')}}" class="dropdown-item {{ $active }}">
            <i class="fas fa-cog mr-2"></i> Update Details           
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ url('admin/logout')}}" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
            
          </a>
      </li>
     
    </ul>
  </nav>
  <!-- /.navbar -->
