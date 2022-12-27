<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Kantor Notaris Ade Suryatini</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('admin/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{asset('admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('admin/dist/css/adminlte.min.css')}}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="login-box">
@if(session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
  {{session('loginError')}}
  @endif
</div>
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <p class="h1">SIMPDA</p>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login Form</p>

      <form action="/login" method="post">
      @csrf
        <div class="form-floating mb-3">
          <input type="text" name="username" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" 
          autofocus required value="{{old('username')}}">
          
          <label for="username">Username</label>
          @error('username')
                    <div class="invalid-feedback d-block">
                    {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="form-floating mb-3">
          <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" 
          placeholder="Password" required >
          
          <label for="password">Password</label>
          @error('password')
                    <div class="invalid-feedback d-block">
                    {{ $message }}
                    </div>
                @enderror
        </div>
        <div class="row justify-content-center">
           
          <div class="justify-content-center">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          
        </div>
      </form>
      <p class="mb-0">
        <a href="/register" class="text-center">Belum punya akun? Registrasi sekarang!</a>
      </p>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
