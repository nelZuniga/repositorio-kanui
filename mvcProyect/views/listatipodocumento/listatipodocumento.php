<?php require 'views/sidemenu.php'?>
<style>
.tablaBusqueda tr th{
  color:white;
  background-color: #059485;
}    
</style>
<div style="padding: 0;padding-right: 21px;">
    <h1>Tipos de documentos</h1>
    <div class="container">
        <table>
            <tr>
                <td>
                    <a href='<?php echo constant('URL') ?>agregatipodocumento' class="btn btn-verde">AGREGAR</div></a>
                </td>
            </tr>
        </table>
        <br>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="resBusqueda" style="height:400px; overflow: auto; border: 1px solid black; padding-left:0;">
                <table width="100%" style="margin:5px" class="tablaBusqueda table table-striped">
                    <tr>
                        <th style="width:47px"></th>
                        <th>Descripción tipo de documento</th>
                        <th>Abreviatura</th>
                        <th>Acción</th>
                    </tr>
                    <?php foreach($this->tipodocumento as $r=> $valor): ?>
                        <!---aqui ibas como avion, como creamos la variable en la vista, y esta es un arreglo, recorremos el arreglo e imprimimos la vista --->
                        <tr>
                            <td><?php echo $valor['id_tdoc']; ?></td>
                            <td><?php echo $valor['descripcion']; ?></td>
                            <td><?php echo $valor['abreviatura']; ?></td>
                            <td><a href='<?php echo constant('URL') ?>ediciontipodocumento/ediciontipodocumento?id_tdoc=<?php echo $valor['id_tdoc']; ?>' class="btn btn-verde">EDITAR</div></a>
                            </td>
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