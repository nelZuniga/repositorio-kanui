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
  <h1>Agregar regiones del país</h1>

  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>agregaregion/guardaregion">
          <div class="container">
            <div class="row">
              <div class="col-md-3 form-group"><label for="ID_REGION">ID región</label><br><input id="id_reg" readonly name="id_reg" type="text" placeholder="ID región automático" class="form-control">
              </div>
              <div class="col-md-3 form-group"><label for="NOMBRE_DESCRIPCION">Descripción</label><br>
                <input required id="txt_desc" name="txt_desc" type="text" placeholder="Nombre de región" class="form-control">
              </div>
              <div class="col-md-3 form-group"><label for="SIMBOLOGÍA_REGIÓN">Simbología región</label><br>
                <input required id="txt_simbolo" name="txt_simbolo" type="text" placeholder="Smibología región" class="form-control">
              </div>
              <div class="col-md-3 form-group"><label for="ORDEN_REGION">Orden de la región</label><br>
                <input required id="txt_orden" name="txt_orden" type="text" placeholder="Orden de región" class="form-control">
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