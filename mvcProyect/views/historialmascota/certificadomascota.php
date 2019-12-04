<?php require 'views/sidemenu.php' ?>
<script>
  function printConsulta(valor) {
    var pagina = '<?php echo constant('URL') ?>Impresiones/consulta/'+valor;
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
  $(document).ready(function(){
    prinlist();
  });

  window.onafterprint = function(){
    Swal.fire(
  'Atencion',
  'la atencion ha sido finalizada con exito',
  'success'
  ).then((result) => {
    window.location.href = '<?php echo constant('URL')?>atencionmascota';
  })
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
  <h1>Certificado de atención de mascotas.</h1>
    <div class="row">
      <div class="col-md-12 form-group">
        <h3>Datos de la mascota y dueño<h3>
      </div>
      <div class="col-md-12 form-group" align="center">
      </div>
    </div>     
  <div class="Encabezado">
  <?php foreach ($this->historial as $r => $valor) :  
    
    endforeach ?>
  </div>
  <div class="col-md-12">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 form-group">
          Nombre del propietario:<input readonly type="text" class="form-control" value="<?php echo $valor[0]; ?>">
        </div>
        <div class="col-md-6 form-group">
          Documento:<input readonly type="text" class="form-control" value="<?php echo $valor[1]; ?>">
        </div>        
      </div>
      <div class="row">
        <div class="col-md-12 form-group">
          Dirección:<input readonly type="text" class="form-control" value="<?php echo $valor[2]; ?>">
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="row">
        <div class="col-md-6 form-group">
          Nombre de la mascota:<input readonly type="text" class="form-control" value="<?php echo $valor[4]; ?>">
        </div>
        <div class="col-md-6 form-group">
          Chip identificatorio:<input readonly type="text" class="form-control" value="<?php echo $valor[3]; ?>">
        </div>        
      </div>
      <div class="row">
        <div class="col-md-3 form-group">
          Fecha de Nacimiento:<input readonly type="date" class="form-control" value="<?php echo $valor[10]; ?>">
        </div>
        <div class="col-md-3 form-group">
          Edad:<input readonly type="text" class="form-control" value="<?php echo $valor[11]; ?>">
        </div>        
        <div class="col-md-3 form-group">
          Especie:<input readonly type="text" class="form-control" value="<?php echo $valor[17]; ?>">
        </div>        
        <div class="col-md-3 form-group">
          Raza:<input readonly type="text" class="form-control" value="<?php echo $valor[15]; ?>">
        </div>                
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col-md-12 form-group">
        <h3>Datos de atención de <?php echo $valor[9]; ?>
        <h3>
      </div>
    </div>
  <div class="col-md-12">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3 form-group">
          Fecha de atención:<input readonly type="date" class="form-control" value="<?php echo $valor[5]; ?>">
        </div>
        <div class="col-md-3 form-group">
          Tipo de atención:<input readonly type="text" class="form-control" value="<?php echo $valor[9]; ?>">
        </div>        
        <div class="col-md-3 form-group">
          Fecha próximo control:<input readonly type="date" class="form-control" value="<?php echo $valor[6]; ?>">
        </div>
      </div>
    </div>

    <div class="col-md-12">
      <div class="row">
        <div class="col-md-3 form-group">
          Peso registrado:<input readonly type="text" class="form-control" value="<?php echo $valor[12]; ?>">
        </div>          
        <div class="col-md-12 form-group">
          Observaciones de atención:<input readonly type="text" class="form-control" value="<?php echo $valor[13]; ?>">
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 form-group">
          Vacuna aplicada:<input readonly type="date" class="form-control" value="<?php echo $valor[7]; ?>">
        </div>
        <div class="col-md-3 form-group">
          Dosis aplciada:<input readonly type="text" class="form-control" value="<?php echo $valor[8]; ?>">
        </div>        
        <div class="col-md-6 form-group">
          Comprobante Vacuna:
          <div style="border: dashed #c3c3c3 2px;height: 60px;"></div>
        </div>        
      </div>
    </div>
  </div>



      <div class="col-md-12" id="resBusqueda" style="overflow: auto; padding-left:0;">
        <table width="100%" style="margin:5px" class="tablaBusqueda table table-striped">
          <tr colspan="2">
            <th style="width:100%">Datos médico veterinario</th>
          </tr>
          <tr>
              <td>Veterinario : <?php echo $valor[18]; ?></td>
          </tr>
          <tr>
              <td>Firma :</td>
          </tr>     
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