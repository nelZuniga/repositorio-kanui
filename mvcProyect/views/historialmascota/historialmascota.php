<?php require 'views/sidemenu.php'?>
<style>

.tablaBusqueda tr th{
  color:white;
  background-color: #059485;
}
</style>
   <script>
        $(document).ready(function() {
            
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
                    type:"post",
                    data: parametrosajax,
                    success: function(response) {
                      //console.log(response);
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
              var url = "<?php echo constant('URL') ?>atencionmascota/getmascota2";
              var parametrosajax = {
                  id: documento
                }
                $.ajax({
                    url: url,
                    type:"post",
                    data: parametrosajax,
                    success: function(response) {
                      if (response == '[]') {
                        noresult();
                      }else{
                        cargaMascotas(response);
                      }
                      
                    },
                    error(){
                      console.log("error")
                    }
                  });
            }
            function multiple(valor, multiple)
        {
            resto = valor % multiple;
            if(resto==0)
                return true;
            else
                return false;
        }

            function cargaMascotas(json){
              $("#mascotas").empty();
              var html = "";
              var respuesta = JSON.parse(json);
              var j = 0;
              html += "<table width='100%' style='margin:5px' class='table table-striped'><tr><th style='text-align:center'>Acción</th><th style='text-align:center'>Nombre Mascota</th><th style='text-align:center'>Tipo</th><th style='text-align:center'>Raza</th><th style='text-align:center'>Sexo</th></tr>";
              $.each(respuesta.data.mascotas , function(key, value){
                j++;
                html += "<tr>";
                html += "<td style='text-align:center'>";
                html += "<p class='card-text'><a title='Ver Historial' href='<?php echo constant('URL') ?>historialmascota/controlesmascota/"+value[0]+"'><img src='https://img.icons8.com/metro/26/000000/fine-print.png'></a></p>";
                html += "</div></a>";
                html += "</td>";
                html += "<td style='text-align:center'>"+value[1]+"</td>";
                html += "<td style='text-align:center'>"+value[2]+"</td>";
                html += "<td style='text-align:center'>"+value[3]+"</td>";
                html += "<td style='text-align:center'>"+value[4]+"</td>";
                html += "</tr>"; 
              });
              html+="</table>">
              $("#mascotas").append(html);
            }


            function noresult(){
              $("#mascotas").empty();
              var html = "";
              html += "<table width='100%' style='margin:5px' class='table table-striped'><tr><th style='text-align:center'>Acción</th><th style='text-align:center'>Nombre Mascota</th><th style='text-align:center'>Tipo</th><th style='text-align:center'>Raza</th><th style='text-align:center'>Sexo</th></tr>";
                html += "<tr>";
                html += "<td style='text-align:center' colspan='5'>No se han encontrado Resultados</td>";
                html += "</tr>"; 
              html+="</table>">
              $("#mascotas").append(html);
            }
      </script>

<div style="padding: 0;padding-right: 21px;">
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  <h1>Historial de Atención de Mascotas</h1>
  <div class="container">
    <div class="row" >
      <div class="col-md-6"><h5>Busqueda por Dueño</h5></div>
      <div class="col-md-3"></div>
    </div>
    <div class="row" style="margin-bottom:10px">
      <div class="col-md-2">Buscar por:</div>
      <div class="col-md-3" align="left">
        <select name="busqueda form-control" onchange="busqueda(this.value)">
          <option value=""> Seleccione una opción</option>
          <option value="1">Nombre y Apellido Paterno</option>
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
 <div id="respuesta"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                </div>
            </div>
        </div>

  <div class="container-fluid mascotas" id="mascotas">

  </div>
</div>
  <!-- ModalRecupera -->  
  <?php require 'views/footer.php'?>

</body>

</html>    
