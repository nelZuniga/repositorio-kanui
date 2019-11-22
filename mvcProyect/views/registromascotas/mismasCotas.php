<?php require 'views/sidemenu.php' ?>
<style>
    .tablaBusqueda tr th {
        color: white;
        background-color: #059485;
    }

    #muestra {
        height: auto;
        max-width: 150px;
    }

    #muestra:hover {
        filter: contrast(250%);
    }
    .btnedita{
        height: 40px;
        width: 40px;
        background-color: #059485;
        position: absolute;
        right: 1;
        margin: 5px;
        border-radius: 20px;
        padding:4px;
    }
    .btnedita:hover{
        filter: brightness(0.9);
    }
</style>
<script>
    $(document).ready(function() {
        buscar() ;
    }); //fin document ready

    function getRaza() {
        var url = "<?php echo constant('URL') ?>registromascotas/getRaza";
        var parametrosajax = {
            tipo: $("#mascota").val()
        }
        $.ajax({
            url: url,
            type: "post",
            data: parametrosajax,
            success: function(data) {
                //console.log(data);
                $("#raza_id").empty();
                $("#raza_id").append("<option value=''>Seleccione una raza</option>");
                $("#raza_id").append(data);
            },
            error: function() {
                alert("error");
            }
        });
    }


    function getSexo() {
        var url = "<?php echo constant('URL') ?>registromascotas/getSexo";
        $.ajax({
            url: url,
            success: function(data) {
                //console.log(data);
                $("#sexoM").empty();
                $("#sexoM").append("<option value=''>Seleccione sexo mascota</option>");
                $("#sexoM").append(data);
            },
            error: function() {
                alert("error");
            }
        });
    }

    function getTipo() {
        var url = "<?php echo constant('URL') ?>registromascotas/getTipo";
        $.ajax({
            url: url,
            success: function(data) {
                //console.log(data);
                $("#mascota").empty();
                $("#mascota").append("<option value=''>Seleccione un tipo de mascota</option>");
                $("#mascota").append(data);
            },
            error: function() {
                alert("error");
            }
        });
    }

    function busqueda(valor) {
        $("#busqueda").empty();
        switch (valor) {
            case '1':
                var input = "<input type='text' placeholder='Ingrese nombre' id='bnombre'> <input type='text' id='bapellido' placeholder='Ingrese apellido'>"
                input += "<button type='button' onclick='buscar(1)'>Buscar</button>";
                $("#busqueda").append(input);;
                break;
            case '2':
                var input = "<input type='text' id='bdocumento' placeholder='ingrese documento'>";
                input += "<button type='button' onclick='buscar(2)'>Buscar</button>";
                $("#busqueda").append(input);;
                break;
        }
    }

    function buscar() {
                var url = "<?php echo constant('URL') ?>registromascotas/getmascotas";
                var parametrosajax = {
                    id: <?php echo $_SESSION['id_usr']?>
                }
                $.ajax({
                    url: url,
                    type: "post",
                    data: parametrosajax,
                    success: function(response) {
                        $("#Mascotas").empty();
                        if(response == '[]'){
                            var tabla = '<div class="container" style="padding-top:50">';
                            tabla += '<div class="row">';
                            tabla += '<div class="col-md-12">';
                            tabla += '<img src="<?php echo constant('URL') ?>public/img/logo-2kanui.png" width="400" >';
                            tabla += '<div class="col-md-12" align="center"><h3>Ups!, No se ha encontrado ninguna mascota, Puede agregar una mascota aquí</h3></div>';
                            tabla += '<div class="col-md-12" align="center"><button type="submit" class="btn btn-verde" name="aceptar" style="margin-right:20px" onclick="agregar()" ><img src="<?php echo constant('URL').'views/imagenes/iconos/paw.png' ?>" width="24" >Agregar mascota</button></div>';
                            tabla += '</div>';
                            tabla += '</div>';
                            $("#Mascotas").append(tabla);
                        }else{
                        response = JSON.parse(response);
                        var tabla = '<div class="container">';

                        $.each(response.data.mascotas, function(key, value) {
                            //console.log(value);
                            tabla +='<div class="col-md-2">';
                            tabla +='<div class="card" style="width: 13rem;" align="center">';
                            tabla += '<div align="center" class="btnedita"><a href="<?php echo constant('URL') ?>edicionmascota/editarmascota/'+value[0]+'"><img src="<?php echo constant('URL').'views/imagenes/iconos/Pencil_32px.png' ?>" ></a></div>';
                            if(value[8]== ""){
                                tabla +='<img class="card-img-top" src="<?php echo constant('URL') ?>public/img/pata.png" alt="Card image cap" width="150">';
                            }else{
                                tabla +='<img class="card-img-top" src="'+value[8]+'" alt="Card image cap" width="150">';
                            }
                            tabla +='<div class="card-body">';
                            tabla +='<p class="card-text">Nombre: '+value[1]+'</p>';
                            tabla +='<p class="card-text">Raza: '+value[3]+'</p>';
                            tabla +='<p class="card-text">Observaciones: '+value[7]+'</p>';
                            tabla +='</div>';
                            tabla +='</div>';
                            tabla +='</div>';
                        })
                        tabla += '</div>';
                        $("#Mascotas").append(tabla);
                        }
                    },
                    error: function() {
                        alert("error");
                    }
                });
    }

    function enviar(id, nombre, apellidoP, apellidoM, documento) {
        $("#rutDueno").val(documento);
        $("#nomusu").val(nombre);
        $("#apepat").val(apellidoP);
        $("#apemat").val(apellidoM);
        $("#id_usr").val(id);
        $("#registrar").slideDown();;

    }

    function agregar(){
        window.location.href = "<?php echo constant('URL') ?>registromascotas/mismascotas";
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#muestra').attr('src', e.target.result);
            }
            reader.onloadend = function() {
                $("#baseimg").val(reader.result)
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    function getColor() {
        var url = "<?php echo constant('URL') ?>registromascotas/getColor";
        $.ajax({
            url: url,
            success: function(data) {
                console.log(data);
                $("#color_id").empty();
                $("#color_id").append("<option value=''>Seleccione color de la mascota</option>");
                $("#color_id").append(data);
            },
            error: function() {
                alert("error");
            }
        });
    }

    function getPatron() {
        var url = "<?php echo constant('URL') ?>registromascotas/getPatron";
        $.ajax({
            url: url,
            success: function(data) {
                console.log(data);
                $("#patron_id").empty();
                $("#patron_id").append("<option value=''>Seleccione patrón de color</option>");
                $("#patron_id").append(data);
            },
            error: function() {
                alert("error");
            }
        });
    }
</script>

<div style="padding: 0;padding-right: 21px;">
    <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
    <h1>Mis mascotas</h1>
    <hr>
    <div id="Mascotas"></div>
    <?php require 'views/footer.php' ?>