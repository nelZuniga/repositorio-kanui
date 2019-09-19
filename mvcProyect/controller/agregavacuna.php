<?php
class Agregavacuna extends Controller{

    function __construct()
    {
        parent::__construct();
        
        //echo 'controller main';
    }
    
    function render(){
        $this->view->render('agregavacuna/index');
    }

    function guardavacuna(){
        $nomvacuna = $_POST['nom_vac'];
        $resp = $this->model->saveVacuna($nomvacuna);

        if($resp){
            echo "<script>window.location.href='".constant('URL')."listatipovacuna';</script>";
        }else{
        }
    }
}
?>