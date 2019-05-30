<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>error</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <?php require 'views/header.php';?>


    <div id="main">
    <h1 class='center error'><?php echo $this->mensaje; ?> </h1>
    </div>
    

    <?php require 'views/footer.php'?>

</body>
</html>