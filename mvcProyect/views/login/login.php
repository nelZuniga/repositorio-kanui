
<!--NEL PRUEBA-->
 <?php require 'views/header.php';?>
<div class="container" align="center">
  <h2>BIENVENIDO A KANUI</h2>
  <p>Sistema Itegrado de Gestión de Mascotas de Compañía y </p>
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
            <form id="form-registro"  method="post" role="form" style="display: block;">
              <div class="form-group">
                <input type="text" name="nombres" id="nombres" tabindex="1" class="form-control" placeholder="Nombres" value="">
              </div>
              <div class="form-group">
                <input type="text" name="apellido_paterno" id="apellido_paterno" tabindex="2" class="form-control" placeholder="Apellido Paterno" value="">
              </div>
              <div class="form-group">
                <input type="text" name="apellido_materno" id="apellido_materno" tabindex="3" class="form-control" placeholder="Apellido Materno" value="">
              </div>              
              <div class="form-group">
                <select class="form-control" id="tipo_documento" tabindex="4" >
                  <option>Seleccione tipo de documento</option>
                  <option>Pasaporte</option>
                  <option>DNI</option>
                  <option>RUT</option>
                </select>
              </div>
              <div class="form-group">
                <input type="text" name="documento" id="documento" tabindex="5" class="form-control" placeholder="Ingrese Número Documento" value="">
              </div>          
              <div class="form-group">
                <input type="text" name="direccion" id="direccion" tabindex="6" class="form-control" placeholder="Ingrese Dirección Particular"<value="">
              </div>
              <div class="form-group">
                <select class="form-control" id="comuna" tabindex="7" >
                  <option>Seleccione Comuna</option>
                  <option>Rancagua</option>
                  <option>Codegua</option>
                  <option>Coinco</option>
                  <option>Coltauco</option>
                </select>
              </div>              
              <div class="form-group">
                <input type="email" name="correo" id="correo" tabindex="8" class="form-control" placeholder="Correo electronico" value="">
              </div>
              <div class="form-group">
                <input type="password" name="password" id="password" tabindex="9" class="form-control" placeholder="Contraseña">
              </div>
              <div class="form-group">
                <input type="password" name="confirm-password" id="confirm-password" tabindex="10" class="form-control" placeholder="Confirmar contraseña">
              </div>
              <div class="form-group">
                <div class="row">
                  <div class="col-sm-6 col-sm-offset-3">
                    <button type="button" class="btn2 btn btn-success" data-toggle="modal" data-target="#ModalRegistroCorrecto">Crear Cuenta</button>                    
                    <!-- <input type="submit" name="register-submit" id="register-submit" tabindex="11" class="form-control btn2 btn-success" value="Crear cuenta"> -->
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


  <!-- ModalRegistroCorrecto-->
  <div class="modal fade" id="ModalRegistroCorrecto">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Cabecera de formulario -->
        <!-- Formulario de recuperar contraseña mediante correo electrónico -->
        <div class="modal-body">
          <div class="col-lg-12">
            <div class="alert alert-info alert-dismissible">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong>Registro Satisfactorio!</strong> Presione <a href="http://localhost/GitHub/repositorio-kanui/mvcProyect/login1.php" class="alert-link">aquí</a> para continuar.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ModalRecupera -->  

</body>
</html>
