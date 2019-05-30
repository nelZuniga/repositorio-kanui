<?php

class NuevoModel extends Model{

    public function __construct()
    {
        parent::__construct();
    }


    public function insert(){
        //insertar data
        echo "insertodata";
        /* aca se ejecuta la consulta de la base de datos y se retornan datos segun sea la utilidad 
        Recordar crear la conexion, los datos estan en libs/database ahi se pueden modificar
        para cargar en vista (select) se debe agregar la funcion antes del render()*/
    }
}
?>