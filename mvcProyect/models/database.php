
<?php
class Database
{
    public static function StartUp()
    {
        $pdo = new PDO('mysql:host=zerodev.cl;dbname=cze45021_kanui;charset=utf8mb4', 'cze45021', 'ULZ@tCO3tTc(MwI');
        $pdo-&gt;setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}
?>

define('URL', 'http://localhost/Tesis/repositorio-kanui/repositorio-kanui/mvcProyect/');

//constantes para cadena de conexion
define('HOST','zerodev.cl');
define('DB','cze45021_kanui');
define('USER','cze45021');
define('PASSWORD','ULZ@tCO3tTc(MwI');
define('CHARSET','utf8mb4');
define('PORT','2082');


define('API_KEY','3d524a53c110e4c22463b10ed32cef9d');