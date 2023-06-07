<?php 
class RepEc extends Controller {
    public function __construct()
    {
        session_start();
        parent::__construct();
    }  
    public function index()
    {
       //$data = $this->model->getEmpresa();
        $this->views->getView($this, "index");
    }
    
}

?>