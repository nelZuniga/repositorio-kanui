<?php require 'views/sidemenu.php' ?>
<style>
  .tablaBusqueda tr th {
    color: white;
    background-color: #059485;
  }
  #mascotas{
    display:none
  }
</style>
<script>
  $(document).ready(function() {

  }); //fin document ready

  function busqueda(valor) {
    $("#busqueda").empty();
    switch (valor) {
      case '1':
        var input = "<input type='text' placeholder='Ingrese nombre' id='bnombre'> <input type='text' id='bapellido' placeholder='Ingrese apellido'>"
        input += "<button type='button' onclick='buscar(1)'>Buscar</button>";
        $("#busqueda").append(input);;
        break;
      case '2':
        var input = "<input type='text' id='bdocumento' placeholder='Ingrese documento'>";
        input += "<button type='button' onclick='buscar(2)'>Buscar</button>";
        $("#busqueda").append(input);;
        break;
    }
  }

  function buscar(valor) {
    switch (valor) {
      case 1:
        console.log($("#bnombre").val())
        console.log($("#bapellido").val())
        var url = "<?php echo constant('URL') ?>registromascotas/getDatosduenio";
        var parametrosajax = {
          nombre: $("#bnombre").val(),
          apellido: $("#bapellido").val(),
          funcion: valor
        }
        $.ajax({
          url: url,
          type: "post",
          data: parametrosajax,
          success: function(response) {
            //console.log(response);
            $("#resBusqueda").empty();
            response = JSON.parse(response);
            var tabla = '<table width="100%" style="margin:5px" class="tablaBusqueda table table-striped"><tr><th></th><th>Nombre</th><th>Apellido paterno</th><th>Apellido materno</th></tr>';

            $.each(response.data.users, function(key, value) {
              //console.log(value);
              tabla += "<tr>";
              var funcion = "enviar('" + value[0] + "','" + value[1] + "','" + value[2] + "','" + value[3] + "','" + value[4] + "')"
              tabla += '<td><img src="views/imagenes/iconos/check.jpg" width="24"  onclick="' + funcion + '"></></td>';
              tabla += "<td>" + value[1] + "</td>";
              tabla += "<td>" + value[2] + "</td>";
              tabla += "<td>" + value[3] + "</td>";
            })
            tabla += '</table>';
            $("#resBusqueda").append(tabla);
          },
          error: function() {
            alert("error");
          }
        });;
        break;

      case 2:
        console.log($("#bdocumento").val())
        var url = "<?php echo constant('URL') ?>registromascotas/getDatosduenio";
        var parametrosajax = {
          documento: $("#bdocumento").val(),
          funcion: valor
        }
        $.ajax({
          url: url,
          type: "post",
          data: parametrosajax,
          success: function(response) {
            $("#resBusqueda").empty();
            response = JSON.parse(response);
            var tabla = '<table width="100%" style="margin:5px" class="tablaBusqueda table table-striped"><tr><th></th><th>Nombre</th><th>Apellido paterno</th><th>Apellido materno</th></tr>';

            $.each(response.data.users, function(key, value) {
              //console.log(value);
              tabla += "<tr>";
              var funcion = "enviar('" + value[0] + "','" + value[1] + "','" + value[2] + "','" + value[3] + "','" + value[4] + "')"
              tabla += '<td><img src="views/imagenes/iconos/check.jpg" width="24"  onclick="' + funcion + '"></></td>';
              tabla += "<td>" + value[1] + "</td>";
              tabla += "<td>" + value[2] + "</td>";
              tabla += "<td>" + value[3] + "</td>";
            })
            tabla += '</table>';
            $("#resBusqueda").append(tabla);
          },
          error: function() {
            alert("error");
          }
        });;
        break;

    }


  }


  function enviar(id, nombre, apellidoP, apellidoM, documento) {
    var url = "<?php echo constant('URL') ?>registroUsuario/getDetalleUsuario";
    var parametrosajax = {
      id: id
    }
    console.log(parametrosajax);
    $.ajax({
      url: url,
      type: "post",
      data: parametrosajax,
      success: function(response) {
          cargaUser(response);
      },
      error() {
        console.log("error")
      }
    });
  }

  function multiple(valor, multiple) {
    resto = valor % multiple;
    if (resto == 0)
      return true;
    else
      return false;
  }
  function cargaUser(json) {
    var respuesta = JSON.parse(json);
    console.log(json);
    $("#txtnombre").val(respuesta[0].nombres);
    $("#txtapellidoP").val(respuesta[0].apellido_paterno);
    $("#txtapellidoM").val(respuesta[0].apellido_materno);
    $("#txtrut").val(respuesta[0].documento);
    $("#rol_id").val(respuesta[0].tipo_usr);
    $("#correo").val(respuesta[0].correo);
    $("#txttelefono").val(respuesta[0].cel);
    $("#Ddireccion").val(respuesta[0].direccion);
    //$("#txtciudad").val(respuesta[0].);
    $("#region_id").val(respuesta[0].id_reg_region);
    getComuna(respuesta[0].id_reg_region)
    setTimeout(function(){
      $("#comuna_id").val(respuesta[0].comuna);
    },1000);
    $("#id_usr").val(respuesta[0].id_usr);
    $("#mascotas").show("slow");
    
  }

  function getRol() {
            var url = "<?php echo constant('URL') ?>registroUsuario/getRol";
            $.ajax({
                url: url,
                success: function(data) {
                    console.log(data);
                    $("#rol_id").empty();
                    $("#rol_id").append("<option value=''>Seleccione un Rol de usuario</option>");
                    $("#rol_id").append(data);
                },
                error: function() {
                    alert("error");
                }
            });
        }

        function getRegiones() {
                var url = "<?php echo constant('URL') ?>registroUsuario/getRegion";
                $.ajax({
                    url: url,
                    success: function(data) {
                        //console.log(data);
                        $("#region_id").empty();
                        $("#region_id").append("<option value=''>Seleccione una región</option>");
                        $("#region_id").append(data);
                    },
                    error: function() {
                        alert("error");
                    }
                });
            }

            function getComuna(valor) {
            //console.log("asdadsd");
            var url = "<?php echo constant('URL') ?>registroUsuario/getComuna";
            //var reg = $("#region_id").val();
            var parametrosajax = {
                region: valor
            }
            $.ajax({
                url: url,
                data: parametrosajax,
                type: 'post',
                success: function(data) {
                    //$("#comuna_id").append(data);
                    $("#comuna_id").empty();
                    $("#comuna_id").append("<option value=''>Seleccione una comuna</option>");
                    $("#comuna_id").append(data);
                },
                error: function() {
                    alert("error");
                }
            });
        }
            getRegiones();
            getRol();
