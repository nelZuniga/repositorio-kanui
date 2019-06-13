
<!--NEL PRUEBA-->
<?php require 'views/header.php';?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<br><br>
<div align="center">
  <h2>Registro Sanitario</h2>
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <div class="list-group">
                        <table class="table table-bordered" id="myTable">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class="col-md-8">
                          <h5 class="page-header" style="text-align: left;">Seleccione Mascota
                          </h5>
                          <div class="row">
                            <div class="col-md-8">

                              <select class="form-control">
                                <option value="+47">Millie</option>
                                <option value="+46">Max</option>
                              </select>
                            </div>
                          </div>
                          <br />
                        </div>
                         <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="producto" name="producto" type="text" placeholder="Producto" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="dosis" name="dosis" type="text" placeholder="Dosis/Tipo" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fecha" name="fecha" type="date" placeholder="Fecha" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="observacion" name="observacion" placeholder="Ingrese Observaciones" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8"> 
                        <h5 class="page-header" style="text-align: left;">Agregar Imagen</h5>
                         <input name="file-input" id="file-input" type="file" class="form-control" />
                        </div>
                        </div>

                        <div class="form-group">
                        <div class="col-md-8">
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#ModalCorrecto">Aceptar</button>
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
              <strong>Registro  Saniario Satisfactorio!</strong> Presione <a href="http://localhost/repositorio-kanui/mvcProyect" class="alert-link">aquí</a> para continuar.
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
              <strong></strong> Presione <a href="http://localhost/repositorio-kanui/mvcProyect/sanitario" class="alert-link">aquí</a> para Volver.
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