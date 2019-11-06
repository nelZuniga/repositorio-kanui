<?php require 'views/sidemenu.php' ?>
<html lang="en">

<head>

    <script>
        $(document).ready(function() {
            function getRegiones() {
                var url = "<?php echo constant('URL') ?>registroUsuario/getRegion";
                $.ajax({
                    url: url,
                    success: function(data) {
                        //console.log(data);
                        $("#region_id").empty();
                        $("#region_id").append("<option value=''>Seleccione Una Region</option>");
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
            var valorpass2 = $("#pass").val();
            if (valorpass == valorpass2) {
                compass = true
            }
            console.log(compass);
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
            console.log(comprobado);
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
                    $("#comuna_id").append("<option value=''>Seleccione Una Comuna</option>");
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
                    console.log(data);
                    $("#rol_id").empty();
                    $("#rol_id").append("<option value=''>Seleccione un Rol de Usuario</option>");
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
                            'Atencion',
                            'El correo ya se encuentra registrado el en sistema',
                            'error'
                        ).then(function(){
                            $("#correo").focus();
                            //$("#correo").val('');
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
                                <label for="ApellidoP_id" class="control-label col-md-3">Apellido Paterno</label>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <label for="apellidoM_id" class="control-label col-md-3">Apellido Materno</label>
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
                                <label for="rol" class="control-label col-md-5" id="rol" name="rol">Rol de Usuario</label>
                            </div>
                            <div class="row col-md-12">
                                <input type="text" class="form-control col-md-4 rut" id="txtrut" name="Drut" placeholder="Ingrese Rut Ej. 11222333k" pattern="\d{3,8}-[\d|kK]{1}" required>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <select class="form-control col-md-4" id="rol_id" name="rol_id" required>
                                    <option value=''>Seleccione un Rol de Usuario</option>
                                </select>
                            </div>
                            <BR>
                            <!-- Correo -->
                            <!-- telefono -->
                            <div class="row col-md-12">
                                <label for="correo" class="control-label col-md-4">Correo</label>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <label for="telefono_id" class="control-label col-md-4">Telefono</label>
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
                                    <option value=''>Seleccione Una Comuna</option>
                                </select>
                            </div>
                            <BR>
                            <!-- contraseña-->
                            <!-- repetir contraseña-->
                            <div class="row col-md-12">
                                <label for="pass2" class="control-label col-md-5">Contraseña</label>
                                <label for="espaciados" class="control-label col-md-1"></label>
                                <label for="pass2" class="control-label col-md-5">Repita su Contraseña</label>
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


    </body>

</html>