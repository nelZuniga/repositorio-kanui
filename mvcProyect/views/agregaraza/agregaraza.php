<?php require 'views/sidemenu.php';
$mascota = $_GET['id_tmasc'];
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
  <h1>Agregar Razas</h1>

  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>agregaraza/guardaraza">
          <div class="container">
            <div class="row">
              <div class="col-md-4 form-group"><label for="ID_RAZA">ID Raza</label><br><input id="id_raza" readonly name="id_raza" type="text" placeholder="ID raza automático" class="form-control">
              </div>
              <div class="col-md-8 form-group"><label for="NOMBRE_RAZA">Descripción</label><br>
                <input required id="txt_desc" name="txt_desc" type="text" placeholder="Nombre de raza" class="form-control">
              </div>
              <div class="col-md-3 form-group"><label for="ID_ANIMAL"></label><br>
                <input required id="id_tmasc" readonly name="id_tmasc" type="hidden" placeholder="ID tipo " class="form-control" value="<?php echo $mascota; ?>">
              </div>             
            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
               <button type="submit" class="btn btn-verde" data-toggle="modal" >Guardar</button>
                <a href='<?php echo constant('URL') ?>listaraza?id_tmasc=<?php echo $mascota; ?>' class="btn btn-verde">Cancelar</a>
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