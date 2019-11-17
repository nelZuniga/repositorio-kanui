<?php require 'views/sidemenu.php' ?>
<script type="text/javascript">
  function comprobar() {
    var comprobado = false;
    var compass = false;
    var valorpass = $("#pass").val();
    var valorpass2 = $("#pass2").val();
    if (valorpass == valorpass2) {
      comprobado = true
    }
    if (!comprobado) {
      Swal.fire(
        'Atencion',
        'Las contraseñas no coinciden',
        'error'
      ).then(function() {
        $("#pass2").val('')
        $("#pass2").addClass('is-invalid');
      })
    } else {
      $("#pass2").removeClass('is-invalid');
      $("#pass2").addClass('is-valid');
    }
    return comprobado;
  }

  var numeros = "0123456789";

  function tiene_numeros(texto) {
    for (i = 0; i < texto.length; i++) {
      if (numeros.indexOf(texto.charAt(i), 0) != -1) {
        return 1;
      }
    }
    return 0;
  }

  var letras = "abcdefghyjklmnñopqrstuvwxyz";

  function tiene_letras(texto) {
    texto = texto.toLowerCase();
    for (i = 0; i < texto.length; i++) {
      if (letras.indexOf(texto.charAt(i), 0) != -1) {
        return 1;
      }
    }
    return 0;
  }

  function tiene_minusculas(texto) {
    for (i = 0; i < texto.length; i++) {
      if (letras.indexOf(texto.charAt(i), 0) != -1) {
        return 1;
      }
    }
    return 0;
  }

  var letras_mayusculas = "ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";

  function tiene_mayusculas(texto) {
    for (i = 0; i < texto.length; i++) {
      if (letras_mayusculas.indexOf(texto.charAt(i), 0) != -1) {
        return 1;
      }
    }
    return 0;
  }



  function seguridad_clave(caja) {
    var clave = caja.value;
    var seguridad = 0;
    if (clave.length != 0) {
      if (tiene_numeros(clave) && tiene_letras(clave)) {
        seguridad += 30;
      }
      if (tiene_minusculas(clave) && tiene_mayusculas(clave)) {
        seguridad += 30;
      }
      if (clave.length >= 4 && clave.length <= 5) {
        seguridad += 10;
      } else {
        if (clave.length >= 6 && clave.length <= 8) {
          seguridad += 20;
        } else {
          if (clave.length > 8) {
            seguridad += 30;
          }
        }
      }
    }
    if (seguridad <= 10) {
      $("#seguridad").empty();
      $("#seguridad").append("muy leve");
      $("#pass2").attr("readonly", true)
    } else if (seguridad <= 30) {
      $("#seguridad").empty();
      $("#seguridad").append("leve");
      $("#pass2").attr("readonly", true)
    } else if (seguridad <= 39) {
      $("#seguridad").empty();
      $("#seguridad").append("moderada");
      $("#pass2").attr("readonly", false)
    } else if (seguridad <= 59) {
      $("#seguridad").empty();
      $("#seguridad").append("Buena");
      $("#pass2").attr("readonly", false)
    } else if (seguridad >= 60) {
      $("#seguridad").empty();
      $("#seguridad").append("Muy Buena");
      $("#pass2").attr("readonly", false)
    }
    return seguridad
  }

  /*funcion para cargar todos los datos del usuario */
  getRegiones();

  function getUser(id) {
    var url = "<?php echo constant('URL') ?>registroUsuario/getDetalleUsuario";
    var parametrosajax = {
      id: id
    }
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


  function cargaUser(json) {
    var respuesta = JSON.parse(json);
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
    setTimeout(function() {
      $("#comuna_id").val(respuesta[0].comuna);
    }, 1000);
    $("#id_usr").val(respuesta[0].id_usr);
    $("#mascotas").show("slow");

  }




  //-----------------------------------------
  // Inicio de función que carga regiones 
  function getRegiones() {
    var url = "<?php echo constant('URL') ?>usuario/getRegion";
    $.ajax({
      url: url,
      success: function(data) {
        //console.log(data);
        $("#region_id").empty();
        $("#region_id").append("<option value=''>Seleccione Una Region</option>");
        $("#region_id").append(data);

      },
      error: function() {
        alert("error");
      }
    });
  }
  // Fin de función que carga regiones 
  //-----------------------------------------
  // Llamado para cargar regiones.

  function getComuna(valor) {
    var url = "<?php echo constant('URL') ?>usuario/getcomuna";
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
        $("#comuna_id").append("<option value=''>Seleccione Una Comuna</option>");
        $("#comuna_id").append(data);
      },
      error: function() {
        alert("error");
      }
    });
  }

  function checkCorreo(caja) {
    if (caja.value.length == 0 || caja.value == '') {

    } else {
      var url = "<?php echo constant('URL') ?>registroUsuario/checkCorreo";
      var mail = caja.value;
      var parametrosajax = {
        mail: mail
      }
      $.ajax({
        url: url,
        data: parametrosajax,
        type: 'post',
        success: function(data) {
          if (data != 0) {
            Swal.fire(
              'Atencion',
              'El correo ya se encuentra registrado el en sistema',
              'error'
            ).then(function() {
              $("#correo").focus();
              $("#correo").val('');
              $("#correo").removeClass('is-valid');
              $("#correo").addClass('is-invalid');
            })


          } else {
            $("#correo").removeClass('is-invalid');
            $("#correo").addClass('is-valid');
          }
        },
        error: function() {
          alert("error");
        }
      });
    }
  }


  function comprobar() {
    var comprobado = false;
    var compass = false;
    var valorpass = $("#pass").val();
    var valorpass2 = $("#pass2").val();
    if (valorpass == valorpass2) {
      comprobado = true
    }
    if (!comprobado) {
      Swal.fire(
        'Atencion',
        'Las contraseñas no coinciden',
        'error'
      ).then(function() {
        $("#pass2").val('')
        $("#pass2").addClass('is-invalid');
      })
    } else {
      $("#pass2").removeClass('is-invalid');
      $("#pass2").addClass('is-valid');
    }
    return comprobado;
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




  $(document).ready(function() {
    $("#file-input").change(function() {
      readURL(this);
    });
  });



  getUser(<?php echo $_SESSION['id_usr'] ?>);

  // Fin de llamado para cargar regiones.
</script>

<style>
  #muestra {
    height: auto;
    max-width: 150px;
  }

  #muestra:hover {
    filter: contrast(250%);
  }
