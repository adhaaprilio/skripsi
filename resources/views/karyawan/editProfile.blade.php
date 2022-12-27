@extends('layout.master')    
 @section('title')
    Edit Profile
 @endsection
 @section('content')  
 <div class="card">
        <div class="card-body p-0">
 <form action='/updateProfile' method="post">
  @csrf

                <div class="card-body">
                <div class="form-group">
                    <label for="nama_karyawan">Nama Karyawan</label>
                    <input type="text" class="form-control" name="nama_karyawan" id="nama_karyawan" value="{{old('nama_karyawan', $karyawan->nama_karyawan)}}">
                  </div>
                  <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" id="username" value="{{old('username', $karyawan->username)}}">
                  </div>
                  <div class="form-group">
                    <label for="email_karyawan">Email</label>
                    <input type="email" class="form-control" name="email_karyawan" id="email_karyawan" value="{{old('email_karyawan', $karyawan->email_karyawan)}}">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value=
                    "@if(isset($karyawan->alamat))
                    {{$karyawan->alamat}} 
            @else            
            @endif">
                  </div>
                  <div class="form-group">
                    <label for="no_hp">Nomor HP</label>
                    <input type="text" class="form-control" name="no_hp" id="no_hp" value=
                    "@if(isset($karyawan->no_hp))
                    {{$karyawan->no_hp}} 
            @else            
            @endif">
                  </div>
                  
                  <!--<div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div>-->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
</div>
</div>
@endsection   