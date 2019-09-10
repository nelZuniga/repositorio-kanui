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
  
  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>ediciontipomascota/ediciontipomascota">
          <div class="container">
            <div class="row">
              <div class="col-md-6 form-group"><label for="chipID">ID Tipo Mascota</label><br><input id="id_tmasc" readonly name="id_tmasc" type="text" placeholder="ID Tipo Mascota" class="form-control" value="<?php echo $this->tipomascota['id_tmasc'] ?>">
              </div>
              <div class="col-md-6 form-group"><label for="nombreM">Descipcion</label><br>
                <?php echo $this->tipomascota['descripcion'] ?></div>
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
<?php require 'views/footer.php' ?>
</body>
</html>