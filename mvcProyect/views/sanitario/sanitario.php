
<<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="http://localhost/mvcproyect/public/css/main.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>!--NEL PRUEBA-->
<?php require 'views/header.php';?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
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