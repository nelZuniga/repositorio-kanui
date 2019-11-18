<?php require 'views/sidemenu.php' ?>

<html lang="en">

<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            function getRegiones() {
                var url = "<?php echo constant('URL') ?>registroUsuario/getRegion";
                $.ajax({
                    url: url,
                    success: function(data) {
                        //console.log(data);
                        $("#region_id").empty();
                        $("#region_id").append("<option value=''>Seleccione una region</option>");
                        $("#region_id").append(data);
                    },
                    error: function() {
                        alert("error");
                    }
                });
            }
            getRegiones();

            
        }); //fin document ready

        function comprobar() {
            var comprobado = false;
            var compass = false;
            var valorpass = $("#pass").val();
            var valorpass2 = $("#pass2").val();
            if (valorpass == valorpass2) {
                comprobado = true
            }
            if(!comprobado){
                Swal.fire(
                            'Atencion',
                            'Las contraseñas no coinciden',
                            'error'
                        ).then(function(){
                            $("#pass2").val('')
                            $("#pass2").addClass('is-invalid');
                        })
            }else{
                $("#pass2").removeClass('is-invalid');
                $("#pass2").addClass('is-valid');
            }
            return comprobado;
        }

        function getComuna() {
            //console.log("asdadsd");
            var url = "<?php echo constant('URL') ?>registroUsuario/getComuna";
            var reg = $("#region_id").val();
            var parametrosajax = {
                region: reg
            }
            $.ajax({
                url: url,
                data: parametrosajax,
                type: 'post',
                success: function(data) {
                    //$("#comuna_id").append(data);
                    $("#comuna_id").empty();
                    $("#comuna_id").append("<option value=''>Seleccione una comuna</option>");
                    $("#comuna_id").append(data);
                },
                error: function() {
                    alert("error");
                }
            });
        }

        function getRol() {
            var url = "<?php echo constant('URL') ?>registroUsuario/getRol";
            $.ajax({
                url: url,
                success: function(data) {
                    //console.log(data);
                    $("#rol_id").empty();
                    $("#rol_id").append("<option value=''>Seleccione un rol de usuario</option>");
                    $("#rol_id").append(data);
                },
                error: function() {
                    alert("error");
                }
            });
        }
        getRol();

        var numeros = "0123456789";

        function tiene_numeros(texto) {
            for (i = 0; i < texto.length; i++) {
                if (numeros.indexOf(texto.charAt(i), 0) != -1) {
                    return 1;
                }
            }
            return 0;
        }

        var letras = "abcdefghyjklmnñopqrstuvwxyz";

        function tiene_letras(texto) {
            texto = texto.toLowerCase();
            for (i = 0; i < texto.length; i++) {
                if (letras.indexOf(texto.charAt(i), 0) != -1) {
                    return 1;
                }
            }
            return 0;
        }

        function tiene_minusculas(texto) {
            for (i = 0; i < texto.length; i++) {
                if (letras.indexOf(texto.charAt(i), 0) != -1) {
                    return 1;
                }
            }
            return 0;
        }

        var letras_mayusculas = "ABCDEFGHYJKLMNÑOPQRSTUVWXYZ";

        function tiene_mayusculas(texto) {
            for (i = 0; i < texto.length; i++) {
                if (letras_mayusculas.indexOf(texto.charAt(i), 0) != -1) {
                    return 1;
                }
            }
            return 0;
        }



        function seguridad_clave(caja) {
            var clave = caja.value;
            var seguridad = 0;
            if (clave.length != 0) {
                if (tiene_numeros(clave) && tiene_letras(clave)) {
                    seguridad += 30;
                }
                if (tiene_minusculas(clave) && tiene_mayusculas(clave)) {
                    seguridad += 30;
                }
                if (clave.length >= 4 && clave.length <= 5) {
                    seguridad += 10;
                } else {
                    if (clave.length >= 6 && clave.length <= 8) {
                        seguridad += 20;
                    } else {
                        if (clave.length > 8) {
                            seguridad += 30;
                        }
                    }
                }
            }
            if (seguridad <= 10) {
                $("#seguridad").empty();
                $("#seguridad").append("muy leve");
                $("#pass2").attr("readonly", true)
            } else if (seguridad <= 30) {
                $("#seguridad").empty();
                $("#seguridad").append("leve");
                $("#pass2").attr("readonly", true)
            } else if (seguridad <= 39) {
                $("#seguridad").empty();
                $("#seguridad").append("moderada");
                $("#pass2").attr("readonly", false)
            } else if (seguridad <= 59) {
                $("#seguridad").empty();
                $("#seguridad").append("Buena");
                $("#pass2").attr("readonly", false)
            } else if (seguridad >= 60) {
                $("#seguridad").empty();
                $("#seguridad").append("Muy Buena");
                $("#pass2").attr("readonly", false)
            }
            return seguridad
        }

        function checkCorreo(caja) {
            if(caja.value.length == 0 || caja.value== ''){

            }else{
            var url = "<?php echo constant('URL') ?>registroUsuario/checkCorreo";
            var mail = caja.value;
            var parametrosajax = {
                mail: mail
            }
            $.ajax({
                url: url,
                data: parametrosajax,
                type: 'post',
                success: function(data) {
                    if (data != 0) {
                        Swal.fire(
                            'Atención',
                            'El correo ya se encuentra registrado el en sistema',
                            'error'
                        ).then(function(){
                            $("#correo").focus();
                            $("#correo").val('');
                            $("#correo").removeClass('is-valid');
                        $("#correo").addClass('is-invalid');
                        })
                            

                    }else{
                        $("#correo").removeClass('is-invalid');
                        $("#correo").addClass('is-valid');
                    }
                },
                error: function() {
                    alert("error");
                }
            });
            }
        }
    </script>
