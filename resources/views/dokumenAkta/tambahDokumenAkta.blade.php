@extends('layout.master')

 @section('title')
    Tambah Dokumen Akta
 @endsection
 @section('content')  
 <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        
      <div class="card card-primary">
          
          <!-- /.card-header -->
          <!-- form start -->
          <form action='/tambahAkta' method='POST' >
            @csrf
            <div class="card-body">
            <div class="form-group">
              <label>Nama Klien</label>
              <select class="form-control select2" name='klien_id' id='klien_id' data-placeholder="Pilih Klien" style="width: 100%;">
              @foreach ($klien as $key)
                        <option value={{$key->id}}>{{$key->nama_klien}}</option>
                        @endforeach
                  </select>
              
            </div>
              <div class="form-group">
                <label for="judul_akta">Nama Akta</label>
                <input type="text" class="form-control" name="judul_akta" id="judul_akta" placeholder="Masukkan Nama Akta">
              </div>
              <div class="form-group">
                <label for="jenis_akta">Jenis Akta</label>
                <input type="text" class="form-control" name="jenis_akta" id="jenis_akta" placeholder="Masukkan Jenis Akta">
              </div>
              <div class="form-group">
                <label for="nomor_akta">Nomor Akta</label>
                <input type="text" class="form-control" name="nomor_akta" id="nomor_akta" placeholder="Masukkan Nomor Akta">
              </div>
              <div class="row">
         <div class="col-6">
             <!-- <div class="form-group">
              <label>Tanggal Mulai</label>
                <div class="input-group date" name="tanggal_mulai "id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate"/>
                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>-->
                <div class="form-group">
              <label>Tanggal Mulai</label>
               
                    <input type="date" name="tanggal_mulai" id="tanggal_mulai" class="form-control" >
                    
                    </div>
                </div>
            
            
            <div class="col-6">
            <div class="form-group">
              <label>Estimasi Tanggal Selesai</label>
               
                    <input type="date" name="tanggal_selesai" id="tanggal_selesai" class="form-control" >
                    
                    </div>
            </div>
            </div>
            </div>
            
              <!--<div class="form-group">
                <label for="exampleInputFile">Dokumen Pendukung</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>-->
                  <!--<div class="input-group-append">
                    <span class="input-group-text">Upload</span>
                  </div>-->
                </div>
              </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </form>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
  
@endsection
@push('script')
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $('#reservationdate').datetimepicker({
        format: 'L'
    })
    $('#reservationdate2').datetimepicker({
        format: 'L'
    })
    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
  });
    </script>
    @endpush