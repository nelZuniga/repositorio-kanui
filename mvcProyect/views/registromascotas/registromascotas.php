<?php require 'views/header.php'?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<br><br>
<div align="center">
  <div align="center">
    <div align="center">
          REGISTRO DE MASCOTAS
    </div>

    <div class="form">
      <div class="container">
        <div class="row">
            <div class="col-md-5"style="margin-bottom:5px;">Chip identificdor</div>
            <div class="col-md-7"style="margin-bottom:5px;"><input type="text" style="width:80%;"></div>
            <div class="col-md-5"style="margin-bottom:5px;">Rut Dueño</div>
            <div class="col-md-7"style="margin-bottom:5px;"><input type="text" style="width:80%;"></div>
            <div class="col-md-5"style="margin-bottom:5px;">Nombre</div>
            <div class="col-md-7"style="margin-bottom:5px;"><input type="text" style="width:80%;"></div>
            <div class="col-md-5"style="margin-bottom:5px;">F.Nacimiento</div>
            <div class="col-md-7"style="margin-bottom:5px;""><input type="date" name="fecha" style="width:80%;"></div>
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
            <div class="col-md-5"style="margin-bottom:5px;">Observaciones</div>
            <div class="col-md-7"style="margin-bottom:5px;"><textarea id="observa" style="width:80%;"></textarea></div>
            <div class="col-md-12" align="center"><button class="btn btn-verde">Registrar</button></div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php require 'views/footer.php'?>
</body>
</html>