</head>


<body>

    <body>
        <div class="container">
            <h2>Registro de Usuarios</h2>
            <div class="row">
                <div class="col-md-12"></div>
                <div class="col-md-12">
                    <form method="POST" onsubmit="comprobar()" name="nuevousuario" id="nuevousuario" action="<?php echo constant('URL') ?>registroUsuario/nuevoUsuario">
                        <input type="hidden" name="tusr" value="2">
                        <div class="form-group col-md-12">
                            <!-- nombres -->
                            <!-- apellido paterno -->
                            <!-- apellido materno -->
                            <div class="row col-md-12">
                                <label for="nombres_id" class="control-label col-md-3">Nombres</label>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <label for="ApellidoP_id" class="control-label col-md-3">Apellido paterno</label>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <label for="apellidoM_id" class="control-label col-md-3">Apellido materno</label>
                            </div>
                            <div class="row col-md-12">
                                <input type="text" class="form-control letras col-md-3" id="txtnombre" name="Dnombres" placeholder="Ingese su nombre" required>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <input type="text" class="form-control col-md-3" id="txtapellidoP" name="DapellidoP" placeholder="Ingese su apellido paterno" required>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <input type="text" class="form-control col-md-3" id="txtapellidoM" name="DapellidoM" placeholder="Ingese su apellido materno" required>
                            </div>
                            <BR>
                            <!-- rut -->
                            <div class="row col-md-12">
                                <label for="txtrut" class="control-label col-md-4">Rut</label>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <label for="rol" class="control-label col-md-5" id="rol" name="rol">Rol de usuario</label>
                            </div>
                            <div class="row col-md-12">
                                <input type="text" class="form-control col-md-4 rut" id="txtrut" name="Drut" placeholder="Ingrese Rut ej. 11222333k" pattern="\d{3,8}-[\d|kK]{1}" required>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <select class="form-control col-md-4" id="rol_id" name="rol_id" required>
                                    <option value=''>Seleccione un rol de usuario</option>
                                </select>
                            </div>
                            <BR>
                            <!-- Correo -->
                            <!-- telefono -->
                            <div class="row col-md-12">
                                <label for="correo" class="control-label col-md-4">Correo</label>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <label for="telefono_id" class="control-label col-md-4">Teléfono</label>
                            </div>
                            <div class="row col-md-12">
                                <input type="email" class="form-control col-md-4" id="correo" name="correo" placeholder="Ingese su E-mail" onblur="checkCorreo(this)" required>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <input type="text" class="form-control numeros col-md-4" id="txttelefono" name="Dtelefono" placeholder="988888888" required>
                            </div>
                            <BR>
                            <!-- direccion-->
                            <!-- cuidad-->
                            <div class="row col-md-12">
                                <label for="street2_id" class="control-label col-md-5">Direccion</label>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <label for="ciudad_id" class="control-label col-md-5">Ciudad</label>
                            </div>
                            <div class="row col-md-12">
                                <input type="text" class="form-control col-md-5" id="Ddireccion" name="Ddireccion" placeholder="Ingrse su direccion" required>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <input type="text" class="form-control col-md-5" id="txtciudad" name="Vciudad" placeholder="Ingrese su ciudad" required>
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
                                <select class="form-control col-md-5" id="region_id" name="region_id" onchange='getComuna()' required>
                                </select>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <select class="form-control col-md-5" id="comuna_id" name="comuna_id" required>
                                    <option value=''>Seleccione una comuna</option>
                                </select>
                            </div>
                            <BR>
                            <!-- contraseña-->
                            <!-- repetir contraseña-->
                            <div class="row col-md-12">
                                <label for="pass2" class="control-label col-md-5">Contraseña</label>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <label for="pass2" class="control-label col-md-5">Repita su contraseña</label>
                            </div>
                            <div class="row col-md-12">
                                <input type="password" class="form-control col-md-5" id="pass" name="pass" placeholder="Cree su contraseña" onkeyup="seguridad_clave(this)" required>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <input type="password" class="form-control col-md-5" id="pass2" name="pass2" placeholder="Repita contraseña" onblur=comprobar() readonly required>
                            </div>
                            <BR>
                            <div class="row col-md-12">
                                <h4>
                                    Nivel de seguridad de contraseña: <span id="seguridad"></span>
                                </h4>
                            </div>
                        </div>
                        <!-- Inicio de HREF que llama a Modal de Términos y Condiciones -->
                        <HR />                        
                          <div>
                            <input type="checkbox" class="form-check-input" id="chkTC" name="chkTC" required="">
                            <label class="form-check-label" for="chkTC">
                                He leido y aceptado los términos y condiciones. <a data-toggle="modal" href="#ModalTYC">(leer aquí) </a>
                            </label>
                          </div>
                        <HR />  
                        <!-- Término de HREF que llama a Modal de Términos y Condiciones -->
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
                </div>
                </form>
            </div>

            <hr>
        </div>

        </div>

        <div id="respuesta"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-6">



                </div>
            </div>
        </div>


        </div> <!-- del contenedor -->

  <!-- Inicio de Modal de Términos y Condiciones -->
  <div class="modal fade bd-example-modal-lg" id="ModalTYC">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
      
        <!-- Cabecera de formulario -->
        <div class="modal-header">
          <h4 class="modal-title">Información de importancia</h4>
        </div>
        <!-- Formulario de registro de usuario -->
        <div class="modal-body">
          <div class="col-lg-12">

