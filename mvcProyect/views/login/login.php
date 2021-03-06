
<!--NEL PRUEBA-->
<?php require 'views/header1.php';?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script>
  $(document).ready(function(){
    $("#BotonLogin").click(function(){
      log();
    });

  });
var usuarioid = '';
  function log(){
    var url = "<?php echo constant('URL')?>login/Login";
      var parametrosajax = {
        usr: $("#username").val(),
        pss: $("#password").val()
      };
      
      $.ajax({
              url:url,
              data: parametrosajax,
              type: 'post',
              success: function(data){
                if( data.toString() == "false"){
                  Swal.fire(
                    'Inicio de sesion',
                    'Usuario y/o Contraseña incorrecta',
                    'error'
                  )
                }else{
                  data = JSON.parse(data);
                      if(data[1] == 0){
                      Swal.fire(
                      'Inicio de sesion',
                      'Debes confirmar tu correo electronico para continuar',
                      'error'
                    )
                  }else{
                    usuarioid = data[0]
                    start();
                  }
                }
                    },
              error: function(){
                  alert("error");
                    }
                });

  }
  function start(){
    var url = "<?php echo constant('URL')?>login/iniciarsession";
      var parametrosajax = {
        int: usuarioid
      };
      if(usuarioid !== ''){
      $.ajax({
              url:url,
              data: parametrosajax,
              type: 'post',
              success: function(data){
                Swal.fire({
                  title: "Inicio de sesión",
                  text:'Bienvenido',
                  type: 'success'
                }).then((result) => {
                  if (result.value) {
                    window.location.href = "<?php echo constant('URL')?>home";
                  }
                })

                    },
              error: function(){
                  alert("error");
                    }
                });
              }
  }
  </script>
<br><br>
<div align="center">
  <h2>BIENVENIDO A KANUI</h2>
  <p>Sistema integrado de gestión de mascotas de compañía</p>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#ModalLogin">
    Iniciar sesión
  </button>
  <a class="btn btn-gris" href="<?php echo constant('URL') ?>register" role="button">
    Registrarse
  </a>

<!-- ModalLogin -->
  <div class="modal fade" id="ModalLogin">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <!-- Cabecera de formulario -->
        <div class="modal-header">
          <h4 class="modal-title">Ingrese sus datos</h4>
        </div>
	        <!-- Formulario de inicio de sesión -->
    	    <div class="modal-body">
  				<div class="col-lg-12">
					<form id="login-form" action="http://localhost/repositorio-kanui/mvcProyect" method="post" role="form" style="display: block;">
						<div class="form-group">
							<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Usuario" value="">
						</div>
						<div class="form-group">
							<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6 col-sm-offset-3">
									<input type="button" name="BotonLogin" id="BotonLogin" tabindex="3" class="btn btn-verde" value="Iniciar sesión">
								</div>
								<div class="col-sm-6 col-sm-offset-3">
									<button type="button" class="btn btn-gris" tabindex="4" data-dismiss="modal">Cancelar</button>
								</div>								
							</div>
						</div>
					</form>
				  </div>
        	</div>
    	<div id="respuesta"></div>
        
        <!-- Pie del Formulario -->
        <div class="modal-footer">
          <button type="button" class="btn btn-gris-largo" data-toggle="modal" data-target="#ModalRecupera">Recuperar contraseña</button>

        </div>
        
      </div>
    </div>
  </div>

  <!-- ModalRecupera Contraseña-->
  <div class="modal fade" id="ModalRecupera">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Cabecera de formulario -->
        <div class="modal-header">
          <h4 class="modal-title">Recuperar contraseña</h4>
        </div>
        <!-- Formulario de recuperar contraseña mediante correo electrónico -->
        <div class="modal-body">
          <div class="col-lg-12">
            <form id="login-form" method="post" role="form" style="display: block;">
              <div class="form-group">
                <input type="email" name="correo" id="correo" tabindex="1" class="form-control" placeholder="Ingrese su dirección de correo" value="">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                    <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#ModalRecuperaCorrecto">Confirmar</button>  

                    <!-- <input type="submit" name="BotonRecuperar" id="BotonRecuperar" tabindex="1" class="btn btn-verde" value="Confirmar"> -->
                  </div>
                  <div class="col-sm-6 col-sm-offset-3">
                    <button type="button" class="btn btn-gris" tabindex="4" data-dismiss="modal">Cancelar</button>
                  </div>                
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ModalRecupera -->  

<!-- ModalRecuperaCorrecto-->
  <div class="modal fade" id="ModalRecuperaCorrecto">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Cabecera de formulario -->
        <!-- Formulario de recuperar contraseña mediante correo electrónico -->
        <div class="modal-body">
          <div class="col-lg-12">
            <div class="alert alert-info alert-dismissible">
              <strong>Se envió la recuperación a su correo indicado!</strong> Presione <a href="<?php echo constant('URL')?>" class="alert-link">aquí</a> para continuar.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ModalRecuperaCorrecto -->  

<br><br><br><br><br>
<?php require 'views/footer.php'?>
  <script>
$( document ).ready(function() {
    $('#ModalLogin').modal('toggle')
});
</script>
</body>
</html>    