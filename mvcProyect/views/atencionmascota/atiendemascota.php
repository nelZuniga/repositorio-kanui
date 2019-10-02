<?php require 'views/sidemenu.php' ?>
<style>
  .tablaBusqueda tr th {
    color: white;
    background-color: #059485;
  }
</style>
<script>
  $(document).ready(function() {
    <?php if ($this->mascota['sexo']  !== '') { ?>
      $("#sexoM").val('<?php echo $this->mascota['sexo'] ?>');
    <?php } ?>

    <?php if ($this->mascota['tipo_mascota'] !== '') { ?>
      getRaza('<?php echo $this->mascota['tipo_mascota'] ?>');
    <?php } else { ?>
      getRaza(0);
    <?php } ?>
  }); //fin document ready

  function getRaza(tipos) {
    console.log(tipos);
    var url = "<?php echo constant('URL') ?>registromascotas/getRaza";
    if (tipos != 0 || tipos != '') {
      $("#mascota").val(tipos);
      var parametrosajax = {
        tipo: tipos
      }
    } else {
      var parametrosajax = {
        tipo: $("#mascota").val()
      }
    }

    $.ajax({
      url: url,
      type: "post",
      data: parametrosajax,
      success: function(data) {
        //console.log(data);
        $("#raza_id").empty();
        $("#raza_id").append("<option value=''>Seleccione Una Raza</option>");
        $("#raza_id").append(data);
        if (tipos != 0 || tipos != '') {
          $("#raza_id").val('<?php echo $this->mascota['raza'] ?>');

        }
      },
      error: function() {
        alert("error");
      }
    });
  }



  function busqueda(valor) {
    $("#busqueda").empty();
    switch (valor) {
      case '1':
        var input = "<input type='text' placeholder='Ingrese nombre' id='bnombre'> <input type='text' id='bapellido' placeholder='Ingrese apellido'>"
        input += "<button type='button' onclick='buscar(1)'>Buscar</button>";
        $("#busqueda").append(input);;
        break;
      case '2':
        var input = "<input type='text' id='bdocumento' placeholder='ingrese documento'>";
        input += "<button type='button' onclick='buscar(2)'>Buscar</button>";
        $("#busqueda").append(input);;
        break;
    }
  }

  function buscar(valor) {
    switch (valor) {
      case 1:
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
          success: function(data) {
            //console.log(data);
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
            var tabla = '<table width="100%" style="margin:5px" class="tablaBusqueda table table-striped"><tr><th></th><th>Nombre</th><th>Apellido Paterno</th><th>Apellido Materno</th></tr>';

            $.each(response.data.users, function(key, value) {
              //console.log(value);
              tabla += "<tr>";
              var funcion = "enviar('" + value[0] + "','" + value[1] + "','" + value[2] + "','" + value[3] + "','" + value[4] + "')"
              tabla += '<td><button onclick="' + funcion + '"></button></td>';
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
    var url = "<?php echo constant('URL') ?>edicionmascota/getmascota";
    var parametrosajax = {
      id: documento
    }
    $.ajax({
      url: url,
      type: "post",
      data: parametrosajax,
      success: function(response) {
        cargaMascotas(response);
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

  function cargaMascotas(json) {
    var html = "";
    var respuesta = JSON.parse(json);
    console.log(respuesta);
    var j = 0;
    $.each(respuesta.data.mascotas, function(key, value) {
      j++;
      if (multiple(j, 3) || j == 1) {
        html += "<div class='row'>";

      }
      html += "<div class='col-md-4'>";
      html += "<a href='<?php echo constant('URL') ?>edicionmascota/editarmascota/" + value[0] + "'><div class='card' style='width: 18rem;'>";
      html += "<img src='" + value[5] + "' class='card-img-top' alt='...'>";
      html += "<div class='card-body'>";
      html += "<p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>";
      html += "</div>";
      html += "</div></a>";
      html += "</div>";
      if (j == 3) {
        html += "</div>";
        j = 0;
      }
    });
    $("#mascotas").append(html);
  }
</script>

<div style="padding: 0;padding-right: 21px;">
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  <h1>Edicion de Mascotas</h1>
  
  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>edicionmascota/editaMascota">
          <input type="hidden" id="baseimg" name="baseimg" value="<?php echo  $this->mascota['imgMascota'] ?>">
          <input type="hidden" id="idmascot" name="idmascot" value="<?php echo  $this->mascota['id_mascot'] ?>">
          <div class="container">

            <div class="row">
              <div class="col-md-6 form-group">
                <h3 style="bottom: 0;position: absolute;">Datos de la mascota<h3>
              </div>
              <div class="col-md-6 form-group" align="center">
              <?php if ($this->mascota['imgMascota'] == '') { ?>
                <div class="col-md-6  form-group" align="center">Agregar Imagen<br><label for="file-input" title="Presione para Agregar imagen"><img id="muestra" src="<?php echo constant('URL') ?>public/img/Add Image_96px.png"></label><br><input name="file-input" style="display:none" accept="image/x-png,image/gif,image/jpeg" id="file-input" type="file" class="form-control" /></div>
              <?php } else { ?>
                <div class="col-md-6  form-group" align="center">Agregar Imagen<br><label for="file-input" title="Presione para Agregar imagen"><img id="muestra" style="max-width:96px;" src="<?php echo $this->mascota['imgMascota'] ?>"></label><br><input name="file-input" style="display:none" accept="image/x-png,image/gif,image/jpeg" id="file-input" type="file" class="form-control" /></div>
              <?php } ?>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group"><label for="chipID">Chip Identificador</label><br><input id="chipId" readonly name="chipId" type="text" placeholder="Chip identificador" class="form-control" value="<?php echo $this->mascota['n_chip'] ?>">
              </div>
              <div class="col-md-6 form-group"><label for="nombreM">Nombre de mascota</label><br><input id="nombreM" name="nombreM" type="text" placeholder="Ingrese Nombre" class="form-control" value="<?php echo $this->mascota['nombre'] ?>"></div>
            </div>
            <div class="row">
              <div class="col-md-6  form-group"><label for="mascota">Tipo de Mascota</label><br>
                <select class="form-control" name="mascota" id="mascota" onchange="getRaza(0)">
                  <option value="x">Seleccione un tipo de mascota</option>
                  <option value="1">Perro</option>
                  <option value="2">Gato</option>
                </select></div>
              <div class="col-md-6 form-group"><label for="raza_id">Raza</label><br>
                <select class="form-control" id="raza_id" name="raza_id">
                  <option value=''>Seleccione Una Raza</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6  form-group"><label for="fechaNacM">Fecha de nacimiento</label><br><input id="fechaNacM" name="fechaNacM" type="date" placeholder="Fecha Nacimiento" class="form-control" value="<?php echo $this->mascota['fecha_nac']  ?>">
              </div>
              <div class="col-md-6  form-group"><label for="sexoM">Sexo</label><br>
                <select class="form-control" name="sexoM" id="sexoM">
                  <option value="">Seleccione sexo de mascota</option>
                  <option value="47">Hembra</option>
                  <option value="46">Macho</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-12 form-group"><label for="observacionM">Observaciones</label><br>
                <textarea class="form-control" id="observacionM" name="observacionM" placeholder="Ingrese Observaciones" rows="7"><?php echo $this->mascota['observaciones'] ?></textarea>

              </div>
            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
                <button type="submit" class="btn btn-verde" name="aceptar" style="margin-right:20px">Editar Mascota</button>
                <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#ModalCancelar">Cancelar</button>
              </div>
            </div>
          </div>


        </form>
      </div>
    </div>
  </div>


</div>
<!-- ModalRecupera -->
<?php require 'views/footer.php' ?>

</body>

</html>