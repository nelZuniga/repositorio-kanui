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
  <h1>Agregar patrones de pelaje de especies</h1>

  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>agregapatron/guardapatron">
          <div class="container">
            <div class="row">
              <div class="col-md-6 form-group"><label for="ID_COLOR">ID patrón de pelaje</label><br><input id="id_patron" readonly name="id_patron" type="text" placeholder="ID Patrón automático" class="form-control">
              </div>
              <div class="col-md-6 form-group"><label for="NOMBRE_DESCRIPCION">Descipcion del patrón del pelaje</label><br>
                <input required id="txt_desc" name="txt_desc" type="text" placeholder="Nombre del patrón" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
               <button type="submit" class="btn btn-verde" data-toggle="modal" >Guardar</button>
                <a href='<?php echo constant('URL') ?>listapatron' class="btn btn-verde">Cancelar</a>
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