@extends('layout.master')    
 @section('title')
    Tambah Klien
 @endsection
 @section('content')  
 <div class="card">
        <div class="card-body p-0">
 <form action='/tambahKlien' method="post">
  @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="nama_klien">Nama Klien</label>
                    <input type="text" class="form-control" name="nama_klien" id="nama_klien" placeholder="Masukkan Nama Klien" required>
                  </div>
                  <div class="form-group">
                    <label for="nama_perusahaan">Nama Perusahaan</label>
                    <input type="text" class="form-control" name="nama_perusahaan" id="nama_perusahaan" placeholder="Masukkan Nama Perusahaan" required>
                  </div>
                  <div class="form-group">
                    <label for="nomor_hp">Nomor HP</label>
                    <input type="text" class="form-control" name="nomor_hp" id="nomor_hp" placeholder="Masukkan Nomor HP" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
                  </div>
                  <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Masukkan Alamat" required>
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