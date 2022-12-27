@extends('layout.master')    
 @section('title')
    Edit Akta
 @endsection
 @section('content')  
 <div class="card">
        <div class="card-body p-0">
 <form action='/updateAkta/{{$dokumenAkta->id}}' method="post">
  @csrf

                <div class="card-body">
                <div class="form-group">
                    <label for="judul_akta">Nama Akta</label>
                    <input type="text" class="form-control" name="judul_akta" id="judul_akta" value="{{old('judul_akta', $dokumenAkta->judul_akta)}}">
                  </div>
                  <div class="form-group">
                    <label for="nomor_akta">Nomor Akta</label>
                    <input type="text" class="form-control" name="nomor_akta" id="nomor_akta" value="{{old('nomor_akta', $dokumenAkta->nomor_akta)}}">
                  </div>
                  <div class="form-group">
                    <label for="jenis_akta">Jenis Akta</label>
                    <input type="text" class="form-control" name="jenis_akta" id="jenis_akta" value="{{old('jenis_akta', $dokumenAkta->jenis_akta)}}">
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