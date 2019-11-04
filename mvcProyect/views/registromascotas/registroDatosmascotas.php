
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
                        $("#raza_id").append("<option value=''>Seleccione Una Raza</option>");
                        $("#raza_id").append(data);
                    },
                    error: function() {
                        alert("error");
                    }
                });
            }

            function busqueda(valor){
              $("#busqueda").empty();
              switch(valor){
                case '1':
                var input = "<input type='text' placeholder='Ingrese nombre' id='bnombre'> <input type='text' id='bapellido' placeholder='Ingrese apellido'>"
                input +="<button type='button' onclick='buscar(1)'>Buscar</button>";
                $("#busqueda").append(input);
                ;break;
                case '2':
                var input = "<input type='text' id='bdocumento' placeholder='ingrese documento'>";
                input +="<button type='button' onclick='buscar(2)'>Buscar</button>";
                $("#busqueda").append(input);
                ;break;
              }
            }

            function buscar(valor){
              switch(valor){
                case 1:
                var url = "<?php echo constant('URL') ?>registromascotas/getDatosduenio";
                var parametrosajax = {
                    nombre: $("#bnombre").val(),
                    apellido: $("#bapellido").val(),
                    funcion: valor
                }
                $.ajax({
                    url: url,
                    type:"post",
                    data: parametrosajax,
                    success: function(data) {
                        //console.log(data);
                    },
                    error: function() {
                        alert("error");
                    }
                });
                ;break;

                case 2:
                console.log($("#bdocumento").val())
                var url = "<?php echo constant('URL') ?>registromascotas/getDatosduenio";
                var parametrosajax = {
                  documento: $("#bdocumento").val(),
                  funcion: valor
                }
                $.ajax({
                    url: url,
                    type:"post",
                    data: parametrosajax,
                    success: function(response) {
                      $("#resBusqueda").empty();
                      response = JSON.parse(response);
                      var tabla = '<table width="100%" style="margin:5px" class="tablaBusqueda table table-striped"><tr><th></th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th></tr>';
                        
                      $.each(response.data.users,function(key, value){
                        //console.log(value);
                        tabla += "<tr>";
                        var funcion = "enviar('"+value[0]+"','"+value[1]+"','"+value[2]+"','"+value[3]+"','"+value[4]+"')"
                        tabla += '<td><button onclick="'+funcion+'"></button></td>';
                        tabla += "<td>"+value[1]+"</td>";
                        tabla += "<td>"+value[2]+"</td>";
                        tabla += "<td>"+value[3]+"</td>";
                      })
                        tabla += '</table>';
                        $("#resBusqueda").append(tabla);
                    },
                    error: function() {
                        alert("error");
                    }
                });
                ;break;

              }


            }
            function enviar(id,nombre,apellidoP, apellidoM, documento){
              $("#rutDueno").val(documento);
              $("#nomusu").val(nombre);
              $("#apepat").val(apellidoP);
              $("#apemat").val(apellidoM);
              $("#id_usr").val(id);
              $("#registrar").slideDown();;

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
      </script>

<div style="padding: 0;padding-right: 21px;">
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  <h1>Registro de Mascotas</h1>
  <div class="container">
    <div class="row" >
      <div class="col-md-6"><h5>Busqueda Usuario</h5></div>
      <div class="col-md-3"></div>
    </div>
    <div class="row" style="margin-bottom:10px">
      <div class="col-md-2">Buscar por:</div>
      <div class="col-md-3" align="left">
        <select name="busqueda form-control" onchange="busqueda(this.value)">
          <option value=""> Seleccione una opción</option>
          <option value="1">Nombre y apellido peterno</option>
          <option value="2">Documento</option>
        </select>
      </div>
      <div class="col-md-7" id="busqueda">
      
      </div>
    </div>
    <!--<div class="row">
      <div class="col-md-12" id="busqueda">
        
      </div>
    </div>-->
    <div class="row">
      <div class="col-md-12" id="resBusqueda" style="height:200px; overflow: auto; border: 1px solid black; padding-left:0;">
      <table width="100%" style="margin:5px" class="tablaBusqueda table table-striped"><tr><th style="width:47px"></th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th></tr></table>

    </div>
    </div>
  </div>
    <div id="registrar" class="row" style="display:none">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="<?php echo constant('URL')?>registromascotas/registraMascota">
                <input type="hidden" id="baseimg" name="baseimg">
                <input type="hidden" id="id_usr" name="id_usr">
                <div class="container">
                <div class="row">
                    <div class="col-md-12"><h3>Datos del dueño<h3></div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group"><label for="nomusu">Nombre</label><br>
                      <input type="text" name="nomusu" id="nomusu" class="form-control" readonly>
                    </div>
                    <div class="col-md-6 form-group"><label for="apepat">Apellido Paterno</label><br>
                    <input type="text" name="apepat" id="apepat" class="form-control" readonly></div>
                    
                  </div>
                  <div class="row">
                    <div class="col-md-6  form-group"><label for="apemat">Apellido Materno</label><br><input type="text" name="apemat" id="apemat" class="form-control" readonly></div>
                    <div class="col-md-6  form-group"><label for="rutDueno">Documento</label><br><input type="text" id="rutDueno" name="rutDueno" required oninput="checkRut(this)" placeholder="Ingrese RUT Dueño" class="form-control" readonly pattern="\d{3,8}-[\d|kK]{1}">
                            </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group"><h3>Datos de la mascota<h3></div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group"><label for="chipID">Chip Identificador</label><br><input id="chipId" name="chipId" type="text" placeholder="Chip identificador" class="form-control">
                            </div>
                    <div class="col-md-6 form-group"><label for="nombreM">Nombre de mascota</label><br><input id="nombreM" name="nombreM" type="text" placeholder="Ingrese Nombre" class="form-control"></div>
                  </div>
                  <div class="row">
                    <div class="col-md-6  form-group"><label for="mascota">Tipo de Mascota</label><br>
                                <select class="form-control" name="mascota" id="mascota" onchange="getRaza()">
                                <option value="">Seleccione un tipo de mascota</option>
                                <option value="1">Perro</option>
                                <option value="2">Gato</option>
                              </select></div>
                    <div class="col-md-6 form-group"><label for="raza_id">Raza</label><br>
                    <select class="form-control" id="raza_id" name="raza_id" >
                                <option value=''>Seleccione Una Raza</option>
                            </select>
                          </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6  form-group"><label for="fechaNacM">Fecha de nacimiento</label><br><input id="fechaNacM" name="fechaNacM" type="date" placeholder="Fecha Nacimiento" class="form-control">
                            </div>
                    <div class="col-md-6  form-group" align="center">Agregar Imagen<br><label for="file-input" title="Presione para Agregar imagen"><img id="muestra" src="<?php echo constant('URL') ?>public/img/Add Image_96px.png"></label><br><input name="file-input" style="display:none" accept="image/x-png,image/gif,image/jpeg" id="file-input" type="file" class="form-control"/></div>
                  </div>
                  <div class="row">
                    <div class="col-md-6  form-group"><label for="sexoM">Sexo</label><br>
                    <select class="form-control" name="sexoM">
                                <option value="2">Hembra</option>
                                <option value="1">Macho</option>
                              </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group"><label for="observacionM">Observaciones</label><br>
                    <textarea class="form-control" id="observacionM" name="observacionM" placeholder="Ingrese Observaciones" rows="7"></textarea>
                            
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
                        <button type="submit" class="btn btn-verde" name="aceptar" style="margin-right:20px" >Ingresar Mascota</button>
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
