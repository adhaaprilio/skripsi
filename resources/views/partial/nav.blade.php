<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      @auth
      <li class="nav-item dropdown user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
          <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" class="user-image img-circle elevation-2" alt="User Image">
         
        </a>
        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <!-- User image -->
          <li class="user-header bg-primary">
            <img src="{{asset('admin/dist/img/user1-128x128.jpg')}}" class="img-circle elevation-2" alt="User Image">

            <p>
              
              {{auth()->user()->nama_karyawan}} 
              
            <small>
                     
    
                         </small>
              
            </p>
          </li>
          <!-- Menu Body -->
          <!-- Menu Body -->
          <li class="user-body">
            <div class="row">
              
              
              <div class="col text-center">
              <form action="/logout" method="post">
        @csrf
        <a>
        <button type="submit" class="btn btn-default btn-flat  ">Sign Out</button>
</a>
</form>
              </div>
            </div>
            <!-- /.row -->
          </li>
          <!-- Menu Footer-->
          @endauth
          
        </ul>
      </li>
    </ul>
  </nav>
  