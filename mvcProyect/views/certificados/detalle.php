<?php require 'views/sidemenu.php' ?>
<?php 
//var_dump($this->mascota);
?>

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
                    <div class="col-md-12"><button class="btn btn-verde">Certificado 1</button></div>
                </div>

                <div class="row" style="margin:20px">
                    <div class="col-md-12"><button class="btn btn-verde">Certificado 1</button></div>
                </div>

                <div class="row" style="margin:20px">
                    <div class="col-md-12"><button class="btn btn-verde">Certificado 1</button></div>
                </div>

                <div class="row" style="margin:20px">
                    <div class="col-md-12"><button class="btn btn-verde">Certificado 1</button></div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php require 'views/footer.php' ?>