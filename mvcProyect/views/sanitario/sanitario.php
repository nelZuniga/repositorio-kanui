<?php require 'views/sidemenu.php'?>

<br><br>
<div align="center">
  <img src="views/imagenes/registro_sanitario.png" alt="rsa" style="width:300px;">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <div class="list-group">
                        <table class="table table-bordered" id="myTable">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                        <div class=form-group" >
                          <div class="col-md-8">
                            <div class="col-md-8">
                              <label for="pBusqueda" class="control-label" id="region" name="region">Seleccione parámetro de busqueda</label>
                              <select class="form-control" id="pBusqueda" name="pBusqueda" required>
                                <option>Busqueda por ID Chip</option>
                                <option>Busqueda por RUT-DNI</option>
                                <option>Busqueda por Nombe Dueño</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                          <div class="col-md-8">
                            <div class="col-md-8">
                            <input id="producto" name="producto" type="text" placeholder="Ingrese texto de busqueda" class="form-control">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                        <div class="col-md-8">
                        <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#ModalBuscar">Aceptar</button>
                        <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#ModalCancelar" >Cancelar</button>
                        </div>
                        </div>
                    </table>
                    </fieldset>
                </form>
            </div>
        </div>
<div class="modal fade" id="ModalBuscar">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col-lg-12">
            <div class="alert alert-primary alert-dismissible">
              <strong>Dato Encontrados!</strong> </br> Presione <a href="http://localhost/repositorio-kanui/mvcProyect/sanitario" class="alert-link">aquí</a> para continuar.
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