@extends('layout.master')    
 @section('title')
    Detail Klien
 @endsection
 @section('content')  
 <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md">

          
          <!--<div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="{{asset('admin/dist/img/user4-128x128.jpg')}}"
                     alt="User profile picture">
              </div>

              <h3 class="profile-username text-center">{{$klien->nama_klien}}</h3>

              

            </div>
         
          </div>-->
          

          <!-- About Me Box -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Detail Klien</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <strong>Nama Klien:</strong>

              <p class="">
              {{$klien->nama_klien}}
              </p>

              <hr>
  
            <strong>Nama Perusahaan:</strong>

              <p class="">
              {{$klien->nama_perusahaan}}
              </p>

              <hr>

              <strong> NO HP:</strong>

              <p class="">{{$klien->nomor_hp}}</p>

              <hr>
              <strong> Email:</strong>

              <p class="">{{$klien->email}}</p>

              <hr>

              <strong> Alamat:</strong>

              <p class="">{{$klien->alamat}}</p>

              <hr>

              
            </div>
            <!-- /.card-body -->
            
            @csrf
            <div class="card-footer">
            @if(auth()->user()->username!='adha')
            <a href="/editKlien/{{$klien->id}}" class="btn btn-warning" >Edit</a>
            @endif
            <a href="/listKlien" class="btn btn-primary ml-3" >Kembali</a>
                </div>
              
          </div>
          <!-- /.card -->
        </div>
        
        <!-- /.col -->
        
      </div>
      <!-- /.row -->
      
        <div class="card card-primary">
        <div class="card-header">
        <h3 class="card-title">Riwayat Order</h3>
</div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
            <thead>
                <tr>
                    <th style="width: 1%">
                        No
                    </th>
                    <th style="width: 35%">
                        Nama Akta
                    </th>
                    <th style="width: 20%">
                        Penanggung Jawab
                    </th>
                    <th style="width: 30%">
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
                    {{$dokumenAkta->user->nama_karyawan}}  
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
          <!-- /.card -->
        </div>
        <!-- /.col -->
    </div><!-- /.container-fluid -->
  </section>
@endsection
