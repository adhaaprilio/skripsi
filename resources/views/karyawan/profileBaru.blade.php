@extends('layout.master')    
 @section('title')
    Detail Karyawan
 @endsection
 @section('content')  
 <div class="container-fluid">
    <div class="row">
      <div class="col-md">

        <!-- Profile Image -->
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Detail Karyawan</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
          <strong> Nama:</strong>

            <p class="">
            {{$karyawan->nama_karyawan}}
            </p>

            <hr>  
          <strong> Username:</strong>

            <p class="">
            {{$karyawan->username}}
            </p>

            <hr>

            <strong> Email:</strong>

            <p class="">{{$karyawan->email_karyawan}}</p>

            <hr>

            <strong> Alamat:</strong>

            <p class="">@if(isset($karyawan->alamat))
            {{$karyawan->alamat}}   
            @else
            -
            @endif</p>

            <hr>

            <strong> Nomor HP:</strong>

            <p class="">@if(isset($karyawan->no_hp))
            {{$karyawan->no_hp}}
             @else
             -
             @endif</p>

            <hr>

            
          </div>
          <!-- /.card-body -->
          @csrf
            <div class="card-footer">
            <a href="/editProfile" class="btn btn-warning" >Edit</a>
                </div>
        </div>
        <!-- /.card -->
      </div>
      
      <!-- /.col -->
      
    </div>
    <!-- /.row -->
    
    <!-- /.card-body -->
    </div>
  </div>
@endsection
