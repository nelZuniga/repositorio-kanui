<?php require 'views/sidemenu.php' ?>

<div style="padding: 0;padding-right: 21px;">
  <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
  <h1>Edicion de Usuarios</h1>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h5>Datos de usuario.</h5>
      </div>
      <div class="col-md-3"></div>
    </div>
  </div>

  <div class="container-fluid mascotas" id="mascotas" style="margin-top:20px">
    <div class="col-md-12">
      <form method="POST" onsubmit="comprobar()" name="nuevousuario" id="nuevousuario" action="<?php echo constant('URL') ?>registroUsuario/actualizaUsuario">
        <input type="hidden" name="tusr" value="2">
        <input type="hidden" name="id_usr" id="id_usr">
        <div class="form-group col-md-12">
          <!-- nombres -->
          <!-- apellido paterno -->
          <!-- apellido materno -->
          <div class="row col-md-12">
            <label for="nombres_id" class="control-label col-md-3">Nombres</label>
            <label for="espaciados" class="control-label col-md-1"></label>
            <label for="ApellidoP_id" class="control-label col-md-3">Apellido Paterno</label>
            <label for="espaciados" class="control-label col-md-1"></label>
            <label for="apellidoM_id" class="control-label col-md-3">Apellido Materno</label>
          </div>
          <div class="row col-md-12">
            <input type="text" class="form-control letras col-md-3" id="txtnombre" name="Dnombres" placeholder="Ingese su nombre" required value="<?php echo $_SESSION['nombres'] ?>">
            <label for="espaciados" class="control-label col-md-1"></label>
            <input type="text" class="form-control col-md-3" id="txtapellidoP" name="DapellidoP" placeholder="Ingese su apellido paterno" required value="<?php echo $_SESSION['apellido_paterno'] ?>">
            <label for="espaciados" class="control-label col-md-1"></label>
            <input type="text" class="form-control col-md-3" id="txtapellidoM" name="DapellidoM" placeholder="Ingese su apellido materno" required value="<?php echo $_SESSION['apellido_materno'] ?>">
          </div>
          <BR>
          <!-- rut -->
          <div class="row col-md-12">
            <label for="txtrut" class="control-label col-md-3">Rut</label>
            <label for="espaciados" class="control-label col-md-1"></label>
            <label for="rol" class="control-label col-md-6" id="rol" name="rol">Correo electrónico</label>
          </div>
          <div class="row col-md-12">
            <input type="text" class="form-control col-md-3 rut" id="txtrut" name="Drut" placeholder="Ingrese Rut Ej. 11222333k" pattern="\d{3,8}-[\d|kK]{1}" required value="<?php echo $_SESSION['documento'] ?>">
            <label for="espaciados" class="control-label col-md-1"></label>
            <input type="email" class="form-control col-md-6" id="correo" name="correo" placeholder="Ingese su E-mail" onblur="checkCorreo(this)" required value="<?php echo $_SESSION['correo'] ?>">
          </div>
          <BR>
          <!-- Correo -->
          <!-- telefono -->
          <div class="row col-md-12">
            <label for="correo" class="control-label col-md-4">Teléfono</label>
          </div>
          <div class="row col-md-12">
            <input type="email" class="form-control col-md-4" id="correo" name="correo" placeholder="Ingese su teléfono" placeholder="988888888" required value="<?php echo $_SESSION['cel'] ?>">
            <label for="espaciados" class="control-label col-md-1"></label>
          </div>
          <BR>
          <!-- direccion-->
          <!-- cuidad-->
          <div class="row col-md-12">
            <label for="street2_id" class="control-label col-md-5">Direccion</label>
            <label for="espaciados" class="control-label col-md-1"></label>
          </div>
          <div class="row col-md-12">
            <input type="text" class="form-control col-md-8" id="Ddireccion" name="Ddireccion" placeholder="Ingrse su direccion" required value="<?php echo $_SESSION['direccion'] ?>">
            <label for="espaciados" class="control-label col-md-1"></label>
          </div>
          <BR>
          <!-- combo region -->
          <!-- combo comuna -->
          <div class="row col-md-12">
            <label for="region_id" class="control-label col-md-5" id="region" name="region">Región</label>
            <label for="espaciados" class="control-label col-md-1"></label>
            <label for="comuna_id" class="control-label col-md-5" id="Comuna" name="comuna">Comuna</label>
          </div>
          <div class="row col-md-12">
            <select class="form-control col-md-5" id="region_id" name="region_id" onchange='getComuna(this.value)' required>
            </select>
            <label for="espaciados" class="control-label col-md-1"></label>
            <select class="form-control col-md-5" id="comuna_id" name="comuna_id" required>
              <option value=''>Seleccione Una Comuna</option>
            </select>
          </div>
          <BR>


        </div>
        <center>
          <table>
            <tr>
              <th>
                <div class="col-md-12" align="center">
                  <button class="btn btn-verde" id="aceptar" name="aceptar">Aceptar</button>

                </div>
              </th>
              <th>
              </th>
              <th>
                <div class="col-md-12" align="center">
                  <button class="btn btn-verde">Cancelar</button>
                </div>
              </th>
            </tr>
          </table>
        </center>
    </div>
    </form>
  </div>

</div>
</div>
<!-- ModalRecupera -->
<?php require 'views/footer.php' ?>

</body>

</html>