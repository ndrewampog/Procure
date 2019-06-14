<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">


  <title>Modern Business - Start Bootstrap Template</title>

  <!-- Bootstrap core CSS -->

  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{ asset('css/modern-business.cs') }}" rel="stylesheet">
  <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-light fixed-top">
    <div class="container">
       <a href="#" class="pull-left"><img src="/Procure_Logo/Procurelogo.png" width="100" height="70" ></a>     
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link text-dark" href="about.html">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="services.html">Services</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="contact.html">Contact</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#" data-toggle="modal" data-target="#registration">Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="#" data-toggle="modal" data-target="#at-login">Sign in</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  @yield('contents')
  <!-- /.container -->
  <br>
  <!-- Footer -->
  <footer class="footer  bg-light">
    <div class="container">
      <p class="m-0 text-center text-dark">Copyright &copy; ProCure 2018</p>
    </div>
  </footer>


  <div class="modal fade" id="at-login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Welcome To Procure</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(array('url' => '/Login-User', 'files'=>true  ))!!}
        <div class="modal-body"> 
          <label for="username" class="control-label">Username</label>
          <div class="mb-2">
            <input id="text" type="username" class="form-control" name="username" required autofocus>
          </div>
          <label for="password" class="control-label">Password</label>
          <div class="mb-2">
            <input id="password" type="password" class="form-control" name="password" required>
          </div>
        </div>
        <div class="modal-footer">
          {!!Form::submit('Login',['class'=>'btn btn-primary']) !!}
        </div>  
        {!! Form::close() !!}
      </div>
    </div>
  </div>

  <div class="modal fade" id="registration" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Select User Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="md-12">
            <a  href="/normal-user-registration-form" class=" nav-link btn btn-primary btn-lg btn-block ">User</a>
          </div>
          <br>
          <div class="md-12">
            <a  href="/pwd-registration-form" class=" nav-link btn btn-primary btn-lg btn-block ">PWD</a>
          </div>
          <br>
          <div class="md-12">
            <a  href="/senior-citizen-registration-form" class=" nav-link btn btn-primary btn-lg btn-block ">Senior Citizen</a>
          </div>
          <br>
          <div class="md-12">
            <a  href="/pharmacy-registration-form" class=" nav-link btn btn-primary btn-lg btn-block ">Pharmacy</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
