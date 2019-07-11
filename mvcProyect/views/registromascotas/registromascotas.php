<?php require 'views/header.php'?>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<br><br>
<div align="center">
  <h2>Registro Mascotas</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="<?php echo constant('URL')?>registromascotas/registraMascota">
                    <fieldset>
                        <div class="list-group">
                        <table class="table table-bordered" id="myTable">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                       
                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="chipId" name="chipId" type="text" placeholder="Chip identificador" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input type="text" id="rutDueno" name="rutDueno" required oninput="checkRut(this)" placeholder="Ingrese RUT Dueño" class="form-control" pattern="\d{3,8}-[\d|kK]{1}">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="nombreM" name="nombreM" type="text" placeholder="Ingrese Nombre" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fechaNacM" name="fechaNacM" type="date" placeholder="Fecha Nacimiento" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="Raza" name="Raza" type="text" placeholder="Ingrese Raza" class="form-control">
                            </div>
                        </div>
                         <div class="col-md-8">
                          <h5 class="page-header" style="text-align: left;">Tipo</h5>
                          <div class="row">
                            <div class="col-md-8">

                              <select class="form-control" name="mascota">
                                <option value="47">Perro</option>
                                <option value="46">Gato</option>
                              </select>
                            </div>
                          </div>
                          <br />
                        </div>
                         <div class="col-md-8">
                          <h5 class="page-header" style="text-align: left;">Sexo</h5>
                          <div class="row">
                            <div class="col-md-8">
                              <select class="form-control" name="sexoM">
                                <option value="47">Hembra</option>
                                <option value="46">Macho</option>
                              </select>
                            </div>
                          </div>
                          <br />
                        </div>

                        <div class="form-group">
                            <div class="col-md-8"> 
                        <h5 class="page-header" style="text-align: left;">Agregar Imagen</h5>
                         <input name="file-input" id="file-input" type="file" class="form-control" />
                        </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="observacionM" name="observacionM" placeholder="Ingrese Observaciones" rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                        <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-lg" >Ingresar Mascota</button>
                        <button type="button" class="btn btn-danger btn-lg" data-toggle="modal" data-target="#ModalCancelar" >Cancelar</button>
                        </div>
                        </div>
                    </table>
                    </fieldset>
                </form>
            </div>
        </div>
<div class="modal fade" id="ModalCorrecto">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col-lg-12">
            <div class="alert alert-primary alert-dismissible">
              <strong>Registro Mascota Satisfactorio!</strong> Presione <a href="http://localhost/repositorio-kanui/mvcProyect" class="alert-link">aquí</a> para continuar.
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<div class="modal fade" id="ModalCancelar">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col-lg-12">
            <div class="alert alert-primary alert-dismissible">
              <strong>Esta seguro de salir?</strong> Presione <a href="http://localhost/repositorio-kanui/mvcProyect" class="alert-link">aquí</a> para Salir.
              <br></br>
              <strong></strong> Presione <a href="http://localhost/repositorio-kanui/mvcProyect/registromascotas" class="alert-link">aquí</a> para Volver.
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
    </div>
</div>
  <!-- ModalRecupera -->  
<br><br><br><br><br>
  <?php require 'views/footer.php'?>

</body>

</html>    