<h2 style="text-align: center;"><strong>Términos y Condiciones de Uso</strong></h2><p>&nbsp;</p><p><strong>INFORMACIÓN RELEVANTE</strong></p><p>Es requisito necesario para el uso y/o adquisición de los productos que se ofrecen en este sitio, que lea y acepte los siguientes Términos y Condiciones que a continuación se redactan. El uso de nuestros servicios así como la compra de nuestros productos implicará que usted ha leído y aceptado los Términos y Condiciones de Uso en el presente documento. Todas los productos y/o servicios &nbsp;que son ofrecidos por nuestro sitio web pudieran ser creadas, cobradas, enviadas o presentadas por una página web tercera y en tal caso estarían sujetas a sus propios Términos y Condiciones. En algunos casos, para adquirir un producto y/o servicio, será necesario el registro por parte del usuario, con ingreso de datos personales fidedignos y definición de una contraseña.</p><p>El usuario puede elegir y cambiar la clave para su acceso de administración de la cuenta en cualquier momento, en caso de que se haya registrado y que sea necesario para la compra de alguno de nuestros productos y/o servicio. Kanui no asume la responsabilidad en caso de que entregue dicha clave a terceros.</p><p>Todas las compras y transacciones que se lleven a cabo por medio de este sitio web, están sujetas a un proceso de confirmación y verificación, el cual podría incluir la verificación del stock y disponibilidad de producto, validación de la forma de pago, validación de la factura (en caso de existir) y el cumplimiento de las condiciones requeridas por el medio de pago seleccionado. En algunos casos puede que se requiera una verificación por medio de correo electrónico.</p><p>Los precios de los productos ofrecidos en esta página es válido solamente en las compras y usos realizadas en este sitio web.</p>
<p>Los usuarios pueden acceder a través del portal a diferente tipo de información y servicios. Kanui se reserva la facultad de modificar, en cualquier momento, y sin aviso previo, la presentación y configuración de la información y servicios ofrecidos desde el portal. El usuario reconoce y acepta expresamente que en cualquier momento el portal pueda interrumpir, desactivar y/o cancelar cualquier información o servicio. Kanui realizará sus mejores esfuerzos para intentar garantizar la disponibilidad y accesibilidad a la web. No obstante, en ocasiones, por razones de mantenimiento, actualización, cambio de ubicación, etc., podrá suponer la interrupción del acceso al portal.</p>

