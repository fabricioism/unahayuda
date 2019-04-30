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
      <?php
        $r = 1;
      ?>

      <a class="navbar-brand" href="/encargado/inicio">UNAH-AYUDA-DDN</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item ">
            <a class="nav-link" href="/index">Inicio<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/encargados/tarea">Tareas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/encargados/encargado">Encargados</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Paquetes</a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
              <a class="dropdown-item" href="/encargados/paquete">Informacion</a>
              <a class="dropdown-item" href="/encargados/contenido">Contenidos</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gestión de voluntarios</a>
            <div class="dropdown-menu" aria-labelledby="dropdown03">
              <a class="dropdown-item" href="/encargados/voluntario">Informacion</a>
              <a class="dropdown-item" href="/encargados/asignacion">Asignaciones</a>
              <a class="dropdown-item" href="/encargados/a_cargo_de">A cargo de</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administración</a>
            <div class="dropdown-menu" aria-labelledby="dropdown01">
              <a class="dropdown-item" href="/encargados/articulo">Articulos</a>
              <a class="dropdown-item" href="/encargados/lista">Listas</a>
              <a class="dropdown-item" href="/encargados/tipo">Tipos</a>
              <a class="dropdown-item" href="/encargados/status">Status</a>
              <a class="dropdown-item" href="/encargados/rol">Roles</a>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav p">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown02" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="border border-light">
        <img src="{{ URL::to('/') }}/assets/img/{{ Auth::user()->url}}" alt="Vegeta-Sama" class="rounded-circle" width="40" height="40">{{ Auth::user()->name}}</span></a>
            <div class="dropdown-menu ml-auto p-2" aria-labelledby="dropdown02">
              <a class="dropdown-item" href="#">Perfil</a>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li></ul>
      </div>
    </nav>

    <!-- Cuerpo-->
    <div class="row">
    <main role="main" class="container">
      <!--<div class="starter-template">-->
        @yield("cuerpo")

    </main>
    </div>

    <!-- Pie -->
    <footer class="footer mt-auto py-3">
      @yield("pie")
      <div class="container">
        <span class="text-muted">FM Developers © 2019</span>
      </div>
    </footer>
    <script src="{{asset('assets/jquery/jquery.slim.min.js')}}"></script>
    <script src="{{asset('assets/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/jquery/jquery-3.3.1.slim.min.js')}}"></script>
    <script type="{{asset('assets/jquery/jquery-3.3.1.slim.min.js')}}"></script>
    <!--<script src="{{asset('assets/js/popper.min.js')}}"></script>-->
    <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script>window.jQuery || document.write('<script src="{{asset('assets/jquery/jquery.slim.min.js')}}"><\/script>')</script>
</body>
</html>