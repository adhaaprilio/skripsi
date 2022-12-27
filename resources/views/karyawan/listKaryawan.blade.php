@extends('layout.master')    
@push('styleDataTable')
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush   
 @section('title')
    List Karyawan
 @endsection
 @section('content')  
 <div class="card">
        
    <div class="card-body p-0">
      <table id="example1"class="table table-striped projects">
          <thead>
              <tr>
                  <th style="width: 1%">
                      No
                  </th>
                  <th style="width: 70%">
                      Nama Karyawan
                  </th>
                  <!--<th style="width: 30%">
                      Jumlah Akta Sedang Dikerjakan
                  </th>
                  <th style="width: 30%">
                      Jumlah Akta Selesai Dikerjakan
                  </th>-->
                  <th style="width: 20%">
                      Action
                  </th>
              </tr>
          </thead>
          <tbody>
          @forelse ($karyawan as $key => $karyawan)  
              <tr>
                  <td>
                  {{$key+1}}
                  </td>
                   <td>
                   {{$karyawan->nama_karyawan}}
                  </td>
                  <!--<td>
                      
                  </td>
                  <td>
                      
                  </td>-->
                  <td>
                      <a class="btn btn-primary btn-sm" href="/detailKaryawan/{{$karyawan->id}}">
                          <i class="fas fa-folder">
                          </i>
                          View
                      </a>
                      
                  </td>
              </tr>
              @empty
                  <tr>
                  <td colspan="4" align="center">No Data</td>
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
