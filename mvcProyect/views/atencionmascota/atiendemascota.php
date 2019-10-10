<?php require 'views/sidemenu.php' ?>
<style>
  .tablaBusqueda tr th {
    color: white;
    background-color: #059485;
  }
</style>
<script>
  $(document).ready(function() {
    function getVacunas() {
        var url = "<?php echo constant('URL') ?>atencionmascota/getVacunas";
        $.ajax({
            url: url,
            success: function(data) {
                //console.log(data);
                $("#id_vac").empty();
                $("#id_vac").append("<option value=''>Seleccione Una Vacuna</option>");
                $("#id_vac").append(data);
            },
            error: function() {
                alert("error");
            }
        });
    }
    function getControles() {
        var url = "<?php echo constant('URL') ?>atencionmascota/getControles";
        $.ajax({
            url: url,
            success: function(data) {
                //console.log(data);
                $("#id_control").empty();
                $("#id_control").append("<option value=''>Seleccione Tipo de Control</option>");
                $("#id_control").append(data);
            },
            error: function() {
                alert("error");
            }
        });
    }    
    getVacunas();
    getControles();
  }); //fin document ready



</script>

<div style="padding: 0;padding-right: 21px;">
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  <h1>Registro de Atención de Mascotas</h1>
  
  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>edicionmascota/editaMascota">
          <input type="hidden" id="baseimg" name="baseimg" value="<?php echo  $this->mascota['imgMascota'] ?>">
          <input type="hidden" id="idmascot" name="idmascot" value="<?php echo  $this->mascota['id_mascot'] ?>">
          <div class="container">

            <div class="row">
              <div class="col-md-6 form-group">
                <h3>Datos de la mascota y dueño<h3>
              </div>
              <div class="col-md-6 form-group" align="center">
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 form-group"><label for="chipID">Chip Identificador</label><br><input id="chipId" readonly name="chipId" type="text" placeholder="Chip identificador" class="form-control" value="<?php echo $this->mascota['n_chip'] ?>">
              </div>
              <div class="col-md-6 form-group"><label for="nombreM">Nombre de mascota</label><br><input id="nombreM" readonly name="nombreM" type="text" placeholder="Ingrese Nombre" class="form-control" value="<?php echo $this->mascota['nombre'] ?>"></div>
            </div>
            <div class="row">
              <script> console.log(tipos); </script>
              <div class="col-md-4 form-group"><label for="nombreM">Tipo de mascota</label><br><input id="nombreM" readonly name="nombreM" type="text" placeholder="Ingrese Nombre" class="form-control" value="<?php echo $this->mascota[3]  ?>"></div>
              <div class="col-md-4 form-group"><label for="nombreM">Raza de mascota</label><br><input id="nombreM" readonly name="nombreM" type="text" placeholder="Ingrese Nombre" class="form-control" value="<?php echo $this->mascota[4] ?>"></div>              
              <div class="col-md-4 form-group"><label for="nombreM">Fecha de Nacimiento</label><br><input id="nombreM" readonly name="nombreM" type="text" placeholder="Ingrese Nombre" class="form-control" value="<?php echo $this->mascota[5] ?>"></div>               
              </div>              

            <div class="row">
              <div class="col-md-4  form-group"><label for="fechaNacM">Documento Dueño</label><br><input id="fechaNacM" readonly name="fechaNacM" type="text" placeholder="Fecha Nacimiento" class="form-control" value="<?php echo $this->mascota[7]  ?>">
              </div>
              <div class="col-md-8  form-group"><label for="fechaNacM">Nombre Dueño</label><br><input id="fechaNacM" readonly name="fechaNacM" type="text" placeholder="Fecha Nacimiento" class="form-control" value="<?php echo $this->mascota[10]?> <?php echo $this->mascota[8]?> <?php echo $this->mascota[9]?>">
              </div>
              <div class="col-md-12 form-group"><label for="observacionM">Observaciones</label><br>
                <textarea readonly class="form-control" id="observacionM" name="observacionM" placeholder="Sin Observaciones" rows="2"><?php echo $this->mascota[6] ?></textarea>

              </div>              
            </div>

            </div>            
            <div class="row">
              <div class="col-md-4 form-group"><label for="nombreM">Peso Mascota</label><br><input id="peso" name="peso" type="text" placeholder="Ingrese Peso Actual" class="form-control" required="">
              </div>              
              <div class="col-md-4 form-group"><label for="id_vac">Vacuna</label><br>
                <select class="form-control" id="id_vac" name="id_vac">
                  <option value=''>Seleccione Una Vacuna</option>
                </select>
              </div>
              <div class="col-md-4 form-group"><label for="nombreM">Dosis</label><br><input id="dosis" name="dosis" type="text" placeholder="Ingrese Peso Actual" class="form-control" required="" value="1">
              </div>  
                <div class="col-md-6 form-group"><label for="nombreM">Próxima Atención</label><br>
                  <div>
                    <input id="fechaNacM" name="fechaNacM" type="date" placeholder="Fecha Nacimiento" class="form-control">
                  </div>
                </div>  
              <div class="col-md-4 form-group"><label for="id_vac">Tipo de Control</label><br>
                <select class="form-control" id="id_control" name="id_control">
                  <option value=''>Seleccione Tipo de Control</option>
                </select>
              </div>
              <div class="col-md-12 form-group"><label for="observacionM">Observaciones</label><br>
                <textarea class="form-control" id="observacionM" name="observacionM" placeholder="Ingrese Observaciones" rows="5"><?php echo $this->mascota['observaciones'] ?></textarea>
              </div>

            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
                <button type="submit" class="btn btn-verde" name="aceptar" style="margin-right:20px">Guardar</button>
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