</script>



<div style="padding: 0;padding-right: 21px;">
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  <h1>Edición de usuarios.</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h5>Búsqueda de usuario</h5>
      </div>
      <div class="col-md-3"></div>
    </div>
    <div class="row" style="margin-bottom:10px">
      <div class="col-md-2">Buscar por:</div>
      <div class="col-md-3" align="left">
        <select name="busqueda form-control" onchange="busqueda(this.value)">
          <option value=""> Seleccione una opción</option>
          <option value="1">Nombre y apellido paterno</option>
          <option value="2">Documento</option>
        </select>
      </div>
      <div class="col-md-7" id="busqueda">

      </div>
    </div>
    <div class="row">
      <div class="col-md-12" id="resBusqueda" style="height:200px; overflow: auto; border: 1px solid black; padding-left:0;">
        <table width="100%" style="margin:5px" class="tablaBusqueda table table-striped">
          <tr>
            <th style="width:47px"></th>
            <th>Nombre</th>
            <th>Apellido paterno</th>
            <th>Apellido materno</th>
          </tr>
        </table>

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

  <div class="container-fluid mascotas" id="mascotas" style="margin-top:20px">
    <div class="col-md-12">
      <form method="POST" onsubmit="comprobar()" name="nuevousuario" id="nuevousuario" action="<?php echo constant('URL') ?>registroUsuario/actualizaUsuario">
        <input type="hidden" name="tusr" value="2">
        <input type="hidden" name="id_usr" id="id_usr">
        <div class="form-group col-md-12">
          <!-- nombres -->
          <!-- apellido paterno -->
          <!-- apellido materno -->
          <div class="row col-md-12">
            <label for="nombres_id" class="control-label col-md-3">Nombres</label>
            <label for="espaciados" class="control-label col-md-1"></label>
            <label for="ApellidoP_id" class="control-label col-md-3">Apellido paterno</label>
            <label for="espaciados" class="control-label col-md-1"></label>
            <label for="apellidoM_id" class="control-label col-md-3">Apellido materno</label>
          </div>
          <div class="row col-md-12">
            <input type="text" class="form-control letras col-md-3" id="txtnombre" name="Dnombres" placeholder="Ingese su nombre" required>
            <label for="espaciados" class="control-label col-md-1"></label>
            <input type="text" class="form-control col-md-3" id="txtapellidoP" name="DapellidoP" placeholder="Ingese su apellido paterno" required>
            <label for="espaciados" class="control-label col-md-1"></label>
            <input type="text" class="form-control col-md-3" id="txtapellidoM" name="DapellidoM" placeholder="Ingese su apellido materno" required>
          </div>
          <BR>
          <!-- rut -->
          <div class="row col-md-12">
            <label for="txtrut" class="control-label col-md-4">Rut</label>
            <label for="espaciados" class="control-label col-md-1"></label>
            <label for="rol" class="control-label col-md-5" id="rol" name="rol">Rol de usuario</label>
          </div>
          <div class="row col-md-12">
            <input type="text" class="form-control col-md-4 rut" id="txtrut" name="Drut" placeholder="Ingrese Rut ej. 11222333k" pattern="\d{3,8}-[\d|kK]{1}" required>
            <label for="espaciados" class="control-label col-md-1"></label>
            <select class="form-control col-md-4" id="rol_id" name="rol_id" required>
              <option value=''>Seleccione un rol de usuario</option>
            </select>
          </div>
          <BR>
          <!-- Correo -->
          <!-- telefono -->
          <div class="row col-md-12">
            <label for="correo" class="control-label col-md-4">Correo</label>
            <label for="espaciados" class="control-label col-md-1"></label>
            <label for="telefono_id" class="control-label col-md-4">Teléfono</label>
          </div>
          <div class="row col-md-12">
            <input type="email" class="form-control col-md-4" id="correo" name="correo" placeholder="Ingese su E-mail" onblur="checkCorreo(this)" required>
            <label for="espaciados" class="control-label col-md-1"></label>
            <input type="text" class="form-control numeros col-md-4" id="txttelefono" name="Dtelefono" placeholder="988888888" required>
          </div>
          <BR>
          <!-- direccion-->
          <!-- cuidad-->
          <div class="row col-md-12">
            <label for="street2_id" class="control-label col-md-5">Dirección</label>
            <label for="espaciados" class="control-label col-md-1"></label>
            <label for="ciudad_id" class="control-label col-md-5">Ciudad</label>
          </div>
          <div class="row col-md-12">
            <input type="text" class="form-control col-md-5" id="Ddireccion" name="Ddireccion" placeholder="Ingrse su dirección" required>
            <label for="espaciados" class="control-label col-md-1"></label>
            <input type="text" class="form-control col-md-5" id="txtciudad" name="Vciudad" placeholder="Ingrese su ciudad" required>
          </div>
          <BR>
          <!-- combo region -->
          <!-- combo comuna -->
          <div class="row col-md-12">
            <label for="region_id" class="control-label col-md-5" id="region" name="region">Región</label>
            <label for="espaciados" class="control-label col-md-1"></label>
            <label for="comuna_id" class="control-label col-md-5" id="Comuna" name="comuna">Comuna</label>
          </div>
          <div class="row col-md-12">
            <select class="form-control col-md-5" id="region_id" name="region_id" onchange='getComuna(this.value)' required>
            </select>
            <label for="espaciados" class="control-label col-md-1"></label>
            <select class="form-control col-md-5" id="comuna_id" name="comuna_id" required>
              <option value=''>Seleccione una comuna</option>
            </select>
          </div>
          <BR>


        </div>
        <center>
          <table>
            <tr>
              <th>
                <div class="col-md-12" align="center">
                  <button class="btn btn-verde" id="aceptar" name="aceptar">Aceptar</button>

                </div>
              </th>
              <th>
              </th>
              <th>
                <div class="col-md-12" align="center">
                  <button class="btn btn-verde">Cancelar</button>
                </div>
              </th>
            </tr>
          </table>
        </center>
    </div>
    </form>
  </div>

</div>
</div>
<!-- ModalRecupera -->
<?php require 'views/footer.php' ?>

</body>

</html>