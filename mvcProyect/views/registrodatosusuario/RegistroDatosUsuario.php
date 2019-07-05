
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


    <script>
        $(document).ready(function(){

            function getRegiones(){
                var url = "<?php echo constant('URL')?>registroUsuario/getRegion";
                $.ajax({
                    url:url,
                    success: function(data){
                        
                        $("#respuesta").append(data);
                        
                        //data = JSON.parse(data);
                        data = "["+data+"]";
                        objeto = JSON.stringify(data);
                        dataObject = JSON.parse(objeto);
                        console.log(dataObject)
                        for (i in dataObject){
                            console.log(dataObject[i].id_reg);
                            console.log(i);
                        }
                        $("#region_id").empty();
                        $("#region_id").append("<option value=''>Seleccione Una Region</option>");
                        
                    },
                    error: function(){
                        alert("error");
                    }
                });
            }
            getRegiones();


        });//fin document ready
    </script>
</head>
<body>
    
<?php require 'views/header.php';?>
<body>
    
<div class="container">
<div class="row" style="margin-top:5%">
<div class="col-md-12">
<h3 class="center" >Registro Datos Usuarios</h3>
</div>
</div>
    <div class="row">
        <div class="col-md-6">
<form method="POST" action="<?php echo constant('URL')?>registroUsuario/nuevoUsuario">

    <div class="form-group"> <!-- nombres -->
        <label for="nombres_id" class="control-label">Nombres</label>
        <input type="text" class="form-control letras" id="txtnombre" name="Dnombres" placeholder="Juan Andres">
    </div>    

    <div class="form-group"> <!-- apellido paterno -->
        <label for="ApellidoP_id" class="control-label">Apellido Paterno</label>
        <input type="text" class="form-control" id="txtapellidoP" name="DapellidoP" placeholder="Silva">
    </div>                    
                            
    <div class="form-group"> <!-- apellido materno -->
        <label for="apellidoM_id" class="control-label">Apellido Materno</label>
        <input type="text" class="form-control" id="txtapellidoM" name="DapellidoM" placeholder="Cuevas">
    </div>    
    
    <div class="form-group"> <!-- rut -->
        <label for="rut_id" class="control-label">Rut</label>
        <input type="text" class="form-control rut" id="txtrut" name="Drut" placeholder="Ingrese Rut" pattern="\d{3,8}-[\d|kK]{1}">
    </div>    

    <div class="form-group"> <!-- telefono -->
        <label for="telefono_id" class="control-label">Telefono</label>
        <input type="text" class="form-control numeros" id="txttelefono" name="Dtelefono" placeholder="988888888">
    </div>    


    <div class="form-group"> <!-- direccion-->
        <label for="street2_id" class="control-label">Direccion</label>
        <input type="text" class="form-control" id="txtdireccion" name="Ddireccion" placeholder="Avenida Rancagua 129, esquina riesco">
    </div>    


    <div class="form-group"> <!-- cuidad-->
        <label for="ciudad_id" class="control-label">Ciudad</label>
        <input type="text" class="form-control" id="txtciudad" name="Vciudad" placeholder="Rancagua">
    </div>                                    
                            
    <div class="form-group"> <!-- combo region -->
        <label for="region_id" class="control-label" id="region" name="region">Region</label>
        <select class="form-control" id="region_id" name="region_id">
        </select>                    
    </div>
    
    <div class="form-group"> <!-- combo comuna -->
        <label for="comuna_id" class="control-label" id="Comuna" name="comuna">Comuna</label>
        <select class="form-control" id="comuna_id">
            <option value="RA">Rancagua</option>
            <option value="CG">Codegua</option>
            <option value="CI">Coinco</option>
            <option value="GR">Graneros</option>
            <option value="SA">Santiago</option>
            <option value="PR">Providencia</option>
            <option value="LF">La Florida</option>
            <option value="MH">Machali</option>
            <option value="MU">Maule</option>
        </select>                    
    </div>


    
        <table>
    <tr>
    <th><div class="col-md-12" align="center"><button class="btn btn-verde">Cancelar</button></div>
    </div> 
    </th>
    <th></th>
    <th>
    <div class="col-md-12" align="center"><button class="btn btn-verde">Aceptar</button></div> 
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