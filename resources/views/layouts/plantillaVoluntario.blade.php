<!DOCTYPE html>
<html>
<head>
    <title>UNAH-AYUDA-DDN</title>

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/sticky-footer-navbar.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/starter-template.css')}}">

</head>
<body>

    <!--Navgeacion-->
    <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top">
      @yield("cabecera")

      <a class="navbar-brand" href="#">UNAH-AYUDA-DDN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Tareas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Paquetes</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Dropdown</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
        </ul>
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="border border-light">
        <img src="{{asset('assets/img/vegeta.jpg')}}" alt="Vegeta-Sama" class="rounded-circle" width="40" height="40"> Vegeta-Sama</span></a>
            <div class="dropdown-menu" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
      </div>
    </nav>

    <!-- Cuerpo-->
    <main role="main" class="container">
      <div class="starter-template">
        @yield("cuerpo")
      </div>

    </main>

    <!-- Pie -->
    <footer class="footer mt-auto py-3">
      @yield("pie")
      <div class="container">
        <span class="text-muted">FM Developers © 2019</span>
      </div>
    </footer>

    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/jquery/jquery.slim.min.js')}}"></script>
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/jquery/jquery-3.3.1.slim.min.js')}}"></script>

</body>
</html>