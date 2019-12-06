<?php foreach ($this->atencion as $r => $valor) : 
endforeach; ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo constant('URL') ?>CSS/css.css"> 
    
    <script src="http://code.jquery.com/jquery-1.10.0.min.js"></script>
<script>
    function cerrarmodal(){
        parent.cerrarmodal();
    }
    $(document).ready(function(){
        $('#formprint input').attr('readonly', 'readonly');
        $('#formprint textarea').attr('readonly', 'readonly');
    });

    function prin(){
        window.print();
    }
</script>
<div class="contenedor" style="padding: 0;padding-right: 21px;">
    <!--<img src="views/imagenes/registro_mascota.png" alt="rdu" style="width:300px;">-->
    <h1>Registro de Atención de Mascotas</h1>

    <div id="registrar" class="row" style="padding: 15px;">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post" id="formprint">
                    <input type="hidden" id="idmascot" name="idmascot" value="<?php echo  isset($this->mascota['id_mascot'])?>">
                    <div class="container">

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <h3>Datos de la mascota y dueño<h3>
                            </div>
                            <div class="col-md-6 form-group" align="center">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group"><label for="chipID">Chip Identificador</label><br><input id="chipId" readonly name="chipId" type="text" placeholder="Chip identificador" class="form-control" value="<?php echo $valor['n_chip']?>">
                            </div>
                            <div class="col-md-6 form-group"><label for="nombreM">Nombre de mascota</label><br><input id="nombreM" readonly name="nombreM" type="text" placeholder="Ingrese Nombre" class="form-control" value="<?php echo $valor['nombre'] ?>"></div>
                        </div>
                        <div class="row">
                            <div class="col-md-4 form-group"><label for="tipoM">Tipo de mascota</label><br><input id="tipoM" readonly name="tipoM" type="text" placeholder="Tipo de Mascota" class="form-control" value="<?php echo $valor[2]?>"></div>
                            <div class="col-md-4 form-group"><label for="razaM">Raza de mascota</label><br><input id="razaM" readonly name="razaM" type="text" placeholder="Raza de Mascota" class="form-control" value="<?php echo $valor[3] ?>"></div>
                            <div class="col-md-4 form-group"><label for="fnacM">Fecha de Nacimiento</label><br><input id="fnacM" readonly name="fnacM" type="text" placeholder="Fecha de Nacimiento" class="form-control" value="<?php echo $valor[4] ?>"></div>
                        </div>

                        <div class="row">
                            <div class="col-md-4  form-group"><label for="doctoD">Documento Dueño</label><br><input id="doctoD" readonly name="doctoD" type="text" placeholder="Documento Dueño" class="form-control" value="<?php echo $valor[5]  ?>">
                            </div>
                            <div class="col-md-8  form-group"><label for="nombreD">Nombre Dueño</label><br><input id="nombreD" readonly name="nombreD" type="text" placeholder="Nombre Dueño" class="form-control" value="<?php echo $valor[6] ?>">
                            </div>
                            <div class="col-md-12 form-group"><label for="observacionM">Observaciones</label><br>
                                <textarea readonly class="form-control" id="observacionM" name="observacionM" placeholder="Sin Observaciones" rows="2"><?php echo $valor[7] ?></textarea>

                            </div>
                        </div>

                    </div>
                    <div class="container">
                    <div class="row">
                        <div class="col-md-4 form-group"><label for="pesoM">Peso Mascota</label><br><input id="pesoM" name="pesoM" type="text" placeholder="Ingrese Peso Actual" class="form-control" required="" value="<?php echo $valor[8] ?>">
                        </div>
                        <div class="col-md-4 form-group"><label for="id_vac">Vacuna</label><br>
                            <input type="text" class="form-control" id="id_vac" name="id_vac" value="<?php echo $valor[9] ?>">
                        </div>
                        <div class="col-md-4 form-group"><label for="dosis">Dosis</label><br><input id="dosis" name="dosis" type="text" placeholder="Ingrese Dosis" class="form-control" required="" value="<?php echo $valor[10] ?>">
                        </div>
                        <div class="col-md-6 form-group"><label for="FechaPA">Próxima Atención</label><br>
                            <div>
                                <input id="FechaPA" name="FechaPA" type="text" placeholder="Fecha Próxima Atención" class="form-control" value="<?php echo $valor[11] ?>">
                            </div>
                        </div>
                        <div class="col-md-4 form-group"><label for="id_control">Tipo de Control</label><br>
                            <input type="text" class="form-control" id="id_control" name="id_control" value="<?php echo $valor[12] ?>">
                        </div>
                        <div class="col-md-12 form-group"><label for="observacionA">Observaciones</label><br>
                            <textarea class="form-control" id="observacionA" name="observacionA" placeholder="Ingrese Observaciones de Atención" rows="5"><?php echo $valor[13] ?></textarea>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-8 offset-md-2 form-group" style="text-align:center">
                            <button type="button" class="btn btn-verde" onclick="cerrarmodal()">Cancelar</button>
                        </div>
                    </div>
                    </div>
            </div>


            </form>
        </div>
    </div>
</div>


</div>
<style>
.printContainer{
    position: absolute;
    margin-top: 15px;
    height: 50px;
    /* width: 50px; */
    font-size: 40px;
    top: 0;
    right: 15;
    border-radius: 15px;
}
.prin{
    position: fixed;
    right: 50;
    border-radius: 30px;
    height: 60px;
    width: 60px;
    text-align: center;
    padding-top: 4px;
}
.prin:hover{
    background-color:gray;
}
.contenedor{
    margin-top:10px;
    margin-left: 10px;
}
@media print
{    
    .no-print, .no-print *
    {
        display: none !important;
    }
    .contenedor{
    margin-top:20px;
    margin-left: 20px;
}
.contenedor h1{
    text-align: center
}

.btn-verde{
    display: none !important;
}
}
</style>
<div class="printContainer no-print" onclick="prin();"><a class="prin"><img src="https://img.icons8.com/ios/50/000000/print.png"></a></div>