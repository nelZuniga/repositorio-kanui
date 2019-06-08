<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/main.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 
</head>
<body>
    


<!-- Inicio de Header -->

<nav class="navbar navbar-expand-sm bg-caliso navbar-dark" style="background-color:#059485">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">
    <img src="views/imagenes/pg.jpg" alt="logo" style="width:40px;">
  </a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo constant('URL') ?>main" target="_self">Registro de Usuario</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Registro Mascotas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Registro Sanitario</a>
    </li>
   <li class="nav-item">
      <a class="nav-link" href="#">Mantenedores</a>
    </li>
  </ul>
  <ul class="navbar-nav ml-auto">
  <li class="nav-item">
      <a class="nav-link" style="text-align: right" href="<?php echo constant('URL') ?>login">Inicio de Sesión</a>
    </li>
  </ul>
</nav>

</body>
</html>