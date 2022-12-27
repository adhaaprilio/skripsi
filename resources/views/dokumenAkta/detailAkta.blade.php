@extends('layout.master')    
 @section('title')
    Detail Dokumen Akta
 @endsection
 @section('content')  
 <div class="container-fluid">
  <div class="row">
    <div class="col-md-5">

      <!-- Profile Image -->
     
      <!-- /.card -->

      <!-- About Me Box -->
      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">Deskripsi Dokumen Akta</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <strong>Nama Akta:</strong>

          <p class="">
            
          {{$dokumenAkta->judul_akta}}
          </p>
         <hr>
         <strong>Nomor Akta:</strong>

          <p class="">{{$dokumenAkta->nomor_akta}}</p>

          <hr>
          <strong>Nama Klien:</strong>

          <p class="">{{$dokumenAkta->klien->nama_klien}}</p>

          <hr>
          <strong>Nama Perusahaan:</strong>

          <p class="">{{$dokumenAkta->klien->nama_perusahaan}}</p>

          <hr>

          <strong>Jenis Akta:</strong>

          <p class="">{{$dokumenAkta->jenis_akta}}</p>

          <hr>
          <strong> Penanggung Jawab:</strong>

          <p class="">{{$dokumenAkta->user->nama_karyawan}}</p>

          <hr>
           <strong>Tanggal Mulai:</strong>

          <p class="">{{$dokumenAkta->tanggal_mulai}}</p>

          <hr>
          
          <strong>Tanggal Selesai:</strong>

          <p class="">{{$dokumenAkta->tanggal_selesai}}</p>

          <hr>
          <strong>Status Dokumen:</strong>

          <p class="">{{$status->nama_status}}</p>
          
          <hr>
          @if($dokumenAkta->user_id == auth()->user()->id)
          <div class="card-footer">
            <a href="/editAkta/{{$dokumenAkta->id}}" class="btn btn-warning" >Edit</a>
                </div>
          @else
          @endif
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    
    <div class="col-md-7">

      <!-- Profile Image -->
     
      <!-- /.card -->

      <!-- About Me Box -->
      

      <div class="card card-primary">
        <div class="card-header">
          <h3 class="card-title">File Dokumen Akta</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        
          <strong><i class="fas fa-file"></i> Dokumen Pendukung</strong>
          <table class="table table-striped projects">
              <thead>
                  <tr>
                      <th >
                          No
                      </th>
                      <th >
                          Nama Dokumen
                      </th>
                      <th >
                          File Dokumen
                      </th>
                      @if(auth()->user()->isKaryawan=='0')
                      <th>
                          Action
                      </th>
                      @endif
                  </tr>
              </thead>
              <tbody>
              @forelse ($dokumenPendukung as $key => $dokumenPendukung)
                  <tr>
                      <td>{{$key+1}}</td>
                       <td>
                       {{$dokumenPendukung->nama_file}}
                      </td>
                      <td>
                      <a href="{{asset('storage/post-image/' .$dokumenPendukung->file_dokumen_pendukung)}}">{{$dokumenPendukung->file_dokumen_pendukung}}</a>
                      </td>
                      @if(auth()->user()->isKaryawan=='0')
                      <td>
                      <form action="/hapusDokumenPendukung/{{$dokumenPendukung->id}}" method="POST">
                
                      @csrf
                        @method('DELETE')
                                            
                          <a>
                          
                    <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> Delete
                    </a>
                </form>
              
                          
                      </td>
                      @endif
                  </tr>
                  @empty
                  <tr>
                  <td colspan="4" align="center">No Data</td>
                  </tr>
                @endforelse
              </tbody>
              
          </table>
          <form action='/tambahDokumenPendukung/{{$dokumenAkta->id}}' method='POST' enctype="multipart/form-data" >
            @csrf
          @if(auth()->user()->isKaryawan=='0')
          <label for="" class="form-label">- Tambahkan Dokumen Pendukung</label>
          <table class="table table-bordered" name ="dynamicAddRemove" id="dynamicAddRemove">  
          <tr>
          <th>Nama Dokumen</th>
          <th>File Dokumen</th>
          
          
          </tr>
          <tr>  
          <td><input type="text" name="nama_file[0]" class="form-control"></td>
          <td><input type="file" name="file_dokumen_pendukung[0]" class="form-control"></td>  
            
          </tr>  
          </table>
          <button type="submit" class="btn btn-primary btn-sm">Upload File</button>      
          @endif
