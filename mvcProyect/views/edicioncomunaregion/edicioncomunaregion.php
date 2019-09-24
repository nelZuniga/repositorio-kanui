<?php require 'views/sidemenu.php';
$region = $_GET['id_reg_region']; ?>
<style>
  .tablaBusqueda tr th {
    color: white;
    background-color: #059485;
  }
</style>
<script>
    $(document).ready(function() {
        function getRegiones() {
            var url = "<?php echo constant('URL') ?>edicioncomunaregion/getRegion";
            $.ajax({
                url: url,
                success: function(data) {
                    //console.log(data);
                    $("#id_reg").empty();
                    $("#id_reg").append("<option value=''>Seleccione Una Region</option>");
                    $("#id_reg").append(data);
                },
                error: function() {
                    alert("error");
                }
            });
        }
        getRegiones();
        }); //fin document ready
    </script>

<div style="padding: 0;padding-right: 21px;">
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  <h1>Edicion de Comunas</h1>

                    <?php foreach($this->comunaregion as $r=> $valor): ?>
                    <?php endforeach; ?>     

  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>edicioncomunaregion/guardacomunaregion">
          <div class="container">
            <div class="row">
              <div class="col-md-4 form-group"><label for="ID_COMUNA">ID Comuna</label><br><input id="id_com" readonly name="id_com" type="text" placeholder="ID Comuna" class="form-control" value="<?php echo $valor['id_com'];?>">
              </div>
              <div class="col-md-4 form-group"><label for="NOMBRE_DESCRIPCION">Nombre Comuna</label><br>
                <input id="txt_desc" name="txt_desc" type="text" placeholder="Nombre de Comuna" class="form-control" value="<?php echo $valor['descripcion'];?>">
              </div>
                  <div class="col-md-4 form-group">
                      <!-- combo region -->
                      <label for="id_region" class="control-label" id="id_region" name="id_region">Region</label>

                      <select class="form-control" id="id_reg" name="id_reg" onchange='getComuna()' required>
                      </select>
                  </div>              
            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
               <button type="submit" class="btn btn-verde" data-toggle="modal" >Guardar</button>
                <a href='<?php echo constant('URL') ?>listacomunaregion?id_reg_region=<?php echo $valor['id_reg_region'];?>' class="btn btn-verde">Cancelar</a>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<?php require 'views/footer.php' ?>
</body>
</html>