

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
  
  .circulo {
    transition: opacity 1s, visibility 1.3s;
    width: 150px;
    height: auto;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
    background: #059485;
    
}

</style>
<script>
  $(document).ready(function(){
    $(".icon_menu").mouseenter(function(){
      showmenu(1);
    });
    $(".icon_menu").mouseleave(function(){
      showmenu(2);
    });
  })

  function showmenu(input){
    console.log(input);
    if(input == 1){
      $(".hid_menu_izq").toggle("slow");
      $(".icm").toggleClass("circulo");
      $("#iconousr").attr("src","../mvcProyect/views/imagenes/User_64pxbl.png");
      $("#iconoperro").attr("src","../mvcProyect/views/imagenes/Doge_64pxbl.png");
      $("#iconojer").attr("src","../mvcProyect/views/imagenes/Syringe_64pxbl.png");
    }else{
      $(".hid_menu_izq").toggle("slow");
      $(".icm").toggleClass("circulo");
      $("#iconousr").attr("src","../mvcProyect/views/imagenes/User_64px.png");
      $("#iconoperro").attr("src","../mvcProyect/views/imagenes/Doge_64px.png");
      $("#iconojer").attr("src","../mvcProyect/views/imagenes/Syringe_64px.png");
    }
    
  }
  </script>
<div style="padding: 0;padding-right: 21px;" align="center">
  <BR>
  <img src="<?php echo constant('URL') ?>public/img/logo-2kanui.png" width="150" align="middle">
  <HR />
  <h1>BIENVENIDO A KANUI.</h1>
  <h2>Sistema integrado de gestión de mascotas de compañía.</h2>

</div>



<?php require 'views/footer.php'?>
    
</body>
</html>