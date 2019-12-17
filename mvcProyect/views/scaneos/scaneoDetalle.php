<?php require 'views/sidemenu.php' ?>
<!---INCLUIR ESTAS DOS LINEAS PARA PAGINACION --->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<!--- --->
<style>
    .tablaBusqueda tr th {
        color: white;
        background-color: #059485;
    }
</style>
<script>
    // SE INICIALIZA EL MANEJO DE DATATABLES EN LA TABLA (OJO TIENE Q TENER LA ETIQUETA TBODY Y THEAD VER MAS ABAJO)
    $(document).ready(function() {
        $('#tabla').DataTable();
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
            <table class="table table-striped" id="tabla">
                <!---AQUI --->
                <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Tipo de usuario</th>
                    <th>Nombre Usuario</th>
                    <th>ver mapa</th>
                </tr>
                </thead>
                <!--- Y AQUI --->
                <tbody>
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
                </tbody>
            </table>
        </div>
    </div>
    <!-- ModalRecupera -->
    <?php require 'views/footer.php' ?>

    </body>
    <script>
$.extend( true, $.fn.dataTable.defaults, {
    "language": {
        "decimal": ",",
        "thousands": ".",
        "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "infoPostFix": "",
        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
        "loadingRecords": "Cargando...",
        "lengthMenu": "Mostrar _MENU_ registros",
        "paginate": {
            "first": "Primero",
            "last": "Último",
            "next": "Siguiente",
            "previous": "Anterior"
        },
        "processing": "Procesando...",
        "search": "Buscar:",
        "searchPlaceholder": "búsqueda",
        "zeroRecords": "No se encontraron resultados",
        "emptyTable": "Ningún dato disponible en esta tabla",
        "aria": {
            "sortAscending":  ": Activar para ordenar la columna de manera ascendente",
            "sortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        //only works for built-in buttons, not for custom buttons
        "buttons": {
            "create": "Nuevo",
            "edit": "Cambiar",
            "remove": "Borrar",
            "copy": "Copiar",
            "csv": "fichero CSV",
            "excel": "tabla Excel",
            "pdf": "documento PDF",
            "print": "Imprimir",
            "colvis": "Visibilidad columnas",
            "collection": "Colección",
            "upload": "Seleccione fichero...."
        },
        "select": {
            "rows": {
                _: '%d filas seleccionadas',
                0: 'clic fila para seleccionar',
                1: 'una fila seleccionada'
            }
        }
    }           
} );            
    </script>
    <script src="https://cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"></script>

    </html>