
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
                var url = "<?php echo constant('URL') ?>listatipomascota/gettipomascota";
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
              var url = "<?php echo constant('URL') ?>listatipomascota/gettipomascota";
              var parametrosajax = {
                  id: documento
                }
                $.ajax({
                    url: url,
                    type:"post",
                    data: parametrosajax,
                    success: function(response) {
                      cargaMascotas(response);
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

            function cargatipomascota(json){
              var html = "";
              var respuesta = JSON.parse(json);
              var j = 0;
              $.each(respuesta.data.mascotas , function(key, value){
                j++;
                if(j == 1){
                  html += "<div class='row'>";
                }
                html += "<div class='col-md-4'>";
                html += "<a href='<?php echo constant('URL') ?>edicionmascota/editarmascota/"+value[0]+"'><div class='card' style='width: 18rem;'>";
                html += "<img src='"+value[5]+"' class='card-img-top' alt='...'>";
                html += "<div class='card-body'>"; 
                html += "<p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>";
                html += "</div>"; 
                html += "</div></a>";
                html += "</div>";
                if(j == 3){
                  html += "</div>";
                  j =0;
                }
              });
              $("#mascotas").append(html);
            }
      </script>

<div style="padding: 0;padding-right: 21px;">
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  <h1>Tipos de Mascotas</h1>
  <div class="container">
    <div class="row" >
      <div class="col-md-6"><h5>Busqueda Dueño</h5></div>
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
      <table width="100%" style="margin:5px" class="tablaBusqueda table table-striped"><tr><th style="width:47px"></th><th>Tipo de Mascota</th></tr></table>

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
