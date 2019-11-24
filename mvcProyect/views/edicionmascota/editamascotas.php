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
      $("#sexoM").val('<?php echo $this->mascota['sexo']; ?>');
    <?php } ?>

    <?php if ($this->mascota['tipo_mascota'] !== '') { ?>
      getRaza('<?php echo $this->mascota['tipo_mascota']; ?>');
    <?php } else { ?>
      getRaza(0);
    <?php } ?>

    getColores()
  ELPatron();
      

  $("#file-input").change(function() {
          readURL(this);
          
        });


        
      var existeImg = '<?php echo $this->mascota['imgMascota'] ?>';
      if(existeImg !== ''){
        cargaImg(existeImg);
      }else{
        cargaImg("<?php echo constant('URL') ?>public/img/logo-2kanui.png");
      }

  }); 
  //fin document  ready
  function cargaImg(src) {
    $("#pre").attr('src',src);
      }

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
        $("#raza_id").append("<option value=''>Seleccione una raza</option>");
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

/******************************************/
function getColores() {
    var url = "<?php echo constant('URL') ?>edicionmascota/getcolores";
    $.ajax({
      url: url,
      type: "POST",
      success: function(data) {
        //console.log(data);
        $("#color_id").empty()
        var opciones = '<option value="">Seleccione color de la mascota</option>'
        $.each(data, function(key, value){
          opciones += "<option value='"+value[0]+"'>"+value[1]+"</option>"
        })
        $("#color_id").append(opciones)
        $("#color_id").val(<?php echo $this->mascota['color'] ?>);
        
      },
      error: function() {
        alert("error");
      }
    });
  }

  function ELPatron() {
    var url = "<?php echo constant('URL') ?>edicionmascota/getPatrones";
    $.ajax({
      url: url,
      type: "POST",
      success: function(data) {
        //console.log(data);
        $("#patron_id").empty()
        var opciones = '<option value="">Seleccione color de la mascota</option>'
        $.each(data, function(key, value){
          opciones += "<option value='"+value[0]+"'>"+value[1]+"</option>"
        })
        $("#patron_id").append(opciones)
        $("#patron_id").val(<?php echo $this->mascota['patron'] ?>);
        
      },
      error: function() {
        alert("error");
      }
    });
  }


/******************************************/


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


  function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function(e) {
              $('#muestra').attr('src', e.target.result);
              $('#recorta').attr('src', e.target.result);
            }
            reader.onloadend = function() {
              $("#baseimg").val(reader.result)
              $("#modalFoto").css("display",'flex');
              $("#pre").hide();
              $("#muestra").show();
              $('#recorta').Jcrop({
                onChange: updatePreview,
              onSelect: updatePreview,
              allowSelect: true,
              allowMove: true,
              allowResize: true,
              aspectRatio: 1,
              boxWidth: 750,   //Maximum width you want for your bigger images
              boxHeight: 600, 
              });
            }
            
            reader.readAsDataURL(input.files[0]);
          }

          $('#muestra').css("width", "150px");
        }


        function make_base() {
        var base_image = new Image();
        base_image.src = 'https://picsum.photos/id/870/700/467';
        base_image.onload = function() {
          context.drawImage(base_image, 150, 150, 150, 150);
        }
      }

      function updatePreview(c) {
        if (parseInt(c.w) > 0) {
          // Show image preview
          var imageObj = $("#recorta")[0];
          var canvas = $("#muestra")[0];
          var context = canvas.getContext("2d");

          if (imageObj != null && c.x != 0 && c.y != 0 && c.w != 0 && c.h != 0) {
            context.drawImage(imageObj, c.x, c.y, c.w, c.h, 0, 0, canvas.width, canvas.height);
                }
                  }
          }

        function ocultaModal(){
          $('#modalFoto').hide()
          var canvas = document.getElementById('muestra');
          var dataURL = canvas.toDataURL();
          $('#baseimg').val(dataURL);
        }
