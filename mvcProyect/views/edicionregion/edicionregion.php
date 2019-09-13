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
  <h1>Edicion de Regiones del País</h1>

                    <?php foreach($this->region as $r=> $valor): ?>
                    <?php endforeach; ?>     

  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>edicionregion/guardaregion">
          <div class="container">
            <div class="row">
              <div class="col-md-3 form-group"><label for="ID_REGION">ID Región</label><br><input id="id_reg" readonly name="id_reg" type="text" placeholder="ID Región del país" class="form-control" value="<?php echo $valor['id_reg'];?>">
              </div>
              <div class="col-md-3 form-group"><label for="NOMBRE_DESCRIPCION">Nombre de región</label><br>
                <input id="txt_desc" name="txt_desc" type="text" placeholder="Nombre de región" class="form-control" value="<?php echo $valor['descripcion'];?>">
              </div>
              <div class="col-md-3 form-group"><label for="SIMBOLO_REGION">Simbología de región</label><br>
                <input id="txt_simbolo" name="txt_simbolo" type="text" placeholder="Simbología de región" class="form-control" value="<?php echo $valor['simbolo'];?>">
              </div>
              <div class="col-md-3 form-group"><label for="ORDEN_REGION">Orden de región</label><br>
                <input id="txt_orden" name="txt_orden" type="text" placeholder="Orden de región" class="form-control" value="<?php echo $valor['orden'];?>">
              </div>              
            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
               <button type="submit" class="btn btn-verde" data-toggle="modal" >Guardar</button>
                <a href='<?php echo constant('URL') ?>listaregion' class="btn btn-verde">Cancelar</a>
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