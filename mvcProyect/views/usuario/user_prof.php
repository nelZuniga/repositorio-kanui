<?php require 'views/sidemenu.php'?>
<style>
    body{
        background:
    radial-gradient(#059485 3px, transparent 4px),
    radial-gradient(black 3px, transparent 4px),
    linear-gradient(#fff 4px, transparent 0),
    linear-gradient(45deg, transparent 74px, transparent 75px, #a4a4a4 75px, #a4a4a4 76px, transparent 77px, transparent 109px),
    linear-gradient(-45deg, transparent 75px, transparent 76px, #a4a4a4 76px, #a4a4a4 77px, transparent 78px, transparent 109px),
    #fff;
    background-size: 109px 109px, 109px 109px,100% 6px, 109px 109px, 109px 109px;
    background-position: 54px 55px, 0px 0px, 0px 0px, 0px 0px, 0px 0px;
    }
    .blanco{
        background-color: #fff;
        height: 85vh;
        border-radius:15px;
    }
    p{
        font-style:oblique;
        background-color: #effbf0;
        border-radius: 5px;
    }

</style>

<div class="container-fluid fondo" style="margin-top:5%">
    <div class="row">
        <div class="col-md-6 offset-3 blanco">
            <div class="container">
            <div class="row">
            <div class="col-md-12 text-right">
            <button class="btn btn-verde" onclick="window.location.href= '<?php echo constant('URL') ?>usuario/editar'">Editar</button>
            </div>
        <div class="col-md-12 text-center">
        <?php 
            if($_SESSION['perfil'] !== null && $_SESSION['perfil'] !== ''){
                echo '<img src="'.$_SESSION['perfil'].'" style="margin-top:2%;border-radius: 25rem!important;" >';
            }else{
                echo '<img src="'.constant('URL').'views/imagenes/User_Circle.png" style="margin-top:2%;border-radius: 25rem!important;" >';
            }
        ?>
        
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-left">
            <label>Nombres</label>
            <p><?php echo $_SESSION['nombres'] ?></p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-left"><label>Apellidos</label>
        <p><?php echo $_SESSION['apellido_paterno'] .' '.$_SESSION['apellido_materno'] ?></p></div>
    </div>
    <div class="row">
        <div class="col-md-12 text-left"><label>Tipo de documento</label>
        <p>--</p></div>
    </div>
    <div class="row">
        <div class="col-md-12 text-left"><label>Documento</label>
        <p><?php echo $_SESSION['documento'] ?></p></div>
    </div>
    <div class="row">
        <div class="col-md-12 text-left "><label>Direccion</label>
        <p>--</p></div>
    </div>
            </div>
        </div>
    </div>

</div>

<?php require 'views/footer.php';?>