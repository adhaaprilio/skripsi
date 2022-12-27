<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/new_dashboard" class="brand-link">
      <img src="{{asset('admin/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SIMPDA</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="/new_dashboard" class="nav-link">
              
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              
              <p>
                Klien
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/listKlien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Klien</p>
                </a>
              </li>
              @if(auth()->user()->isKaryawan=='0')
              <li class="nav-item">
                <a href="/tambahKlien" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Klien</p>
                </a>
              </li>
              @endif
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="/listKaryawan" class="nav-link">
              
              <p>
                Karyawan
              </p>
            </a>
          </li>
    
                          
       
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              
              <p>
                Dokumen Akta
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="/listAkta" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>List Dokumen Akta</p>
                </a>
              </li>
              @if(auth()->user()->isKaryawan=='0')
              <li class="nav-item">
                <a href="/tambahAkta" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Tambah Dokumen Akta</p>
                </a>
              </li>
              @endif
              <!--<li class="nav-item">
                <a href="/cariAkta" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Cari Dokumen Akta</p>
                </a>
              </li>-->
            </ul>
          </li>
          @if(auth()->user()->isKaryawan=='0')
          <li class="nav-item">
            <a href="/profile" class="nav-link">
              
              <p>
                Profile
              </p>
            </a>
          </li>
          @endif
      </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  