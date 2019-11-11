<?php
class usuario extends Controller{

    function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('usuario/usuario');
    }
}
?>