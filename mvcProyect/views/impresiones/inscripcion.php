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

<div class="container">
    <div class="row">
        <div class="col-12" align="center">
            <h1 style="margin-top:50px">Certificado de inscripción Kanui</h1>
        </div>
    </div>
    <div class="bg"></div>
    <div class="row" style="margin-top: 100px;">
        <div class="col-12">
            Certifico la inscripci&oacute;n en la plataforma Kanui de la Mascota <b><?php echo $this->atencion[0]['nombre']?></b>, Raza <b><?php echo $this->atencion[0]['descripcion']?> </b>, Nº de chip <b><?php echo $this->atencion[0]['n_chip']?></b>, 
            Perteneciente al Usuario <b><?php echo $this->atencion[0]['nombres'] .' '.$this->atencion[0]['apellido_paterno'].' '.$this->atencion[0]['apellido_materno']?></b>, el dia <b><?php echo $this->atencion[0]['creacion']?></b>.
        </div>
    </div>


    <div class="row" style="margin-top: 100px;">
        <div class="col-6" align="center">
            _________________________________<br>
            <?php echo $_SESSION['nombres'].' '.$_SESSION['apellido_paterno'];?>

        </div>

        <div class="col-6" align="center">
        _________________________________<br>
            <?php echo $_SESSION['nombres'].' '.$_SESSION['apellido_paterno'];?><br>
            Dueño
        </div>
    </div>
    
</div>
<div class="printContainer no-print" onclick="prin();"><a class="prin"><img src="https://img.icons8.com/ios/50/000000/print.png"></a></div>