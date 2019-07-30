<?php session_start(); 
if(!isset($_SESSION) || !isset($_SESSION['nombres']) || !isset($_SESSION['apellido_paterno'])){
  session_destroy();
  $url = constant('URL')."main";
  echo "<script>window.location.href='".$url."'</script>";
}?>
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
    function off_session(){
    var url = "<?php echo constant('URL')?>main/cerrar_session";
      $.ajax({
              url:url,
              type: 'post',
              success: function(){
                Swal.fire({
                  title: "inicio de sesión",
                  text:'Sesión Cerrada con Éxito',
                  type: 'info'
                }).then((result) => {
                  if (result.value) {
                    window.location.href = "<?php echo constant('URL')?>main";
                  }
                })
              },
              error: function(){
                  alert("error");
                    }
                });

    }
  </script>
</head>
<body>
<nav class="navbar fixed-top navbar-expand-sm bg-caliso navbar-dark" style="background-color:#059485">
    <a class="navbar-brand" href="<?php echo constant('URL') ?>home">
    <img src="views/imagenes/pg.jpg" alt="Kanui" style="width:40px;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo constant('URL') ?>registroUsuario" target="_self">Registro Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo constant('URL') ?>registromascotas">Registro Mascotas</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo constant('URL') ?>sanitario">Registro Sanitario</a>
      </li> 
    </ul>
  <ul class="navbar-nav ml-auto">
  <li class="nav-item">
      <a class="nav-link" style="text-align: right" href="<?php echo constant('URL') ?>Perfil">Perfil</a>
    </li>
  <li class="nav-item">
      <a class="nav-link" style="text-align: right" onclick="off_session()">Cerrar Sesión</a>
    </li>    
  </ul>    
  </div>  
</nav>
<br>

</body>
</html>