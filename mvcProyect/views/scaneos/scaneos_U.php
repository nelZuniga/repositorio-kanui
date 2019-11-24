
<?php require 'views/sidemenu.php'?>
<style>

.tablaBusqueda tr th{
  color:white;
  background-color: #059485;
}
</style>
   <script>
        $(document).ready(function() {
          enviar(<?php echo $_SESSION['id_usr']?>)
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

            function busqueda(valor){
              $("#busqueda").empty();
              switch(valor){
                case '1':
                var input = "<input type='text' placeholder='Ingrese nombre' id='bnombre'> <input type='text' id='bapellido' placeholder='Ingrese apellido'>"
                input +="<button type='button' onclick='buscar(1)'>Buscar</button>";
                $("#busqueda").append(input);
                ;break;
                case '2':
                var input = "<input type='text' id='bdocumento' placeholder='Ingrese documento'>";
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
                      console.log(response);
                     $("#resBusqueda").empty();
                      response = JSON.parse(response);
                      var tabla = '<table width="100%" style="margin:5px" class="tablaBusqueda table table-striped"><tr><th></th><th>Nombre</th><th>Apellido paterno</th><th>Apellido materno</th></tr>';
                        
                      $.each(response.data.users,function(key, value){
                        //console.log(value);
                        tabla += "<tr>";
                        var funcion = "enviar('"+value[0]+"','"+value[1]+"','"+value[2]+"','"+value[3]+"','"+value[4]+"')"
                        tabla += '<td><img src="views/imagenes/iconos/check.jpg" width="24" onclick="'+funcion+'"></></td>';
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
                      var tabla = '<table width="100%" style="margin:5px" class="tablaBusqueda table table-striped"><tr><th></th><th>Nombre</th><th>Apellido paterno</th><th>Apellido materno</th></tr>';
                        
                      $.each(response.data.users,function(key, value){
                        //console.log(value);
                        tabla += "<tr>";
                        var funcion = "enviar('"+value[0]+"','"+value[1]+"','"+value[2]+"','"+value[3]+"','"+value[4]+"')"
                        tabla += '<td><img src="views/imagenes/iconos/check.jpg" width="24" onclick="'+funcion+'"></></td>';
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


            function enviar(id){
              var url = "<?php echo constant('URL') ?>scaneos/getmascota";
              var parametrosajax = {
                  id: id
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
              html += "<table class='table table-striped' width='100%' style='margin:5px'><tr><th>Acción</th><th>Nombre mascota</th><th>Tipo</th><th>Raza</th><th>Sexo</th></tr>";
              $.each(respuesta.data.mascotas , function(key, value){
                j++;
                html += "<tr>";
                html += "<td>";
                html += "<p class='card-text'><a href='<?php echo constant('URL') ?>scaneos/historial/"+value[0]+"'>Historial</a></p>";
                html += "</div></a>";
                html += "</td>";
                html += "<td>"+value[1]+"</td>";
                html += "<td>"+value[2]+"</td>";
                html += "<td>"+value[3]+"</td>";
                html += "<td>"+value[4]+"</td>";
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
  <h1>Escaneos</h1>
  <hr>
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
