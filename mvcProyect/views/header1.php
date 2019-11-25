
<!DOCTYPE html>
<html lang="en">
<head>
  <title>- KANUI -</title>
  <link rel="stylesheet" href="<?php echo constant('URL') ?>public/css/main.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  <script src="public/js/kanuilib.js"></script>
  <link rel="stylesheet" href="CSS/css.css"> 
  <script>
  $(document).ready(function(){
    $('.test, .nav-link, .navbar-brand, .new-button').click(function() {
    var sectionTo = $(this).attr('href');
    $('html, body').animate({
      scrollTop: $(sectionTo).offset().top
    }, 1000);
});
  });
  </script>
  <style>
  .topbar{
    background-color:#1b1b1b;
    max-width: 100%;
    color:#54FFEE;
    font-size: 13px;
    height: 30px,
    }
    .topbar a{
    color:#54FFEE;
    }
  .bar{
    padding: 0px;
    
  }
  .col-sm-1{
      padding: 0;
    }
  @media(max-width: 1080px) and (min-width:579px){
    .topbar{
    background-color:#1b1b1b;
    max-width: 100%;
    color:#54FFEE;
    font-size: 13px;
    height: 50px
    }
    .col-sm-1{
      padding: 0;
    }
  }
  @media(max-width: 578px) {
    .offset-sm-10{
    }
    .col-sm-1{
      width: 20%;
      max-width: 20%;
      padding: 0;
    }
  }
  </style>
</head>
<body style="margin-top:4em">
<div class="fixed-top bar">
  <div class="container topbar">
    <div class="row">
      <div class="col-sm-1 offset-sm-10"><a href="<?php echo constant('URL') ?>register">Registrarse</a></div>
      <div class="col-sm-1"><a href="<?php echo constant('URL') ?>login">Inicio de sesión</a></div>
    </div>
  </div> 
<nav class="navbar navbar-expand-sm bg-caliso navbar-dark" style="background-color:#059485">
    <a class="navbar-brand" href="<?php echo constant('URL') ?>main">
    <img src="<?php echo constant('URL') ?>/public/img/logo-2kanui.png" alt="Kanui" style="width:150px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
   
  <ul class="navbar-nav ml-auto smooth-scroll list-unstyled">
  <li class="nav-item">
      <a data-scroll class="nav-link" role="navigation" style="text-align: right" href="#mobile" data-scroll-nav="1">Kanui mobile</a>
    </li>
  <li class="nav-item">
      <a class="nav-link" role="navigation" style="text-align: right" href="#acerca" data-scroll-nav="2">Sobre nosotros</a>
    </li>
  <li class="nav-item">
      <a class="nav-link" role="navigation" style="text-align: right" href="#socios" data-scroll-nav="3">Nuestros socios</a>
    </li>
  <li class="nav-item">
      <span style="width:150px"></span>
    </li>    
  </ul>    
  </div>  
</nav>
</div>
<br>

</body>
</html>