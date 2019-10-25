<?php require 'views/sidemenu.php'?>
<style>
.tablaBusqueda tr th{
  color:white;
  background-color: #059485;
}    
</style>
<div style="padding: 0;padding-right: 21px;">
    <h1>Historial de Atención de Mascotas</h1>
    <div class="container">
        <br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="resBusqueda" style="height:400px; overflow: auto; border: 1px solid black; padding-left:0;">
                <table width="100%" style="margin:5px" class="tablaBusqueda table table-striped">
                    <tr>
                        <th style="width:47px">Nombre</th>
                        <th>Fecha de Atención</th>
                        <th>Fecha de Control</th>
                        <th>Vacuna</th>
                        <th>Dosis</th>
                        <th>Tipo Control</th>
                        <th>Peso Kgs.</th>
                        <th>Obs.Atención</th>
                        <th></th>
                    </tr>
                    <?php foreach($this->historial as $r=> $valor): ?>
                        <!---aqui ibas como avion, como creamos la variable en la vista, y esta es un arreglo, recorremos el arreglo e imprimimos la vista --->
                        <tr>
                            <td><?php echo $valor[0]; ?></td>
                            <td><?php echo $valor[1]; ?></td>
                            <td><?php echo $valor[2]; ?></td>
                            <td><?php echo $valor[3]; ?></td>
                            <td><?php echo $valor[4]; ?></td>
                            <td><?php echo $valor[5]; ?></td>
                            <td><?php echo $valor[6]; ?></td>
                            <td><?php echo $valor[7]; ?></td>
                            <td>Imprimir</td>
                        </tr>
                    <?php endforeach; ?>                    
                </table>
            </div>
        </div>
    </div>
</div>
 </body>
<script  src="assets/js/datatable.js">  
 </script>
</html>