<strong>RESPONSABILIDAD DE KANUI SOBRE LOS CONTENIDOS</strong>

<p>La aplicación y el portal web no interviene en la creación de aquellos contenidos y/o servicios prestados o suministrados por terceras partes en y/o a través de la aplicación, del mismo modo que tampoco controla su licitud. En cualquier caso, no ofrece ninguna clase de garantía sobre los mismos. El usuario reconoce que la aplicación no es ni será responsable de los contenidos y/o servicios prestados o suministrados por terceras partes en y/o a través de la aplicación. El usuario acepta que la aplicación no asumirá responsabilidad alguna por cualquier daño o perjuicio producido como consecuencia de la utilización de esta información o servicios de terceros.</p>

<p>Exceptuando los casos que la Ley imponga expresamente lo contrario, y exclusivamente con la medida y extensión en que lo imponga, la aplicación no garantiza ni asume responsabilidad alguna respecto a los posibles daños y perjuicios causados por el uso y utilización de la información, datos y servicios de la aplicación.</p>

<p>En todo caso, la aplicación y el portal web excluye cualquier responsabilidad por los daños y perjuicios que puedan deberse a la información y/o servicios prestados o suministrados por terceros diferentes de la Empresa. Toda responsabilidad será del tercero ya sea proveedor, colaborador u otro.</p>

<p>La aplicación y el portal web controlará la licitud de aquellos contenidos o servicios prestados a través de la plataforma por terceras partes. En caso de que el usuario como consecuencia de la utilización de la aplicación sufra algún daño o perjuicio podrá comunicarlo y se tomarán las medidas que se estimen oportunas para solventarlo.</p>

<strong>OBLIGACIONES DEL USUARIO</strong>

<p>El usuario deberá respetar en todo momento los términos y condiciones establecidos en el presente aviso legal. De forma expresa, el usuario manifiesta que utilizará el portal de forma diligente y asumiendo cualquier responsabilidad que pudiera derivarse del incumplimiento de las normas.</p>

<p>El usuario se obliga, en aquellos casos que se le soliciten datos o información, a no falsear su identidad haciéndose pasar por cualquier otra persona. El usuario acepta que la utilización del Portal será efectuada con fines estrictamente personales, privados y particulares. El usuario no podrá utilizar el portal para actividades contrarias a la Ley, la moral y el orden público así como para finalidades prohibidas o que vulneren o lesionen derechos de terceros. Asimismo, queda prohibida la difusión, almacenamiento y/o gestión de datos o contenidos que infrinjan derechos de terceros o cualesquiera normativas reguladoras de derechos de propiedad intelectual o industrial.</p>

<p>Así mismo, el usuario no podrá utilizar la apliación y/o el portal para transmitir, almacenar, divulgar promover o distribuir datos o contenidos que sean portadores de virus o cualquier otro código informático, archivos o programas diseñados para interrumpir, destruir o perjudicar el funcionamiento de cualquier programa o equipo informático o de telecomunicaciones.</p>

