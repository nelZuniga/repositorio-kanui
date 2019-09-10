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
  <h1>Edicion de Tipos de Mascotas</h1>

                    <?php foreach($this->tipomascota as $r=> $valor): ?>
                    <?php endforeach; ?>     

  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>ediciontipomascota/ediciontipomascota">
          <div class="container">
            <div class="row">
              <div class="col-md-6 form-group"><label for="ID_TIPO_MASCOTA">ID Tipo Mascota</label><br><input id="id_tmasc" readonly name="id_tmasc" type="text" placeholder="ID Tipo Mascota" class="form-control" value="<?php echo $valor['id_tmasc'];?>">
              </div>
              <div class="col-md-6 form-group"><label for="NOMBRE_DESCRIPCION">Descipcion</label><br>
                <input id="descripcion" name="descripcion" type="text" placeholder="Nombre Tipo Mascota" class="form-control" value="<?php echo $valor['descripcion'];?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
                <button type="submit" class="btn btn-verde" name="aceptar" style="margin-right:20px">Guardar</button>
                <a href='<?php echo constant('URL') ?>listatipomascota' class="btn btn-verde">Cancelar</div></a>
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