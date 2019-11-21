
<?php require 'views/sidemenu.php'?>
<style>

.tablaBusqueda tr th{
  color:white;
  background-color: #059485;
}

#muestra{
  height: auto;
  max-width: 150px;
}
#muestra:hover{
  filter: contrast(250%);
}
</style>
   <script>
        $(document).ready(function() {
          $("#file-input").change(function() {
          readURL(this);
        });
          getSexo();
          getTipo();
          getPatron();
          getColor();
        }); //fin document ready

        function getRaza() {
                var url = "<?php echo constant('URL') ?>registromascotas/getRaza";
                var parametrosajax={
                  tipo: $("#mascota").val()
                }
                $.ajax({
                    url: url,
                    type:"post",
                    data: parametrosajax,
                    success: function(data) {
                        //console.log(data);
                        $("#raza_id").empty();
                        $("#raza_id").append("<option value=''>Seleccione una raza</option>");
                        $("#raza_id").append(data);
                    },
                    error: function() {
                        alert("error");
                    }
                });
            }


        function getSexo() {
            var url = "<?php echo constant('URL') ?>registromascotas/getSexo";
            $.ajax({
                url: url,
                success: function(data) {
                    //console.log(data);
                    $("#sexoM").empty();
                    $("#sexoM").append("<option value=''>Seleccione sexo mascota</option>");
                    $("#sexoM").append(data);
                },
                error: function() {
                    alert("error");
                }
            });
        }

        function getTipo() {
            var url = "<?php echo constant('URL') ?>registromascotas/getTipo";
            $.ajax({
                url: url,
                success: function(data) {
                    //console.log(data);
                    $("#mascota").empty();
                    $("#mascota").append("<option value=''>Seleccione un tipo de mascota</option>");
                    $("#mascota").append(data);
                },
                error: function() {
                    alert("error");
                }
            });
        }        

            function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
              $('#muestra').attr('src', e.target.result);
            }
            reader.onloadend = function() {
              $("#baseimg").val(reader.result)
            }
            
            reader.readAsDataURL(input.files[0]);
          }
        }

          function getColor() {
                    var url = "<?php echo constant('URL') ?>registromascotas/getColor";
                    $.ajax({
                        url: url,
                        success: function(data) {
                            console.log(data);
                            $("#color_id").empty();
                            $("#color_id").append("<option value=''>Seleccione color de la mascota</option>");
                            $("#color_id").append(data);
                        },
                        error: function() {
                            alert("error");
                        }
                    });
                }          

          function getPatron() {
                    var url = "<?php echo constant('URL') ?>registromascotas/getPatron";
                    $.ajax({
                        url: url,
                        success: function(data) {
                            console.log(data);
                            $("#patron_id").empty();
                            $("#patron_id").append("<option value=''>Seleccione patrón de color</option>");
                            $("#patron_id").append(data);
                        },
                        error: function() {
                            alert("error");
                        }
                    });
                }                 
      </script>

<div style="padding: 0;padding-right: 21px;">
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  <h1>Agregar Mascota</h1>
    <div id="registrar" class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="<?php echo constant('URL')?>registromascotas/registraMascota">
                <input type="hidden" id="baseimg" name="baseimg">
                <input type="hidden" id="id_usr" name="id_usr" value="<?php echo $_SESSION['id_usr']?>">
                <div class="container">
                  <div class="row">
                    <div class="col-md-12 form-group" ><h3>Datos de la mascota<h3></div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                          <div class="col-md-12 form-group">
                          <label for="chipID">Chip identificador</label>
                          <br>
                          <input id="chipId" name="chipId" type="text" placeholder="Chip identificador" class="form-control" required>
                        </div>
                        <div class="col-md-12 form-group">
                          <label for="nombreM">Nombre de mascota</label>
                          <br>
                          <input id="nombreM" name="nombreM" type="text" placeholder="Ingrese nombre" class="form-control" required>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6  form-group" align="center">
                      <label for="file-input" title="Presione para agregar imagen">
                        <img id="muestra" src="<?php echo constant('URL') ?>public/img/Add Image_96px.png">
                      </label>
                      <br>
                      <input name="file-input" style="display:none" accept="image/x-png,image/gif,image/jpeg" id="file-input" type="file" class="form-control"/>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6  form-group"><label for="mascota">Tipo de mascota</label><br>
                      <select class="form-control" name="mascota" id="mascota" onchange="getRaza()">
                        <option value="">Seleccione un tipo de mascota</option>
                      </select>
                    </div>
                    <div class="col-md-6 form-group"><label for="raza_id">Raza</label><br>
                      <select class="form-control" id="raza_id" name="raza_id" >
                          <option value=''>Seleccione una raza</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6  form-group">
                      <label for="fechaNacM">Fecha de nacimiento</label>
                      <br>
                      <input id="fechaNacM" name="fechaNacM" type="date" placeholder="Fecha Nacimiento" class="form-control" required>
                    </div>
                    <div class="col-md-6  form-group">
                      <label for="sexoM">Sexo de mascota</label><br>
                      <select class="form-control" id="sexoM" name="sexoM" >
                        <option value=''>Seleccione sexo mascotas</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6  form-group">
                      <label for="color_id">Color de mascota</label><br>
                      <select class="form-control" id="color_id" name="color_id" required>
                        <option value=''>Seleccione color de la mascota</option>
                      </select>
                    </div>
                    <div class="col-md-6  form-group">
                      <label for="patron_id">Patrón de color</label><br>
                      <select class="form-control" id="patron_id" name="patron_id" required>
                        <option value=''>Seleccione patrón de color</option>
                      </select>
                    </div>                    
                  </div>                  
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="observacionM">Observaciones</label>
                      <br>
                <textarea class="form-control" id="observacionM" name="observacionM" placeholder="Ingrese observaciones de la mascota" rows="5"></textarea>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
                        <button type="submit" class="btn btn-verde" name="aceptar" style="margin-right:20px" >Ingresar mascota</button>
                        <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#ModalCancelar" style="height:62px;margin-left:20px" >Cancelar</button>
                        </div>
                    </div>
                </div>
                      
                        
                </form>
            </div>
        </div>
    </div>
<div class="modal fade" id="ModalCorrecto">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="col-lg-12">
            <div class="alert alert-primary alert-dismissible">
              <strong>Registro mascota satisfactorio!</strong> Presione <a href="http://localhost/repositorio-kanui/mvcProyect" class="alert-link">aquí</a> para continuar.
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
              <strong>Esta seguro de salir?</strong> Presione <a href="http://localhost/repositorio-kanui/mvcProyect" class="alert-link">aquí</a> para salir.
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
