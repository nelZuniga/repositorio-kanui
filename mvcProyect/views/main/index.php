<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Main</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php require 'views/header.php';?>
 
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    width: 100%;
    height: 100%;
  }

  </style>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
<div id="demo" class="carousel slide" data-ride="carousel">
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="../mvcProyect/views/imagenes/comida.jpg" alt="Alimento" width="1100" height="500">
      <div class="carousel-caption">
        <h2>Pedigee</h2>
        <p>Quiérelo como el a ti </p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="../mvcProyect/views/imagenes/enfermo.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h2>Veterinaria Patitas</h2>
        <p>La atención veterinaria que buscabas</p>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="../mvcProyect/views/imagenes/gato.jpg" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
        <h2>Aregatos</h2>
        <p>Animate a probarla</p>
      </div>   
    </div>
  </div>
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
</body>
</html>






    <?php require 'views/footer.php'?>
    
</body>
</html>