<?php 
if(!isset($_SESSION)) 
{ 
    session_start(); 
    if (!isset($_SESSION) || !isset($_SESSION['nombres']) || !isset($_SESSION['apellido_paterno'])) {
        session_destroy();
        $url = constant('URL') . "main";
        echo "<script>window.location.href='" . $url . "'</script>";
    } 
}
?>




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>CSS/css.css"> 
    
    <script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
    <style>
    .bg{
        background-image: url('<?php echo constant('URL') ?>public/img/logo-2kanui.png');
        background-repeat: no-repeat;
        background-position: center center;
        height: 380px;
        position: absolute;
        width: 700px;
        opacity: 0.6;
    }
    
.printContainer{
    position: absolute;
    margin-top: 15px;
    height: 50px;
    /* width: 50px; */
    font-size: 40px;
    top: 0;
    right: 15;
    border-radius: 15px;
}
.prin{
    position: fixed;
    right: 50;
    border-radius: 30px;
    height: 60px;
    width: 60px;
    text-align: center;
    padding-top: 4px;
}
.prin:hover{
    background-color:gray;
}
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }

    .bg{
        background-image: url('<?php echo constant('URL') ?>public/img/logo-2kanui.png');
        background-repeat: no-repeat;
        background-position: center center;
        height: 380px;
        position: absolute;
        width: 900px;
        opacity: 0.6;
        -webkit-print-color-adjust: exact;
    }

}
    </style>

    <script>
    function prin(){
        window.print();
    }
    </script>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1>Carnet de Vacunas</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1">
        </div>
        <div class="col-md-11">
            Fecha de emisi&oacute;n: <?php echo date("d/m/Y")?> <br>
            Nombre Mascota: <?php echo $this->mascota[0]['nombre']?><br>
            Nombre Dueño: <?php echo $this->mascota[0]['nombres'].' '.$this->mascota[0]['apellido_paterno']?><br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
        <table class="table table-bordered">
            <tr>
            <thead class="thead-light">
                <th width="20%">Fecha de vacunaci&oacute;n</th>
                <th width="20%">Nombre de vacuna</th>
                <th width="20%">Profesional tratante</th>
                <th></th>
                </tr>
            </thead>
            <?php foreach ($this->atencion as $r => $valor) :?>
            <tr>
                <td><?php echo $valor['fecha_atencion']?></td>
                <td><?php echo $valor['descripcion']?></td>
                <td><?php echo $valor['nombres'].' '.$valor['apellido_paterno']?></td>
                <td></td>
            </tr>

            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        </div>
        <div class="col-md-1"></div>
    </div>
</div>


<div class="printContainer no-print" onclick="prin();"><a class="prin"><img src="https://img.icons8.com/ios/50/000000/print.png"></a></div>