<p>El usuario se obliga a indemnizar y a mantener indemnes al portal por cualquier daño, perjuicio, sanción, multa, pena o indemnización que tenga que hacer frente el portal.</p>

<p><strong>LICENCIA</strong></p><p>Kanui&nbsp; a través de su sitio web concede una licencia para que los usuarios utilicen&nbsp; los productos y/o servicios que son vendidos u ofrecidos en este sitio web de acuerdo a los Términos y Condiciones que se describen en este documento.</p><p><strong>USO NO AUTORIZADO</strong></p><p>En caso de que aplique (para venta de software, templates, u otro producto de diseño y programación) usted no puede colocar uno de nuestros productos y/o servicios, modificado o sin modificar, en un CD, sitio web o ningún otro medio y ofrecerlos para la redistribución o la reventa de ningún tipo.</p><p><strong>PROPIEDAD</strong></p><p>Usted no puede declarar propiedad intelectual o exclusiva a ninguno de nuestros productos, modificado o sin modificar. Todos los productos son propiedad &nbsp;de los proveedores del contenido. En caso de que no se especifique lo contrario, nuestros productos se proporcionan&nbsp; sin ningún tipo de garantía, expresa o implícita. En ningún caso esta compañía será &nbsp;responsables de ningún daño incluyendo, pero no limitado a, daños directos, indirectos, especiales, fortuitos o consecuentes u otras pérdidas resultantes del uso o de la imposibilidad de utilizar nuestros productos.</p><p><strong>POLÍTICA DE REEMBOLSO Y GARANTÍA</strong></p><p>En el caso de productos que sean&nbsp; mercancías irrevocables no-tangibles, no realizamos reembolsos después de que se envíe el producto, usted tiene la responsabilidad de entender antes de comprarlo. &nbsp;Le pedimos que lea cuidadosamente antes de comprarlo. Hacemos solamente excepciones con esta regla cuando la descripción no se ajusta al producto. Hay algunos productos que pudieran tener garantía y posibilidad de reembolso pero este será especificado al comprar el producto. En tales casos la garantía solo cubrirá fallas de fábrica y sólo se hará efectiva cuando el producto se haya usado correctamente. La garantía no cubre averías o daños ocasionados por uso indebido. Los términos de la garantía están asociados a fallas de fabricación y funcionamiento en condiciones normales de los productos y sólo se harán efectivos estos términos si el equipo ha sido usado correctamente. Esto incluye:</p><p>– De acuerdo a las especificaciones técnicas indicadas para cada producto.<br>– En condiciones ambientales acorde con las especificaciones indicadas por el fabricante.<br>– En uso específico para la función con que fue diseñado de fábrica.<br>– En condiciones de operación eléctricas acorde con las especificaciones y tolerancias indicadas.</p><p><strong>COMPROBACIÓN ANTIFRAUDE</strong></p><p>La compra del cliente puede ser aplazada para la comprobación antifraude. También puede ser suspendida por más tiempo para una investigación más rigurosa, para evitar transacciones fraudulentas.</p><p><strong>PRIVACIDAD</strong></p><p>Este <a href="http://zerodev.cl/mvcProyect/" target="_blank">sitio web</a> zerodev.cl y la aplicación garantiza que la información personal que usted envía cuenta con la seguridad necesaria. Los datos ingresados por usuario o en el caso de requerir una validación de los pedidos no serán entregados a terceros, salvo que deba ser revelada en cumplimiento a una orden judicial o requerimientos legales.</p><p>La suscripción a boletines de correos electrónicos publicitarios es voluntaria y podría ser seleccionada al momento de crear su cuenta.</p><p>Kanui reserva los derechos de cambiar o de modificar estos términos sin previo aviso.</p>


          </div>
        </div>
        <!-- Pie de Modal de Términos y Condiciones -->
        <div class="modal-footer">
          <button type="button" class="btn btn-gris" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
<!-- Fin de Modal de Términos y Condiciones -->
    </body>

</html>