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
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>atiendemascota/atiendeMascota">
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
              <div class="col-md-4 form-group"><label for="tipoM">Tipo de mascota</label><br><input id="tipoM" readonly name="tipoM" type="text" placeholder="Tipo de Mascota" class="form-control" value="<?php echo $this->mascota[3]  ?>"></div>
              <div class="col-md-4 form-group"><label for="razaM">Raza de mascota</label><br><input id="razaM" readonly name="razaM" type="text" placeholder="Raza de Mascota" class="form-control" value="<?php echo $this->mascota[4] ?>"></div>              
              <div class="col-md-4 form-group"><label for="fnacM">Fecha de Nacimiento</label><br><input id="fnacM" readonly name="fnacM" type="text" placeholder="Fecha de Nacimiento" class="form-control" value="<?php echo $this->mascota[5] ?>"></div>               
              </div>              

            <div class="row">
              <div class="col-md-4  form-group"><label for="doctoD">Documento Dueño</label><br><input id="doctoD" readonly name="doctoD" type="text" placeholder="Documento Dueño" class="form-control" value="<?php echo $this->mascota[7]  ?>">
              </div>
              <div class="col-md-8  form-group"><label for="nombreD">Nombre Dueño</label><br><input id="nombreD" readonly name="nombreD" type="text" placeholder="Nombre Dueño" class="form-control" value="<?php echo $this->mascota[10]?> <?php echo $this->mascota[8]?> <?php echo $this->mascota[9]?>">
              </div>
              <div class="col-md-12 form-group"><label for="observacionM">Observaciones</label><br>
                <textarea readonly class="form-control" id="observacionM" name="observacionM" placeholder="Sin Observaciones" rows="2"><?php echo $this->mascota[6] ?></textarea>

              </div>              
            </div>
            <hr/>            
            <!-- Historial de Atenciones -->

              <div class="col-md-12 form-group">
                <a href='<?php echo constant('URL') ?>historialmascota/controlesmascota/<?php echo $this->mascota[0] ?>' class="btn btn-info" target="_blank">Ver Historial de Atenciones</a>

            <!-- Fin Historial de Atenciones -->
            <hr />
            
            </div>  
             <div class="row">
              <div class="col-md-12 form-group">
                <h3>Registro de atención mascota<h3>
              </div>
              <div class="col-md-6 form-group" align="center">
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 form-group"><label for="pesoM">Peso Mascota</label><br><input id="pesoM" name="pesoM" type="text" placeholder="Ingrese Peso Actual" class="form-control" required="">
              </div>              
              <div class="col-md-4 form-group"><label for="id_vac">Vacuna</label><br>
                <select class="form-control" id="id_vac" name="id_vac">
                  <option value=''>Seleccione Una Vacuna</option>
                </select>
              </div>
              <div class="col-md-4 form-group"><label for="dosis">Dosis</label><br><input id="dosis" name="dosis" type="text" placeholder="Ingrese Dosis" class="form-control" optional="">
              </div>  
                <div class="col-md-6 form-group"><label for="FechaPA">Próxima Atención</label><br>
                  <div>
                    <input id="FechaPA" name="FechaPA" type="date" placeholder="Fecha Próxima Atención" class="form-control">
                  </div>
                </div>  
              <div class="col-md-4 form-group"><label for="id_control">Tipo de Control</label><br>
                <select class="form-control" id="id_control" name="id_control" required="">
                  <option value=''>Seleccione Tipo de Control</option>
                </select>
              </div>
              <div class="col-md-12 form-group"><label for="observacionA">Observaciones</label><br>
                <textarea class="form-control" id="observacionA" name="observacionA" placeholder="Ingrese Observaciones de Atención" rows="5" required="Debe ingresar"></textarea>
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