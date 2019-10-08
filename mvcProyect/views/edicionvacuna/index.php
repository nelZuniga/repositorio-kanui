<?php require 'views/sidemenu.php' ?>
<style>
    .tablaBusqueda tr th {
        color: white;
        background-color: #059485;
    }
</style>
<script>
    $(document).ready(function() {
    }); //fin document ready
</script>

<div style="padding: 0;padding-right: 21px;">
    <h1>Edicion de Vacunas</h1>

    <?php 
    foreach ($this->vacunas as $r => $valor) : ?>
    <?php endforeach; ?>

    <div id="registrar" class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>edicionvacuna/guardavacuna">
                    <input type="hidden" name="id_vac" id="id_vac" value="<?php echo $valor['id_vac'] ?>">
                <div class="container">
                        <div class="row">
                            <div class="col-md-8 form-group"><label for="descripcion">Vacuna</label><br>
                                <input id="desc" name="desc" type="text" placeholder="Nombre de Comuna" class="form-control" value="<?php echo $valor['descripcion']; ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
                                <button type="submit" class="btn btn-verde" data-toggle="modal">Guardar</button>
                                <a href='<?php echo constant('URL') ?>listatipovacuna' class="btn btn-verde">Cancelar</a>
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