</script>

<div style="padding: 0;padding-right: 21px;">
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  <h1>Edición de mascotas</h1>
  
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
                        <div class="col-md-6  form-group" align="center">Agregar imagen<br>
                        <label for="file-input" title="Presione para agregar imagen">
                          <img id="pre" style="width:150px; height;150px">
                          <canvas id="muestra" width="150" height="150" style="display:none">
                        </canvas>
                      </label>
                      <br>
              <input name="file-input" style="display:none" accept="image/x-png,image/gif,image/jpeg" id="file-input" type="file" class="form-control" /></div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group"><label for="chipID">Chip identificador</label><br><input id="chipId" readonly name="chipId" type="text" placeholder="Chip identificador" class="form-control" value="<?php echo $this->mascota['n_chip'] ?>">
              </div>
              <div class="col-md-6 form-group"><label for="nombreM">Nombre de mascota</label><br><input id="nombreM" name="nombreM" type="text" placeholder="Ingrese nombre" class="form-control" value="<?php echo $this->mascota['nombre'] ?>"></div>
            </div>
            <div class="row">
              <div class="col-md-6  form-group"><label for="mascota">Tipo de mascota</label><br>
                <select class="form-control" name="mascota" id="mascota" onchange="getRaza(0)">
                  <option value="x">Seleccione un tipo de mascota</option>
                  <option value="1">Perro</option>
                  <option value="2">Gato</option>
                </select></div>
              <div class="col-md-6 form-group"><label for="raza_id">Raza</label><br>
                <select class="form-control" id="raza_id" name="raza_id">
                  <option value=''>Seleccione una raza</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6  form-group"><label for="fechaNacM">Fecha de nacimiento</label><br><input id="fechaNacM" name="fechaNacM" type="date" placeholder="Fecha Nacimiento" class="form-control" value="<?php echo $this->mascota['fecha_nac']  ?>">
              </div>
              <div class="col-md-6  form-group"><label for="sexoM">Sexo</label><br>
                <select class="form-control" name="sexoM" id="sexoM">
                  <option value="">Seleccione sexo de mascota</option>
                  <option value="2">Hembra</option>
                  <option value="1">Macho</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6  form-group">
                <label for="color_id">Color de mascota</label>
                <select class="form-control" id="color_id" name="color_id">
                  <option value=''>Seleccione color de la mascota</option>
                    
                </select>                
              </div>  
              <div class="col-md-6  form-group">
                <label for="color_id">Patrón de color</label>  
                <select class="form-control" id="patron_id" name="patron_id">
                  <option value=''>Seleccione patrón de color</option>
                </select>                
              </div>              
            </div>
            <div class="row">
              <div class="col-md-12 form-group"><label for="observacionM">Observaciones</label><br>
                <textarea class="form-control" id="observacionM" name="observacionM" placeholder="Ingrese observaciones" rows="7"><?php echo $this->mascota['observaciones'] ?></textarea>

              </div>
            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
                <button type="submit" class="btn btn-verde" name="aceptar" style="margin-right:20px">Editar mascota</button>
                <a href='<?php echo constant('URL') ?>edicionmascota' class="btn btn-verde">Cancelar</a>
              </div>
            </div>
          </div>


        </form>
      </div>
    </div>
  </div>

<style>
#modalFoto{
    opacity: 1;
    background-color: rgba(0, 0, 0, 0.6);
    display: none;
    align-items: center;
}
.modal-content{
  display: inline-table
}
</style>
  <div class="modal fade" id="modalFoto">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Imagen</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="ocultaModal();">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!---Cuerpo --->
        <img id="recorta" style="height:650px;width:auto" src="">
        <!---Cuerpo --->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-verde" onclick="ocultaModal();">aceptar</button>
      </div>
    </div>
  </div>
</div>

</div>
<!-- ModalRecupera -->
<?php require 'views/footer.php' ?>

</body>

</html>