</form>
          <hr>

          <!-- Minuta Akta-->

          <strong><i class="fas fa-file"></i> Minuta Akta</strong>
          <!--1. if else ada atau tidaknya file-->
          @if(isset($minutaTerbaru->file_minuta_akta))
          <p class="text-muted"><i class="far fa-fw fa-file-word"></i><a href="{{asset('storage/post-image/' .$minutaTerbaru->file_minuta_akta)}}">{{$minutaTerbaru->file_minuta_akta}}</a></p>
          @else
          <p class="text-muted">Belum ditemukan file minuta akta</p>
          @endif
          <!-- end if else 1-->

          <!--2. if else karyawan atau notaris -->
          @if(auth()->user()->isKaryawan=='0')
          
          <form action='/tambahMinutaAkta/{{$dokumenAkta->id}}' method='POST' enctype="multipart/form-data" >
            @csrf
            
              @if($status->id == 2 || $status->id == 3 || $status->id == 4 || $status->id == 5 || $status->id == 6 || $status->id == 7)
            <div class="mb-3">
            
          <label for="file_minuta_akta" class="form-label">- Tambahkan File Minuta Akta</label>
          <input class="form-control" type="file" id="file_minuta_akta" name="file_minuta_akta">
          </div>
          
          <button type="submit" class="btn btn-primary btn-sm">Upload File</button>
           
              @else
          <div class="mb-3">
            
          <label for="file_minuta_akta" class="form-label">- Tambahkan File Minuta Akta</label>
          <input class="form-control" type="file" id="file_minuta_akta" name="file_minuta_akta">
          </div>
          
          <button type="submit" class="btn btn-primary btn-sm">Upload File</button>
          <a href="/uploadMinutaAkta/{{$dokumenAkta->id}}" class="btn btn-sm btn-primary">Konfirmasi Upload File</a>

              @endif
            
          
            <!---<a href="/minutaAkta/" class="btn btn-sm btn-primary">Setujui</a>-->
            </form>

            <!--2.2 else karyawan atau notaris--> 
          @else

          <!-- if else notaris atau karyawan-->
            @if($status->id == 2)
            <a href="/minutaAkta/{{$dokumenAkta->id}}" class="btn btn-sm btn-primary">Setujui</a>
            @else
          
            @endif
          @endif
          <hr>

          <!-- Salinan Akta -->
                   
          <strong><i class="fas fa-file"></i> Salinan Akta</strong>
          @if($status->id==1 || $status->id==2)
          <p class="text-muted">Proses minuta akta belum selesai</p>
          <hr>
          @else
                    <!-- 1. if else salinan akta ada atau tidak-->
            @if(isset($salinanTerbaru->file_salinan_akta))
          <p class="text-muted"><i class="far fa-fw fa-file-word"></i><a href="{{asset('storage/post-image/' .$salinanTerbaru->file_salinan_akta)}}">{{$salinanTerbaru->file_salinan_akta}}</a></p>
            @else
          <p class="text-muted">Belum ditemukan file salinan akta</p>
            @endif
          <!-- 1.1 end if else-->

          <!-- 2. if else siapa user-->
              @if(auth()->user()->isKaryawan=='0')
          <form action='/tambahSalinanAkta/{{$dokumenAkta->id}}' method='POST' enctype="multipart/form-data" >
          @csrf  
          <div class="mb-3">
            
                @if($status->id != 6))
                  @if($status->id ==3)
                  <label for="file_salinan_akta" class="form-label">- Tambahkan File Salinan Akta</label>
          <input class="form-control" type="file" id="file_salinan_akta" name="file_salinan_akta">
          </div>
          
          <button type="submit" class="btn btn-primary btn-sm">Upload File</button>
          <a href="/uploadSalinanAkta/{{$dokumenAkta->id}}" class="btn btn-sm btn-primary">Konfirmasi Upload File</a>
                  @elseif($status->id ==7)
                  <label for="file_salinan_akta" class="form-label">- Tambahkan File Salinan Akta</label>
          <input class="form-control mb-3" type="file" id="file_salinan_akta" name="file_salinan_akta">
                  <button type="submit" class="btn btn-primary btn-sm">Upload File Revisi</button>
                </div>
                  @else
          <label for="file_salinan_akta" class="form-label">- Tambahkan File Salinan Akta</label>
          <input class="form-control" type="file" id="file_salinan_akta" name="file_salinan_akta">
          </div>
          
          <button type="submit" class="btn btn-primary btn-sm">Upload File</button>
          
                  @endif
                
                @else
            <label for="file_salinan_akta" class="form-label">- Tambahkan File Salinan Akta</label>
            <input class="form-control" type="file" id="file_salinan_akta" name="file_salinan_akta">
            </div>
          
            <button type="submit" class="btn btn-primary btn-sm">Upload File Revisi</button>
            <a href="/uploadRevisiSalinan/{{$dokumenAkta->id}}" class="btn btn-sm btn-primary">Konfirmasi Upload Revisi</a>
                @endif
            
            
          <!-- 2.1 else siapa user-->
              @else
                @if($status->id == 4 || $status->id == 6 || $status->id == 7 )
          <a href="/salinanAkta/{{$dokumenAkta->id}}" class="btn btn-sm btn-primary">Setujui</a>
          <a href="/revisiSalinanAkta/{{$dokumenAkta->id}}" class="btn btn-sm btn-primary">Revisi</a>
                @else
                @endif
          <!-- 2.2 end if else siapa user-->
              @endif
          </form>
          
          @endif
          <!--Dokumen Pendukung-->
          
       
        </div>
        <!-- /.card-body -->
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
    <h3 class="card-title">Timeline Pengerjaan</h3>
  </div>
  </div>
  <div class="card-body p-0">

  <section class="content">
