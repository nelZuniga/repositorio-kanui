
    <?php require 'views/header1.php';?>
    
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
        <h1 class="text-info">Pedigree</h1>
        <h5 class="text-info">Quiérelo como el a ti </h5>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="../mvcProyect/views/imagenes/enfermo.jpg" alt="Chicago" width="1100" height="500">
      <div class="carousel-caption">
        <h1 class="text-info">Veterinaria Patitas</h1>
        <h5 class="text-info">La atención veterinaria que buscabas</h5>
      </div>   
    </div>
    <div class="carousel-item">
      <img src="../mvcProyect/views/imagenes/gato.jpg" alt="New York" width="1100" height="500">
      <div class="carousel-caption">
        <h1 class="text-info">Aregatos</h1>
        <h5 class="text-info">Animate a probarla</h5>
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