@extends('layout.master')    
 @section('title')
    Edit Klien
 @endsection
 @section('content')  
 <div class="card">
        <div class="card-body p-0">
 <form action='/editKlien/{{$klien->id}}' method="post">
  @csrf
  @method('put')
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_klien">Nama Klien</label>
                    <input type="text" class="form-control" name="nama_klien" id="nama_klien" value="{{old('nama_klien', $klien->nama_klien)}}">
                  </div>
                  <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" value="{{old('nama_perusahaan', $klien->nama_perusahaan)}}">
                  </div>
                  <div class="form-group">
                    <label for="nomor_hp">Nomor HP</label>
                    <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" value="{{old('nomor_hp', $klien->nomor_hp)}}">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{old('email', $klien->email)}}">
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="{{old('alamat', $klien->alamat)}}">
                  </div>
                  <!--<div class="form-group">
                    <label for="exampleInputFile">Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <!--<div class="input-group-append">
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