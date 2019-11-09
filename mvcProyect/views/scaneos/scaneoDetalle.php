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
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  
  <h1>Historial de Scaneos</h1>
  <div class="container">
    

    <div class="container-fluid mascotas" id="mascotas">
        <table class="table table-striped">
            <tr>
                <th>Lugar</th>
                <th>Tipo de usuario</th>
                <th>Nombre Usuario</th>
                <th>ver mapa</th>
            </tr>

            <?php var_dump($this->mascota)?> 
        </table>
    </div>
</div>
<!-- ModalRecupera -->
<?php require 'views/footer.php' ?>

</body>

</html>