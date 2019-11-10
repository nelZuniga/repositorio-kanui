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

    function abrirmap(long, lat) {
        var frame = '<iframe class="iframe" style="padding:20px;width: 600px;" src="https://maps.google.com/?q='+lat+','+long+'&z=14&t=m&output=embed" height="600" widht="600" frameborder="0" style="border:0" allowfullscreen></iframe>';
        Swal.fire({
            html: frame,
            width: 600,
            padding: 0,
            height: 600,
            showConfirmButton: false
        })
    }
</script>

<div style="padding: 0;padding-right: 21px;">
    <h1>Historial de Scaneos</h1>
    <div class="container">


        <div class="container-fluid mascotas" id="mascotas">
            <table class="table table-striped">
                <tr>
                    <th>Fecha</th>
                    <th>Tipo de usuario</th>
                    <th>Nombre Usuario</th>
                    <th>ver mapa</th>
                </tr>
                <?php foreach ($this->mascota as $r => $valor) : ?>
                    <tr>
                        <td><?php echo $valor['fecha']; ?></td>
                        <td><?php if ($valor['id_dueno'] === $valor['idotro']) {
                                echo "Dueño";
                            } else {
                                echo "Otro";
                            } ?></td>
                        <td><?php echo $valor['nomotro'] . ' ' . $valor['apepotro']; ?></td>
                        <td><a href="#" onclick="abrirmap(<?php echo $valor['longitud'] ?>,<?php echo $valor['lat'] ?> )">Ver mapa</a></td>
                    </tr>

                <?php endforeach; ?>
            </table>
        </div>
    </div>
    <!-- ModalRecupera -->
    <?php require 'views/footer.php' ?>

    </body>

    </html>