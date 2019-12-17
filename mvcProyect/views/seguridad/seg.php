

<?php require 'views/sidemenu.php'?>
<style>
  .menu_izq{
    margin-top:3%; 
    float: left; 
    height: 100vh; 
    position:absolute;
    z-index:100;
    width:50px;
    background-color: white;
  }
  .menu_izq:hover{
    margin-top:3%; 
    float: left; 
    height: 100vh; 
    position:absolute;
    z-index:100;
    width:100px;
    background-color: white;
  }

  .hid_menu_izq{
    display: none;
  }
  


@keyframes click-wave {
  0% {
    height: 40px;
    width: 40px;
    opacity: 0.35;
    position: relative;
  }
  100% {
    height: 200px;
    width: 200px;
    margin-left: -80px;
    margin-top: -80px;
    opacity: 0;
  }
}

.option-input {
  -webkit-appearance: none;
  -moz-appearance: none;
  -ms-appearance: none;
  -o-appearance: none;
  appearance: none;
  position: relative;
  right: 0;
  bottom: 0;
  left: 0;
  height: 40px;
  width: 40px;
  transition: all 0.15s ease-out 0s;
  background: #cbd1d8;
  border: none;
  color: #fff;
  cursor: pointer;
  display: inline-block;
  margin-right: 0.5rem;
  outline: none;
  position: relative;
  z-index: 1000;
}
.option-input:hover {
  background: #9faab7;
}
.option-input:checked {
  background: #40e0d0;
}
.option-input:checked::before {
  height: 40px;
  width: 40px;
  position: absolute;
  content: '✔';
  display: inline-block;
  font-size: 26.66667px;
  text-align: center;
  line-height: 40px;
}
.option-input:checked::after {
  -webkit-animation: click-wave 0.65s;
  -moz-animation: click-wave 0.65s;
  animation: click-wave 0.65s;
  background: #40e0d0;
  content: '';
  display: block;
  position: relative;
  z-index: 100;
}


</style>

<div style="padding: 0;padding-right: 21px;"> 
<h1>Seguridad</h1>
<hr>
<em>Nos preocupa tu Seguridad, pero sabemos tambien que quieres libertad, Puedes elegir los datos que vera la persona que escanee tu mascota.</em>
</div>
<form class="form-horizontal" method="post" action="<?php echo constant('URL') ?>seguridad/setSeg">
<input type="hidden" name="id_usr" id="id_usr" value="<?php echo $_SESSION['id_usr'];?>"> 
<div class="container">
    <div class="row">
        <div class="col-md-12" align="center"><h3>Datos a Mostrar</h3></div>
    </div>
    
    <?php foreach ($this->campos as $r => $valor) : ?>

    <?php 
    if(isset($this->valores[$valor['id_mustr']-1]['val'])){
        $value =$this->valores[$valor['id_mustr']-1]['val'];
    } else {
        $value = 0;
    }
    
    ?>
            <div class="row" style="margin-top:10px; margin-bottom:10px">
                <div class="col-md-6 " align="right">
                    <h4><?php echo $valor['campo']; ?></h4>
                </div>
                <div class="col-md-1" align="center">
                    <input class="option-input checkbox" type="checkbox" name="<?php echo $valor['id_mustr']; ?>" <?php if($value == 1){echo "checked='true'";} ?> >
                </div>
                <div class="col-md-5"></div>
            </div>
    <?php endforeach; ?>


    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4" align="center">
            
        <button type="submit" class="btn btn-verde">Aceptar</button>
        </div>
        <div class="col-md-4"></div>
    </div>
</div>
</form>


<?php require 'views/footer.php'?>
    
</body>
</html>