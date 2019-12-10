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
        opacity: 0.2;
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
        opacity: 0.2;
        -webkit-print-color-adjust: exact;
    }

}
    </style>

    <script>
    function prin(){
        window.print();
    }
    </script>
<div class="bg"></div>    
<font face="Arial, sans-serif"><font size="3" style="font-size: 13pt"><b>CERTIFICADO DE SALUD PARA VIAJAR </b></font></font>
</p>
<p class="western" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<p class="western" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<p class="western" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<p class="western" style="margin-bottom: 0cm; line-height: 100%"><br/>

</p>
<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt"><span lang="es-CL">El médico veterinario que suscribe
    este documento, certifica que la mascota indicada a continuación, se encuentra en condiciones aptas de salud para viajar, y que cuenta con sus correspondientes vacunas, encontrándose al día en estas.
</span></font></font>
</p>
<p>
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt"><span lang="es-CL"><b>
Datos del Propietario: </b></span></font></font>
</p>

<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">
    <span lang="es-CL">Sr(a) :   <?php echo $this->viajes[0]['nombres'] .' '.$this->viajes[0]['apellido_paterno'].' '.$this->viajes[0]['apellido_materno']?>
</p>
    </span>
</font></font>
</p>

<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">
    <span lang="es-CL">Dirección :   <?php echo $this->viajes[0]['direccion']?>,
comuna de <?php echo $this->viajes[0]['COMUNA']?>, Región de <?php echo $this->viajes[0]['REGION']?>
</p>
    </span>
</font></font>
</p>

<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">
    <span lang="es-CL">Teléfono :  <?php echo $this->viajes[0]['cel']?>
</p>
    </span>
</font></font>
</p>

<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">
    <span lang="es-CL">Correo electrónico :  <?php echo $this->viajes[0]['correo']?>
</p>
    </span>
</font></font>
</p>

<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt"><span lang="es-CL"><b>
Datos de la mascota: </b></span></font></font>
</p>

<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">
    <span lang="es-CL">Nombre de Mascota : <?php echo $this->viajes[0]['nombre']?>
</p>
    </span>
</font></font>
</p>

<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">
    <span lang="es-CL">Especie : <?php echo $this->viajes[0]['ESPECIE']?> 
</p>
    </span>
</font></font>
</p>

<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">
<span lang="es-CL">Sexo : <?php echo $this->viajes[0]['SEXO']?> 
</p>
</span>
</font></font>
</p>

<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">
<span lang="es-CL">Raza : <?php echo $this->viajes[0]['RAZA']?> 
</p>
</span>
</font></font>
</p>

<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">
<span lang="es-CL">Color : <?php echo $this->viajes[0]['COLOR']?> - <?php echo $this->viajes[0]['PATRON']?> 
</p>
</span>
</font></font>
</p>

<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">
<span lang="es-CL">Fecha de nacimiento (o fecha estimada) : <?php echo $this->viajes[0]['fecha_nac']?> 
</p>
</span>
</font></font>
</p>

<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">
<span lang="es-CL">Chip registro nacional de mascotas o animales de compañía : <?php echo $this->viajes[0]['n_chip']?> 
</p>
</span>
</font></font>
</p>

<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<br></br>
<br></br>
<br></br>
</p>
<p class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">      __________________________________</font></font></p>
<p class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">      
             FIRMA Y TIMBRE</font></font></p>
<p class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">              
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">      
              MEDICO VETERINARIO</font></font></p>              
<br>
<p lang="es-ES" class="western" align="justify" style="margin-bottom: 0cm; line-height: 150%">
<font face="Arial, sans-serif"><font size="4" style="font-size: 14pt">
<span lang="es-CL">Fecha de emisión: <?php echo $this->viajes[0]['fecha']?> 
</p>
</span>
</font></font>
</p>

<div class="printContainer no-print" onclick="prin();">
    <a class="prin"><img src="https://img.icons8.com/ios/50/000000/print.png"></a>
</div>