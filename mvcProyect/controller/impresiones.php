
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

    function consulta($param = 0){
        $id_proc= $param[0];
        $atencion = [];
        $atencion = $this->model->getHistorialMascota($id_proc);
        $this->view->atencion = $atencion;
        $this->view->render('impresiones/consulta');
    }

    function inscripcion($param = 0){
        $id_proc= $param[0];
        $atencion = [];
        $atencion = $this->model->getHistorialMascota($id_proc);
        $this->view->atencion = $atencion;
        $this->view->render('impresiones/inscripcion');
    }

    function vacunas($param = 0){
        $id_proc= $param[0];
        $atencion = [];
        $atencion = $this->model->getHistorialMascota($id_proc);
        $this->view->atencion = $atencion;
        $this->view->render('impresiones/vacunas');
    }

}
?>