<div class="container-fluid">

  <!-- Timelime example  -->
  <div class="row">
    <div class="col-md-12">
      <!-- The time line -->
      <div class="timeline">
        <!-- timeline time label -->
       
        <!-- /.timeline-label -->
        <!-- timeline item -->
        <div style="margin-bottom: 5px">
        @foreach ($timeline as $timeline)
          <div style="margin-bottom: 15px" class="timeline-item">
            <span class="time"><i class="fas fa-clock">{{$timeline->created_at}}</i> </span>
            <h3 class="timeline-header"><a href="#">{{$timeline->nama_timeline}}</a></h3>

            <div class="timeline-body">
            {{$timeline->nama_timeline}}
            </div>
            <div class="timeline-footer">
              
            </div>
          </div>
          @endforeach
        </div>
        <!-- END timeline item -->
        <!-- timeline item -->
       
        <!-- END timeline item -->
        <!-- timeline item -->
        
        <!-- END timeline item -->
        <!-- timeline time label -->
        
      </div>
    </div>
    <!-- /.col -->
  </div>
</div>
@push('script')
<script type="text/javascript">
var i = 0;
$("#add-btn").click(function(){
  ++i;
$("#dynamicAddRemove").append('<tr><td><input type="text" name="nama_file['+i+']" class="form-control" ></td><td><input type="file" name="file_dokumen_pendukung['+i+']" class="form-control" ></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');

});
$(document).on('click', '.remove-tr', function(){  
$(this).parents('tr').remove();
});  
</script>
@endpush

@endsection
