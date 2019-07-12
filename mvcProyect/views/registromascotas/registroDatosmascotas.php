<html lang="en">
<head>
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
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<?php require 'views/header.php'?>
   <script>
        $(document).ready(function() {
            
        }); //fin document ready

        function getRaza() {
                var url = "<?php echo constant('URL') ?>registromascotas/getRaza";
                var parametrosajax={
                  tipo: $("#mascota").val()
                }
                console.log(parametrosajax);
                $.ajax({
                    url: url,
                    type:"post",
                    data: parametrosajax,
                    success: function(data) {
                        //console.log(data);
                        $("#raza_id").empty();
                        $("#raza_id").append("<option value=''>Seleccione Una Raza</option>");
                        $("#raza_id").append(data);
                    },
                    error: function() {
                        alert("error");
                    }
                });
            }
      </script>
    </head>

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
                            <div class="col-md-8"> 
                        <h5 class="page-header" style="text-align: left;">Tipo de Mascota</h5>
                        <select class="form-control" name="mascota" id="mascota" onchange="getRaza()">
                                <option value="">Seleccione un tipo de mascota</option>
                                <option value="1">Perro</option>
                                <option value="2">Gato</option>
                              </select>
                        </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-8"> 
                        <h5 class="page-header" style="text-align: left;">Tipo de Mascota</h5>
                        <select class="form-control" id="raza_id" name="raza_id" >
                                <option value=''>Seleccione Una Raza</option>
                            </select>
                        </div>
                        </div>
                        <div class="form-group">
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
                        <h5 class="page-header" style="text-align: left;">Agregar imagen</h5>
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
                        <button type="submit" class="btn btn-verde" name="aceptar" >Ingresar Mascota</button>
                        <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#ModalCancelar" >Cancelar</button>
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
 <div id="respuesta"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">



                </div>
            </div>
        </div>
  <!-- ModalRecupera -->  
<br><br><br><br><br>
  <?php require 'views/footer.php'?>

</body>

</html>    
