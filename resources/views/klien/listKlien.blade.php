 @extends('layout.master')    
 @push('styleDataTable')
<link rel="stylesheet" href="{{asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endpush   
 @section('title')
    List Klien
    
 @endsection
 @section('content')   
 <div class="card">
        <div class="card-body p-0">
          <table id="example3" class="table table-striped projects">
              <thead>
                  <tr>
                      <th style="width: 1%">
                          No
                      </th>
                      <th style="width: 80%">
                          Nama Klien
                      </th>
                      <!--<th style="width: 20%">
                          Jumlah Orderan
                      </th>-->
                      
                      <th style="width: 40%">
                          Action
                      </th>
                  </tr>
              </thead>
              <tbody>
              @forelse ($klien as $key => $klien)
                
                  <tr>
                      <td>{{$key+1}}

                      </td>
                       <td>
                       {{$klien->nama_klien}}
                      </td>
                      <!--<td>
                      
                      </td>-->
                      <td>
                      <form action="/hapusKlien/{{$klien->id}}" method="POST">
                @csrf
                @method('DELETE')
                          <a class="btn btn-primary btn-sm" href="/detailKlien/{{$klien->id}}">
                              <i class="fas fa-folder">
                              </i>
                              View
                          </a>
                          
                          <a>
                          
                    <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> Delete
                    </a>
                </form>
              
                          
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
</div>
        <!-- /.card-body -->
        @push('scriptDataTable')
<script>
  $(function () {
    $("#example3").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      
    }).buttons().container().appendTo('#example3_wrapper .col-md-6:eq(0)');
    
  });
</script>
@endpush
@endsection   
