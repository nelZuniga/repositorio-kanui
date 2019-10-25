
<?php
class Impresiones extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('impresiones/consulta');
    }

    function consulta(){
        $this->view->render('impresiones/consulta');
    }
}
?>