</style>

<div style="padding: 0;padding-right: 21px;">
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  <h1>Edicion de Usuarios</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h5>Datos de usuario.</h5>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

  <div class="container-fluid mascotas" id="mascotas" style="margin-top:20px">
    <div class="col-md-12">
      <form method="POST" onsubmit="comprobar()" name="nuevousuario" id="nuevousuario" action="<?php echo constant('URL') ?>registroUsuario/actualizaUsuario">
        <input type="hidden" name="tusr" value="2">
        <input type="hidden" id="baseimg" name="baseimg">
        <input type="hidden" name="id_usr" id="id_usr">
        <input type="hidden" name="tipo_usr" id="tipo_usr" value="<?php echo $_SESSION['tipo_usr'] ?>">

        <div class="row">
          <div class="col-md-9">
            <div class="container">
              <div class="row">
                <div class="col-md-6"><label for="nombres_id" class="control-label" style="margin-top: 13px;">Nombres</label><br>
                <input type="text" class="form-control letras" id="txtnombre" name="Dnombres" placeholder="Ingese su nombre" required value="<?php echo $_SESSION['nombres'] ?>">
                </div>
                <div class="col-md-6"><label for="ApellidoP_id" style="margin-top: 13px;" class="control-label">Apellido Paterno</label><br>
                <input type="text" class="form-control" id="txtapellidoP" name="DapellidoP" placeholder="Ingese su apellido paterno" required value="<?php echo $_SESSION['apellido_paterno'] ?>">
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                <label for="apellidoM_id" class="control-label" style="margin-top: 13px;">Apellido Materno</label><br>
                <input type="text" class="form-control" id="txtapellidoM" name="DapellidoM" placeholder="Ingese su apellido materno" required value="<?php echo $_SESSION['apellido_materno'] ?>">
                </div>
                <div class="col-md-6">
                  <label for="txtrut" class="control-label" style="margin-top: 13px;">Rut</label><br>
                  <input type="text" class="form-control rut" id="txtrut" name="Drut" placeholder="Ingrese Rut Ej. 11222333k" pattern="\d{3,8}-[\d|kK]{1}" required value="<?php echo $_SESSION['documento'] ?>">
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3  form-group" align="center">Agregar Imagen<br>
            <label for="file-input" title="Presione para Agregar imagen">
              <?php
              if ($_SESSION['perfil'] !== '') {
                echo '<img id="muestra" src="' . $_SESSION['perfil'] . '">';
              } else {
                echo '<img id="muestra" src="' . constant('URL') . 'public/img/Add Image_96px.png">';
              }

              ?>

            </label>
            <input name="file-input" style="display:none" accept="image/x-png,image/gif,image/jpeg" id="file-input" type="file" class="form-control" />
          </div>
        </div>
        <div class="form-group col-md-8">
          <!-- rut -->
          <div class="row col-md-8">
            <label for="correo" class="control-label" id="correo" name="correo">Correo electrónico</label>
          </div>
          <div class="row col-md-8">
            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingese su E-mail" onblur="checkCorreo(this)" required value="<?php echo $_SESSION['correo'] ?>">
          </div>
          <BR>
          <!-- Correo -->
          <!-- telefono -->
          <div class="row col-md-6">
            <label for="telefono" class="control-label">Teléfono</label>
          </div>
          <div class="row col-md-6">
            <input type="text" class="form-control numeros" id="txttelefono" name="Dtelefono" placeholder="988888888" required value="<?php echo $_SESSION['cel'] ?>">
            <label for="espaciados" class="control-label col-md-1"></label>
          </div>
          <BR>
          <!-- direccion-->
          <!-- cuidad-->
          <div class="row col-md-12">
            <label for="street2_id" class="control-label">Direccion</label>
            <label for="espaciados" class="control-label col-md-1"></label>
          </div>
          <div class="row col-md-12">
            <input type="text" class="form-control col-md-8" id="Ddireccion" name="Ddireccion" placeholder="Ingrse su direccion" required value="<?php echo $_SESSION['direccion'] ?>">
            <label for="espaciados" class="control-label col-md-1"></label>
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
            <select class="form-control col-md-5" id="region_id" name="region_id" value="<?php echo $_SESSION['id_com']  ?>" onchange='getComuna(this.value)' required>
            </select>
            <label for="espaciados" class="control-label col-md-1"></label>
            <select class="form-control col-md-5" id="comuna_id" name="comuna_id" required>

            </select>

          </div>
          <BR>


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

          <!-- contraseña-->
          <!-- repetir contraseña-->

          <HR />
          <BR>

          <!--<div class="container">
    <div class="row">
      <div class="col-md-6">
        <h5>Actualización de contraseña.</h5>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>        
        <div class="row col-md-12">
            <label for="pass2" class="control-label col-md-5">Contraseña</label>
            <label for="espaciados" class="control-label col-md-1"></label>
            <label for="pass2" class="control-label col-md-5">Repita su Contraseña</label>
        </div>
        <div class="row col-md-12">
            <input type="password" class="form-control col-md-5" id="pass" name="pass" placeholder="Cree su contraseña" onkeyup="seguridad_clave(this)" required>
            <label for="espaciados" class="control-label col-md-1"></label>
            <input type="password" class="form-control col-md-5" id="pass2" name="pass2" placeholder="Repita contraseña" onblur=comprobar() readonly required>
        </div>
        <BR>
        <div class="row col-md-12">
            <h4>
                Nivel de seguridad de contraseña: <span id="seguridad"></span>
            </h4>
        </div>
    

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
  </div>--->

        </div>
    </div>
    <!-- ModalRecupera -->
    <?php require 'views/footer.php' ?>

    </body>

    </html>