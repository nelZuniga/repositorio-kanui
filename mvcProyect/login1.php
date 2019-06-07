<html>
<head>
	<title>BIENVENIDO - SISTEMA INTEGRADO DE GESTION</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="CSS/css.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" align="center">
  <h2>BIENVENIDO A KANUI</h2>
  <p>Sistema integrado de gestión de mascotas de compañía y </p>
  <!-- Button to Open the Modal -->
  <button type="button" class="btn2 btn btn-success" data-toggle="modal" data-target="#ModalLogin">
    Iniciar Sesión
  </button>
  <button type="button" class="btn2 btn btn-secondary" data-toggle="modal" data-target="#ModalRegistro">
    Registrarse
  </button>

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
					<form id="login-form" action="http://phpoll.com/login/process" method="post" role="form" style="display: block;">
						<div class="form-group">
							<input type="text" name="username" id="username" tabindex="1" class="form-control" placeholder="Usuario" value="">
						</div>
						<div class="form-group">
							<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6 col-sm-offset-3">
									<input type="submit" name="BotonLogin" id="BotonLogin" tabindex="3" class="form-control btn2 btn-success" value="Iniciar sesión">
								</div>
								<div class="col-sm-6 col-sm-offset-3">
									<button type="button" class="btn btn2 btn-secondary" tabindex="4" data-dismiss="modal">Cancelar</button>
								</div>								
							</div>
						</div>
					</form>
				  </div>
        	</div>
    	
        
        <!-- Pie del Formulario -->
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ModalRecupera">Recuperar Contraseña</button>
        </div>
        
      </div>
    </div>
  </div>

  <!-- ModalRegistro -->
  <div class="modal fade" id="ModalRegistro">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Cabecera de formulario -->
        <div class="modal-header">
          <h4 class="modal-title">Complete el formulario de registro</h4>
        </div>
        <!-- Formulario de registro de usuario -->
        <div class="modal-body">
          <div class="col-lg-12">
            <form id="register-form" action="http://phpoll.com/register/process" method="post" role="form" style="display: block;">
              <div class="form-group">
                <input type="text" name="rut" id="rut" tabindex="1" class="form-control" placeholder="Ingrese RUT 12345678-9" value="">
              </div>
              <div class="form-group">
                <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Correo electronico" value="">
              </div>
              <div class="form-group">
                <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Contraseña">
              </div>
              <div class="form-group">
                <input type="password" name="confirm-password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirmar contraseña">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                    <input type="submit" name="register-submit" id="register-submit" tabindex="4" class="form-control btn2 btn-success" value="Crear cuenta">
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn2 btn-secondary" data-dismiss="modal">Cerrar</button>
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
            <form id="login-form" action="http://localhost" method="post" role="form" style="display: block;">
              <div class="form-group">
                <input type="email" name="correo" id="correo" tabindex="1" class="form-control" placeholder="Ingrese su dirección de correo" value="">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                    <input type="submit" name="BotonRecuperar" id="BotonRecuperar" tabindex="1" class="form-control btn2 btn-success" value="Confirmar">
                  </div>
                  <div class="col-sm-6 col-sm-offset-3">
                    <button type="button" class="btn btn2 btn-secondary" tabindex="4" data-dismiss="modal">Cancelar</button>
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




</body>
</html>
