<?php require 'views/sidemenu.php' ?>
<script>
  function printConsulta(valor) {
    var pagina = '<?php echo constant('URL') ?>impresiones/consulta/'+valor;
    /*window.open(pagina,'',"height=600, width=400")
            }*/


    Swal.fire({
      html: '<iframe src="' + pagina + '" width="800" height="800"></iframe>',
      width:600,
      padding:0,
      height:400,
      showConfirmButton: false
    })
  }

  function cerrarmodal(){
    Swal.close();
  }

  function prinlist(){
    window.print();
  }
</script>

<style>
  .tablaBusqueda tr th {
    color: white;
    background-color: #059485;
  }
  .encabezatext{
    display:none;
  }
  .encabezado{
    text-align: right; margin: 15px;
  }
  .btn-verde{
    display:inline-flex;
  }
  @media print
{ 
  .sidebar-wrapper{
    display: none !important;
  }
  main{
    width: 50%;
  }
  .listado{
    margin-right: 15px;
    margin-left: 15px;
  }
  .encabezado{
    text-align: left;
  }
  .encabezatext{
    display: block !important;
  }
  .no-print{
    display:none !important;
  }
}
</style>
<div style="padding: 0;padding-right: 21px;">
  <h1>Historial de atención de mascotas.</h1>
  <div class="Encabezado">
  <?php foreach ($this->historial as $r => $valor) :  
    
    endforeach ?>
  <?php 
    if(isset($valor[0])){
      echo "<div class='encabezatext'><div><h5>Nombre de mascota: '".$valor[0]."'</h5></div>";
    }
    if(isset($valor[10])){
      echo "<div><h5>Fecha de nacimiento: ".date("d/m/Y", strtotime($valor[10]))."</h5></div>";
    }
    if(isset($valor[11])){
      echo "<div><h5>Tipo de Mascota: ".$valor[11]."</h5></div>";
    }
    if(isset($valor[9])){
      echo "<div><h5>Raza: ".$valor[9]."</div></h5></div>";
    }
  ?>
  <button type="button" class="btn btn-verde no-print" data-toggle="modal" data-target="#ModalImprimir" onclick="prinlist()"><div>Imprimir<br>Listado</div><img style="filter: invert(1);margin-left:10px" src="https://img.icons8.com/ios/50/000000/print.png" title="Imprimir consulta"></button>
</div>
  <div>
    <div class="row listado">
      <div class="col-md-12" id="resBusqueda" style="height:400px; overflow: auto; border: 1px solid black; padding-left:0;">
        <table width="100%" style="margin:5px" class="tablaBusqueda table table-striped">
          <tr>
            <th style="width:47px">Nombre</th>
            <th>Fecha de atención</th>
            <th>Fecha de control</th>
            <th>Vacuna</th>
            <th>Dosis</th>
            <th>Tipo control</th>
            <th>Peso Kg.</th>
            <th>Observación atención</th>
            <th class="no-print"></th>
          </tr>
          <?php foreach ($this->historial as $r => $valor) : ?>
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
              <td class="no-print"><img onclick="printConsulta(<?php echo $valor[8]; ?>)" src="https://img.icons8.com/ios/50/000000/print.png" title="Imprimir consulta"></td>
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
<script src="assets/js/datatable.js">
</script>

</html>