

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
              var url = "<?php echo constant('URL') ?>edicionmascota/getmascota";
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

            function cargaMascotas(json){
              var html = "";
              var respuesta = JSON.parse(json);
              console.log(respuesta);
              var j = 0;
              $.each(respuesta.data.mascotas , function(key, value){
                j++;
                if(multiple(j,3) || j == 1){
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
  <h1>Edicion de Mascotas</h1>
  <?php
echo $this->mascota['id_mascot'];
?>

  <div class="container-fluid mascotas" id="mascotas">

  </div>
</div>
  <!-- ModalRecupera -->  
  <?php require 'views/footer.php'?>

</body>

</html>    
