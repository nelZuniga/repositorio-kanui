<?php require 'views/sidemenu.php' ?>
<style>
  .tablaBusqueda tr th {
    color: white;
    background-color: #059485;
  }
</style>
<script>
  $(document).ready(function()); //fin document ready
</script>

<div style="padding: 0;padding-right: 21px;">
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  <h1>Edición de Comunas</h1>

                    <?php foreach($this->comunaregion as $r=> $valor): ?>
                    <?php endforeach; ?>     

  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>ediciontipomascota/guardatipomascota">
          <div class="container">
            <div class="row">
              <div class="col-md-6 form-group"><label for="ID_TIPO_MASCOTA">ID Comuna</label><br><input id="id_com" readonly name="id_com" type="text" placeholder="ID Tipo Mascota" class="form-control" value="<?php echo $valor['id_com'];?>">
              </div>
              <div class="col-md-6 form-group"><label for="NOMBRE_DESCRIPCION">Nombre comuna</label><br>
                <input id="txt_desc" name="txt_desc" type="text" placeholder="Nombre de Comuna" class="form-control" value="<?php echo $valor['descripcion'];?>">
              </div>
              <div class="col-md-6 form-group"><label for="NOMBRE_DESCRIPCION">Nombre región</label><br>
                <input id="txt_region" name="txt_region type="text" placeholder="Nombre de Region" class="form-control" value="<?php echo $valor['id_reg_Region'];?>">
              </div>              
            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
               <button type="submit" class="btn btn-verde" data-toggle="modal" >Guardar</button>
                <a href='<?php echo constant('URL') ?>listacomunaregion' class="btn btn-verde">Cancelar</a>
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