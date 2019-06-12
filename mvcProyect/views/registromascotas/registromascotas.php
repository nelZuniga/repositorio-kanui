<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>inscripcion</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
html, body{
  height: 100%;
}
body {
			background-image: url(http://img.eltipografo.cl/media/2015/04/Corrida-1-21.jpg) ;
			background-position: center center;
			background-repeat:  no-repeat;
			background-attachment: fixed;
			background-size:  cover;
			background-color: #999;

}

div, body{
  margin: 0;
  padding: 0;
  font-family: exo, sans-serif;

}
footer{
  background-color: #938bba;
  width: 100%;
  color:white;
  font-size: 18px;
  margin-top:10px;
}

.caja{

}
.contenido{
  background-color: white;
  padding: 10px;
  width: 50%;
  border-radius: 10px;
  margin-top:20%;
}

.titule{
  font-size: 26px;
  font-weight:bold;
}
</style>

</head>
<body>
<?php require 'views/header.php';?>

<div class="caja align-middle" align="center">
  <div class="contenido">
    <div class="titule">
          REGISTRO DE MASCOTAS
    </div>

    <div class="form">
      <div class="container">
        <div class="row">
            <div class="col-md-5" style="margin-bottom:5px;">Chip identificdor</div>
            <div class="col-md-7"style="margin-bottom:5px;"><input type="text" style="width:80%;"></div>
            <div class="col-md-5"style="margin-bottom:5px;">Rut Dueño</div>
            <div class="col-md-7"style="margin-bottom:5px;"><input type="text" style="width:80%;"></div>
            <div class="col-md-5" style="margin-bottom:5px;">Nombre</div>
            <div class="col-md-7"style="margin-bottom:5px;"><input type="text" style="width:80%;"></div>
            <div class="col-md-5"style="margin-bottom:5px;">F.Nacimiento</div>
            <div class="col-md-5"style="margin-bottom:4px;"><input type="date" name="fecha"></div>
            <div class="col-md-5"style="margin-bottom:5px;">Raza</div>
            <div class="col-md-7"style="margin-bottom:5px;"><input type="text" style="width:80%;"></div>
            <div class="col-md-5"style="margin-bottom:5px;">Tipo</div>
            <div class="col-md-7"style="margin-bottom:5px;"><select style="width:80%;">
                                        <option>Perro</option>
                                        <option>Gato</option>
                                        
                                  </select>
            </div>
            <div class="col-md-5"style="margin-bottom:5px;">Sexo</div>
            <div class="col-md-7"style="margin-bottom:5px;"><select style="width:80%;">
                                        <option>Hembra</option>
                                        <option>Macho</option>
                                        
                                    </select>

            </div>                
            <div class="col-md-5"style="margin-bottom:5px;">Observaciones
            </div class="col-md-5"style="margin-bottom:5px;"><textarea id="observa"></textarea></div>
            <rp>

            </rp>
          

            <div class="col-md-12" align="center"><button class="btn btn-info">Registrar</button></div>
            <div class="col-md-2 itm inicio" align="center" ><a style="color:blue" href="Index.html"><div style="margin-top:10px">INICIO</div></a></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require 'views/header.php';?>
<?php require 'views/footer.php'?>
</body>
</html>