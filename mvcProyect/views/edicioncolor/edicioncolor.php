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
  <h1>Edición de color de especies</h1>

                    <?php foreach($this->tipocolor as $r=> $valor): ?>
                    <?php endforeach; ?>     

  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>edicioncolor/guardacolor">
          <div class="container">
            <div class="row">
              <div class="col-md-6 form-group"><label for="ID_COLOR">ID color de especie</label><br><input id="id_color" readonly name="id_color" type="text" placeholder="ID color de especie" class="form-control" value="<?php echo $valor['id_color'];?>">
              </div>
              <div class="col-md-6 form-group"><label for="NOMBRE_DESCRIPCION">Descipción</label><br>
                <input id="txt_desc" name="txt_desc" type="text" placeholder="Nombre color de especie" class="form-control" value="<?php echo $valor['descripcion'];?>">
              </div>
            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
               <button type="submit" class="btn btn-verde" data-toggle="modal" >Guardar</button>
                <a href='<?php echo constant('URL') ?>listacolor' class="btn btn-verde">Cancelar</a>
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