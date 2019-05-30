<?php
class Main extends Controller{

    function __construct()
    {
        parent::__construct();
        $this->view->render('main/index');
        //echo 'controller main';
    }

    function saludo(){

        //echo "ahora si saludo";
    }
}


?>