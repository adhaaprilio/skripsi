@extends('layout.master') 
@push('styleDataTable')
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush   
 @section('title')
    List Dokumen Akta
 @endsection
 @section('content')  
 <div class="card">
        
    <div class="card-body p-0">
      <table id ="example1" class="table table-striped projects">
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
                      Status
                  </th>
                  
                  <th style="width: 20%">
                      Action
                  </th>
              </tr>
          </thead>
          <tbody>
          @forelse ($data as $key => $data)  
          
              <tr>
                  <td>
                  {{$key+1}}
                  </td>
                   <td>
                   {{$data->judul_akta}}
                  </td>
                  <td>
                 
                     {{$data->nama_klien}}
                     
                  </td>
                  <td>
                      {{$data->nama_karyawan}}
                  </td>
                  <td>
                     {{$data->nama_status}}
                  </td>
                  
                  
                  <td>
                      <a class="btn btn-primary btn-sm" href="/detailAkta/{{$data->id}}">
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
