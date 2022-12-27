<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Kantor Notaris</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  @include('partial.nav')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('partial.sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <h1>SELAMAT DATANG, {{auth()->user()->nama_karyawan}}</h1>
        @if(auth()->user()->isKaryawan=='1')
        <div class="row mb-3 mt-4">
        
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$jumlahTotal}}</h3>

                <p>Total Orderan</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$jumlahSelesai}}</h3>

                <p>Order Selesai</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{$jumlahBelum}}</h3>

                <p>Order Sedang Dikerjakan</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            
          </div>
          <!-- ./col -->
        </div>
        <div class="row">
          <div class='col-6'>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Dokumen Akta Butuh Verifikasi Minuta</h3>
            </div>
            <div class="card-body p-0">
            <table id ="example1" class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">
                      No
                  </th>
                  <th style="width: 80%" style="text-align:center">
                      Nama Akta
                  </th>
                                   
                  <th style="width: 20%">
                      Action
                  </th>
              </tr>
          </thead>
          <tbody>
          @forelse ($dokumenAktaMinuta as $key => $dokumenAktaMinuta)
          
              <tr>
                  <td>
                  {{$key+1}}
                  </td>
                   <td>
                   {{$dokumenAktaMinuta->judul_akta}} 
                  </td>
                  
                                    
                  <td>
                      <a class="btn btn-primary btn-sm" href="/detailAkta/{{$dokumenAktaMinuta->id}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                      
                  </td>
              </tr>
              @empty
                  <tr>
                  <td colspan="3" align="center">No Data</td>
                  </tr>
                @endforelse
             
          </tbody>
      </table>
            </div>
          </div>
        </div>
          <div class='col-6'>
            <div class="card-body p-0">
            <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Dokumen Akta Butuh Verifikasi Salinan</h3>
            </div>
            <div class="card-body p-0">
            <table id ="example2" class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">
                      No
                  </th>
                  <th style="width: 80%" style="text-align:center">
                      Nama Akta
                  </th>
                                   
                  <th style="width: 20%">
                      Action
                  </th>
              </tr>
          </thead>
          <tbody>
          @forelse ($dokumenAktaSalinan as $key => $dokumenAktaSalinan)
          
              <tr>
                  <td>
                  {{$key+1}}
                  </td>
                   <td>
                   {{$dokumenAktaSalinan->judul_akta}} 
                  </td>
                  
                                    
                  <td>
                      <a class="btn btn-primary btn-sm" href="/detailAkta/{{$dokumenAktaSalinan->id}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                      
                  </td>
              </tr>
              @empty
                  <tr>
                  <td colspan="3" align="center">No Data</td>
                  </tr>
                @endforelse
             
          </tbody>
      </table>
            </div>
          </div>
        </div>
            </div>
          </div>
        </div>
        @else
        <div class="card-primary mt-3">
        
        <div class="card-header">
          <h3 class="card-title">Dokumen Akta Anda</h3>
        </div>       
    <div class="card-body p-0">
      <table id ="example3" class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">
                      No
                  </th>
                  <th style="width: 30%">
                      Nama Akta
                  </th>
                  <th style="width: 20%">
                      Nama Klien
                  </th>
                  
                  <th style="width: 10%">
                      Tanggal Pembuatan
                  </th>
                  <th style="width: 10%">
                      Status
                  </th>
                  
                  <th style="width: 10%">
                      Action
                  </th>
              </tr>
          </thead>
          <tbody>
          @forelse ($dokumenAkta as $key => $dokumenAkta)
          
              <tr>
                  <td>
                  {{$key+1}}
                  </td>
                   <td>
                   {{$dokumenAkta->judul_akta}}
                  </td>
                  <td>
                  {{$dokumenAkta->klien->nama_klien}}
                  </td>
                  <td>
                  {{$dokumenAkta->tanggal_mulai}}
                  </td>
                  <td>
                  {{$dokumenAkta->status->nama_status}}
                  </td>
                                    
                  <td>
                      <a class="btn btn-primary btn-sm" href="/detailAkta/{{$dokumenAkta->id}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                      
                  </td>
              </tr>
              @empty
                  <tr>
                  <td colspan="6" align="center">No Data</td>
                  </tr>
                @endforelse
             
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
  </div>
        @endif
        <!-- /.row -->
        
        <!-- Main row -->
       
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('admin/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/dist/js/demo.js')}}"></script>
<script src="{{asset('admin/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('admin/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example2").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>
</body>
</html>
