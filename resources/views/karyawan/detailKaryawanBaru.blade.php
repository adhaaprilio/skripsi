@extends('layout.master')    
@push('styleDataTable')
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush   
 @section('title')
    Detail Karyawan
 @endsection
 @section('content')  
 <div class="container-fluid">
    <div class="row">
      <div class="col-md">

        <!-- Profile Image -->
        <!--<div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle"
                   src="{{asset('admin/dist/img/user4-128x128.jpg')}}"
                   alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{$karyawan->nama_karyawan}}</h3>

            
     
          </div>
          
        </div>-->
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Detail Karyawan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong> Username:</strong>

            <p class="">
            {{$karyawan->nama_karyawan}}
            </p>

            <hr>
            <strong> Username:</strong>

            <p class="">
            {{$karyawan->username}}
            </p>

            <hr>

            <strong> Email:</strong>

            <p class="">{{$karyawan->email_karyawan}}</p>

            <hr>

            <strong> Alamat:</strong>

            <p class="">@if(isset($karyawan->alamat))
            {{$karyawan->alamat}}  
            @else
            -
            @endif
            </p>
            <hr>

            <strong> Nomor HP:</strong>

            <p class="">@if(isset($karyawan->no_hp))
            {{$karyawan->no_hp}} 
             @else
             -
             @endif 
            </p>

            <hr>
            <a href="/listKaryawan" class="btn btn-primary ml-3" >Kembali</a>
            
          </div>
          <!-- /.card-body -->
          @csrf
           
        </div>
        <!-- /.card -->
      </div>
      
      <!-- /.col -->
      
    </div>
    <!-- /.row -->
    <div class="row">
    <div class="col-md">
      <div class="card card-primary">
      <div class="card-header">
      <h3 class="card-title">Riwayat Pengerjaan</h3>
    </div>
    <div class="card-body p-0">
      <table id='example1' class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">
                      No
                  </th>
                  <th style="width: 35%">
                      Nama Akta
                  </th>
                  <th style="width: 10%">
                      Nama Klien
                  </th>
                  <th style="width: 20%">
                      Tanggal Pembuatan
                  </th>
                  <th>
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
                      <a class="btn btn-primary btn-sm" href="/detailAkta/{{$dokumenAkta->id}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                      
                  </td>
              </tr>
              @empty
                  <tr>
                  <td colspan="5" align="center">No Data</td>
                  </tr>
                @endforelse
             
          </tbody>
      </table>
    </div>
    <!-- /.card-body -->
    </div>
  </div>
  @push('scriptDataTable')
<script>
  $(function () {
    $("#example1").DataTable({
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
@endpush
@endsection
