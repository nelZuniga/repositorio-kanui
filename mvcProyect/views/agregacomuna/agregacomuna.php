<?php require 'views/sidemenu.php';
$region = $_GET['id_reg_region'];
?>
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
  <h1>Agregar regiones del ´país</h1>

  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>agregacomuna/guardacomuna">
          <div class="container">
            <div class="row">
              <div class="col-md-3 form-group"><label for="ID_COMUNA">ID comuna</label><br><input id="id_com" readonly name="id_com" type="text" placeholder="ID comuna automático" class="form-control">
              </div>
              <div class="col-md-3 form-group"><label for="NOMBRE_COMUNA">Descripción</label><br>
                <input required id="txt_desc" name="txt_desc" type="text" placeholder="Nombre de comuna" class="form-control">
              </div>
              <div class="col-md-3 form-group"><label for="ID_REGION">Descripción</label><br>
                <input required id="id_reg_Region" readonly name="id_reg_region" type="text" placeholder="ID de la región" class="form-control" value="<?php echo $region; ?>">
              </div>             
            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
               <button type="submit" class="btn btn-verde" data-toggle="modal" >Guardar</button>
                <a href='<?php echo constant('URL') ?>listacomunaregion?id_reg_region=<?php echo $region; ?>' class="btn btn-verde">Cancelar</a>
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