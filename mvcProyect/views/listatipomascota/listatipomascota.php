
<?php require 'views/sidemenu.php'?>
    
<h1 class="page-header">LISTA TIPO MASCOTAS</h1>
<?php var_dump($this->tipomascota); ?>
 
<table class="table  table-striped  table-hover" id="tabla">
    <thead>
        <tr>
        <th style="width:120px; background-color: #5DACCD; color:#fff">Tipo Mascota</th>
        </tr>
    </thead>
    <tbody>
        <!--- Para acceder a la variable generada en el controlador lo accedes con $this->nombre_variable --->
    <?php foreach($this->tipomascota as $r=> $valor): ?>
    <!---aqui ibas como avion, como creamos la variable en la vista, y esta es un arreglo, recorremos el arreglo e imprimimos la vista --->
        <tr>
            <td><?php echo $valor['id_tmasc']; ?></td>
            <td><?php echo $valor['descripcion']; ?></td>
         </tr>
    <?php endforeach; ?>
    </tbody>
</table> 
<!--- despues borras los var_dump para que se te muestre en limpio--->
 
</body>
<script  src="assets/js/datatable.js">  
 
</script>
 
 
</html>