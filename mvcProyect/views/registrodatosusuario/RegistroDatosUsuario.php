
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" href="http://localhost/mvcproyect/public/css/main.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <?php require 'views/header.php'; ?>

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
            
            $("#aceptar").click(function(){
                event.preventDefault();
                if(comprobar()){
                    console.log("comprueba")
                    $("#nuevousuario").attr('action',"<?php echo constant('URL') ?>registroUsuario/nuevoUsuario");
                    $("#nuevousuario").submit();
                }
            });
        }); //fin document ready

        function comprobar(){
            var comprobado = false;
            var compass = false;
            var valorpass = $("#pass").val();
            var valorpass2 = $("#pass").val();
            if( valorpass == valorpass2){
                compass = true
            }
            if(compass){
                comprobado = true;
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
                    $("#comuna_id").append("<option value=''>Seleccione Una Comuna</option>");
                    $("#comuna_id").append(data);
                },
                error: function() {
                    alert("error");
                }
            });
        }

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
            if(seguridad <= 10){
                $("#seguridad").empty();
                $("#seguridad").append("muy leve");
                $("#pass2").attr("readonly", true)
            }else if(seguridad <= 30){
                $("#seguridad").empty();
                $("#seguridad").append("leve");
                $("#pass2").attr("readonly", true)
            }else if(seguridad <= 39){
                $("#seguridad").empty();
                $("#seguridad").append("moderada");
                $("#pass2").attr("readonly", false)
            }else if(seguridad <= 59){
                $("#seguridad").empty();
                $("#seguridad").append("Buena");
                $("#pass2").attr("readonly", false)
            }else if(seguridad >= 60){
                $("#seguridad").empty();
                $("#seguridad").append("Muy Buena");
                $("#pass2").attr("readonly", false)
            }
            return seguridad
        }
    </script>
</head>


<body>



    <body>

        <div class="container">
            <div class="row" style="margin-top:5%">
                <div class="col-md-12" align="center">
                    <h3><img src="views/imagenes/registro_usuario.png" alt="rdu" style="width:300px;"></h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <form method="POST" onsubmit="comprobar()" name="nuevousuario" id="nuevousuario">

                        <div class="form-group">
                            <!-- nombres -->
                            <label for="nombres_id" class="control-label">Nombres</label>
                            <input type="text" class="form-control letras" id="txtnombre" name="Dnombres" placeholder="Ingese su nombre" required>
                        </div>

                        <div class="form-group">
                            <!-- apellido paterno -->
                            <label for="ApellidoP_id" class="control-label">Apellido Paterno</label>
                            <input type="text" class="form-control" id="txtapellidoP" name="DapellidoP" placeholder="Ingese su apellido paterno" required>
                        </div>

                        <div class="form-group">
                            <!-- apellido materno -->
                            <label for="apellidoM_id" class="control-label">Apellido Materno</label>
                            <input type="text" class="form-control" id="txtapellidoM" name="DapellidoM" placeholder="Ingese su apellido materno" required>
                        </div>

                        <div class="form-group">
                            <!-- rut -->
                            <label for="txtrut" class="control-label">Rut</label>
                            <input type="text" class="form-control rut" id="txtrut" name="Drut" placeholder="Ingrese Rut" pattern="\d{3,8}-[\d|kK]{1}" required>
                        </div>

                        <div class="form-group">
                            <!-- Correo -->
                            <label for="correo" class="control-label">Correo</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ingese su E-mail" required>
                        </div>

                        <div class="form-group">
                            <!-- telefono -->
                            <label for="telefono_id" class="control-label">Telefono</label>
                            <input type="text" class="form-control numeros" id="txttelefono" name="Dtelefono" placeholder="988888888" required>
                        </div>


                        <div class="form-group">
                            <!-- direccion-->
                            <label for="street2_id" class="control-label">Direccion</label>
                            <input type="text" class="form-control" id="txtdireccion" name="Ddireccion" placeholder="Ingrse su direccion" required>
                        </div>


                        <div class="form-group">
                            <!-- cuidad-->
                            <label for="ciudad_id" class="control-label">Ciudad</label>
                            <input type="text" class="form-control" id="txtciudad" name="Vciudad" placeholder="Ingrese su ciudad" required>
                        </div>

                        <div class="form-group">
                            <!-- combo region -->
                            <label for="region_id" class="control-label" id="region" name="region">Region</label>

                            <select class="form-control" id="region_id" name="region_id" onchange='getComuna()' required>
                            </select>
                        </div>

                        <div class="form-group">
                            <!-- combo comuna -->
                            <label for="comuna_id" class="control-label" id="Comuna" name="comuna">Comuna</label>
                            <select class="form-control" id="comuna_id" name="comuna_id" required>
                                <option value=''>Seleccione Una Comuna</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <!-- contraseña-->
                            <label for="pass2" class="control-label">Contraseña</label>
                            <input type="password" class="form-control" id="pass" name="pass" placeholder="Cree su contraseña" onkeyup="seguridad_clave(this)" required>
                            seguridad de contraseña: <span id="seguridad"></span>
                        </div>
                        <div class="form-group">
                            <!-- repetir contraseña-->
                            <label for="pass2" class="control-label">Repita su Contraseña</label>
                            <input type="password" class="form-control" id="pass2" name="pass2" placeholder="Repita contraseña" readonly required>
                        </div>


                        <table>
                            <tr>
                                <th>
                                    <div class="col-md-12" align="center"><button class="btn btn-verde">Cancelar</button></div>
                </div>
                </th>
                <th></th>
                <th>
                    <div class="col-md-12" align="center"><button class="btn btn-verde" id="aceptar" name="aceptar">Aceptar</button></div>
                </th>
                </tr>
                </table>

                </form>
            </div>


            </form>

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