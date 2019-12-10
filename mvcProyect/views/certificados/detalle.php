<?php require 'views/sidemenu.php' ?>
<?php 
//var_dump($this->mascota);
?>
<script>
    function printInscripcion(valor) {
    var pagina = '<?php echo constant('URL') ?>impresiones/inscripcion/'+valor;
        Swal.fire({
            html: '<iframe src="' + pagina + '" width="800" height="800"></iframe>',
            width:800,
            padding:0,
            height:800,
            showConfirmButton: false
        })
    }

    function printCarne(valor) {
    var pagina = '<?php echo constant('URL') ?>impresiones/vacunas/'+valor;
        Swal.fire({
            html: '<iframe src="' + pagina + '" width="800" height="800"></iframe>',
            width:800,
            padding:0,
            height:800,
            showConfirmButton: false
        })
    }

    function printDeclaracion(valor) {
    var pagina = '<?php echo constant('URL') ?>impresiones/declaracion/'+valor;
        Swal.fire({
            html: '<iframe src="' + pagina + '" width="800" height="800"></iframe>',
            width:800,
            padding:0,
            height:800,
            showConfirmButton: false
        })
    }    

    function printViajes(valor) {
    var pagina = '<?php echo constant('URL') ?>impresiones/viajes/'+valor;
        Swal.fire({
            html: '<iframe src="' + pagina + '" width="800" height="800"></iframe>',
            width:800,
            padding:0,
            height:800,
            showConfirmButton: false
        })
    }     
</script>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
        <h1>Certificados</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div id="centro">
        <div class="card" style="width: 18rem;">
        <img src="<?php echo $this->mascota['imgMascota'] ?>" class="card-img-top" alt="...">
        <div class="card-body">
            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="container">
                <div class="row" style="margin:20px">
                    <div class="col-md-12"><button class="btn btn-verde" onclick="printInscripcion('<?php echo $this->mascota['id_mascot'] ?>')">Certificado de inscripcion</button></div>
                </div>

                <div class="row" style="margin:20px">
                    <div class="col-md-12"><button class="btn btn-verde" onclick="printCarne('<?php echo $this->mascota['id_mascot'] ?>')">Carnet de vacunas</button></div>
                </div>

                <div class="row" style="margin:20px">
                    <div class="col-md-12"><button class="btn btn-verde" onclick="printDeclaracion('<?php echo $this->mascota['id_mascot'] ?>')">Declaración simple</button></div>
                </div>

                <div class="row" style="margin:20px">
                    <div class="col-md-12"><button class="btn btn-verde"onclick="printViajes('<?php echo $this->mascota['id_mascot'] ?>')">Certificado de viajes</button></div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php require 'views/footer.php' ?>