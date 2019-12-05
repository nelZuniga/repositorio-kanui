<?php
class certificados extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('certificados/index');
    }

    function certificadosdetalle($param = null){
        $idmascot = $param[0];
        $mascota = [];
        $mascota = $this->model->getCardMascota($idmascot);
        $this->view->mascota = $mascota;
        $this->view->render('certificados/detalle');
    }
}

?>