
<?php require 'views/sidemenu.php'?>
    
<h1 class="page-header">LISTA TIPO MASCOTAS</h1>
 
<table class="table  table-striped  table-hover" id="tabla">
    <thead>
        <tr>
        <th style="width:120px; background-color: #5DACCD; color:#fff">Tipo Mascota</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->listatipomascota/select() as $r): ?>
        <tr>
            <td><?php echo $r->Tipo_Mascota; ?></td>
         </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
 
</body>
<script  src="assets/js/datatable.js">  
 
</script>
 
 
</html>