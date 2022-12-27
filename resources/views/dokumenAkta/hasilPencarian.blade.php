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
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row justify-content-md-center">
          
            <h1>Pencarian Dokumen Akta</h1>
         
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <form action="/hasilPencarian">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>Cari berdasarkan:</label>
                                    <select class="select2" style="width: 100%;">
                                        <option></option>
                                        <option selected>Nama Akta</option>
                                        <option>Jenis Akta</option>
                                        <option>Nama Klien</option>
                                        <option>Tahun Pembuatan</option>
                                    </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control form-control-lg" placeholder="Type your keywords here" value="Lorem ipsum">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
        
        <div class="card-body p-0">
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          No
                      </th>
                      <th style="width: 20%">
                          Nama Akta
                      </th>
                      <th style="width: 20%">
                          Nama Klien
                      </th>
                      <th style="width: 20%">
                          Penanggung Jawab
                      </th>
                      <th style="width: 20%">
                          Tahun Pembuatan
                      </th>
                      <th style="width: 20%">
                          Status
                      </th>
                      <th style="width: 20%">
                          Action
                      </th>
                  </tr>
              </thead>
              <tbody>
                  <tr>
                      <td>
                          1
                      </td>
                       <td>
                          Lorem Ipsum
                      </td>
                      <td>
                          Lorem Ipsum
                      </td>
                      <td>
                          Lorem Ipsum
                      </td>
                      <td>
                          2022
                      </td>
                      <td>
                      <button type="button" class="btn btn-success">Success</button>
                      </td>
                      <td>
                          <a class="btn btn-primary btn-sm" href="/detailAkta">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          
                      </td>
                  </tr>
                 
                 
              </tbody>
          </table>
        </div>
        <!-- /.card-body -->
      </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 3.1.0
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
</body>
</html>
