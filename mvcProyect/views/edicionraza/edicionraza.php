<?php require 'views/sidemenu.php';
$mascota = $_GET['id_tmasc']; ?> ?>
<style>
  .tablaBusqueda tr th {
    color: white;
    background-color: #059485;
  }
</style>
<script>
    $(document).ready(function() {
        function getAnimal() {
            var url = "<?php echo constant('URL') ?>edicionraza/getmascota";
            $.ajax({
                url: url,
                success: function(data) {
                    //console.log(data);
                    $("#id_tmasc").empty();
                    $("#id_tmasc").append("<option value=''>Seleccione un tipo de animal</option>");
                    $("#id_tmasc").append(data);
                },
                error: function() {
                    alert("error");
                }
            });
        }
        getAnimal();
        }); //fin document ready
    </script>

<div style="padding: 0;padding-right: 21px;">
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  <h1>Edicion de Razas</h1>

                    <?php foreach($this->raza as $r=> $valor): ?>
                    <?php endforeach; ?>     

  <div id="registrar" class="row">
    <div class="col-md-12">
      <div class="well well-sm">
        <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>edicionraza/guardaraza">
          <div class="container">
            <div class="row">
              <div class="col-md-4 form-group"><label for="ID_Raza">ID Comuna</label><br><input id="id_raza" readonly name="id_raza" type="text" placeholder="ID Raza" class="form-control" value="<?php echo $valor['id_raza'];?>">
              </div>
              <div class="col-md-4 form-group"><label for="NOMBRE_DESCRIPCION">Nombre de Raza</label><br>
                <input id="txt_desc" name="txt_desc" type="text" placeholder="Nombre de Raza" class="form-control" value="<?php echo $valor['descripcion'];?>">
              </div>
                  <div class="col-md-4 form-group">
                      <!-- combo animal -->
                      <label for="id_animal" class="control-label" id="id_animal" name="id_animal">Raza</label>

                      <select class="form-control" id="id_tmasc" name="id_tmasc" onchange='getComuna()' required>
                      </select>
                  </div>              
            </div>
            <div class="row">
              <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
               <button type="submit" class="btn btn-verde" data-toggle="modal" >Guardar</button>
                <a href='<?php echo constant('URL') ?>listaraza?id_tmasc=<?php echo $mascota;?>' class="btn btn-verde">Cancelar</a>
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