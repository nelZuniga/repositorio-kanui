
<!--NEL PRUEBA-->
<?php require 'views/header1.php';?>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<br><br>
<div align="center">
  <h2>BIENVENIDO A KANUI</h2>
  <p>Sistema integrado de gestión de mascotas de compañía</p>
  <!-- Button to Open the Modal -->
  <a class="btn btn-gris" href="<?php echo constant('URL') ?>login" role="button">
    Iniciar Sesión
  </a>
  <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#ModalRegistro">
    Registrarse
  </button>

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
                <select class="form-control texto-select" id="tipo_documento" tabindex="4" >
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
                <select class="form-control texto-select" id="comuna" tabindex="7" >
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
                    <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#ModalRegistroCorrecto">Crear Cuenta</button>                    
                    <!-- <input type="submit" name="register-submit" id="register-submit" tabindex="11" class="form-control btn2 btn-success" value="Crear cuenta"> -->
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-gris" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


  <!-- ModalRegistroCorrecto-->
  <div class="modal fade" id="ModalRegistroCorrecto">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
      
        <!-- Cabecera de formulario -->
        <!-- Formulario de recuperar contraseña mediante correo electrónico -->
        <div class="modal-body">
          <div class="col-lg-12">
            <div class="alert alert-info alert-dismissible">
              <strong>Registro Satisfactorio!</strong> Presione <a href="http://localhost/repositorio-kanui/mvcProyect" class="alert-link">aquí</a> para continuar.
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ModalRecupera -->  
<br><br><br><br><br>
  <?php require 'views/footer.php'?>
  <script>
    $( document ).ready(function() {
        $('#ModalRegistro').modal('toggle')
    });
  </script>
</body>
</html>    