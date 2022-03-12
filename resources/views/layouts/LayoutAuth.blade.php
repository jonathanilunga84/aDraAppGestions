<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire de Connexion</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free-5.15.3-web/css/all.min.css')}}" />
    <!-- icheck bootstrap -->
    <!-- link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css" -->
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('assets/styles/adminlte.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/styles/myCss.css')}}" />
  </head>
<body class="hold-transition login-page bg-dark">
  <div class="login-box" style="width: 700px;">
    <div class="row bg-dangerM justify-content-centerM">
      <div class="col-sm-12 bg-primaryM text-center">
        <img src="{{asset('assets/images/Logo adra.png')}}" style="height: 100px;" class="img-fluid" />
      </div>
    </div>
    <!-- /.login-logo -->
    <div class="card card-outline border-Adra card-primaryM bg-darkM">
      <!-- div class="card-header text-center">
        <a href="#" style="color: #b3b6b9; font-size: 1.8em;" class="h1"><b style="font-weight: bold;">ADRA</b></as>        
      </div -->
      <div class="card-body">
        <!-- p class="login-box-msg">Sign in to start your session</p -->

        <!-- form Auth -->
          @yield('form')
        <!-- /End form Auth -->
        <!-- div class="social-auth-links text-center mt-2 mb-3">
          <a href="#" class="btn btn-block btn-primary">
            <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
          </a>
          <a href="#" class="btn btn-block btn-danger">
            <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
          </a>
        </div -->
        <!-- /.social-auth-links -->

        <!-- p class="mb-1">
          <a href="forgot-password.html">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.html" class="text-center">Register a new membership</a>
        </p -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.login-box -->

<!-- jQuery -->
<script src="{{asset('assets/js/jquery.min.js')}}" type="text/javascript"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets/js/adminlte.min.js')}}" type="text/javascript"></script>
</body>
</html>
