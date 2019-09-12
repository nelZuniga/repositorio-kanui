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
  <h1>Edicion de Tipos de Documentos</h1>

                    <?php foreach($this->tipodocumento as $r=> $valor): ?>
                    <?php endforeach; ?>     

  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>ediciontipodocumento/guardatipodocumento">
          <div class="container">
            <div class="row">
              <div class="col-md-4 form-group"><label for="ID_TIPO_DOCUMENTO">ID Tipo Documento</label><br><input id="id_tdoc" readonly name="id_tdoc" type="text" placeholder="ID Tipo Documento" class="form-control" value="<?php echo $valor['id_tdoc'];?>">
              </div>
              <div class="col-md-4 form-group"><label for="NOMBRE_TIPO DOCUMENTO">Descipcion tipo de documento</label><br>
                <input id="txt_desc" name="txt_desc" type="text" placeholder="Nombre Tipo de Documento" class="form-control" value="<?php echo $valor['descripcion'];?>">
              </div>
              <div class="col-md-4 form-group"><label for="ABREVIATURA_TIPO DOCUMENTO">Abreviatura tipo de documento</label><br>
                <input id="txt_abre" name="txt_abre" type="text" placeholder="Abreviatura tipo de documento" class="form-control" value="<?php echo $valor['abreviatura'];?>">
              </div>              
            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
               <button type="submit" class="btn btn-verde" data-toggle="modal" >Guardar</button>
                <a href='<?php echo constant('URL') ?>listatipodocumento' class="btn btn-verde">Cancelar</a>
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