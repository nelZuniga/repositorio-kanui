<?php require 'views/sidemenu.php'?>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

<style>
.tablaBusqueda tr th{
  color:white;
  background-color: #059485;
}    
</style>
<div style="padding: 0;padding-right: 21px;">
    <h1>Historial de Atención de Mascotas</h1>
<button type="button" class="btn btn-verde" data-toggle="modal" data-target="#ModalImprimir">Imprimir</button>
    <div>
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
                            <td><button type="button" class="btn btn-verde" data-toggle="modal" data-target="#ModalImprimir<?php echo $valor[0];?>">Imprimir</button></td>
                        </tr>
                    <?php endforeach; ?>                    
                </table>
            </div>
        </div>
    </div>  
</div>
<!-- ModalImprimirDetalle-->
    <div class="modal fade" id="ModalImprimir<?php echo $valor[0]; ?>|">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Cabecera de formulario -->
        <!-- Formulario de impresión de detalle solicitado -->
        <div class="modal-body">
          <div class="col-lg-12">
            <div class="alert alert-info alert-dismissible">
              <strong>Historial</strong> Presione <a href="http://localhost/repositorio-kanui/mvcProyect" class="alert-link">aquí</a> para continuar.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ModalImprimirDetalle --> 

 </body>
<script  src="assets/js/datatable.js">  
 </script>
</html>