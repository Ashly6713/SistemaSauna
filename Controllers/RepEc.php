<?php 
class RepEc extends Controller {
    public function __construct()
    {
        session_start();
        if (empty($_SESSION['activo'])) {
            header("location: ". base_url);
        }
        parent::__construct();
    }  
    public function index()
    {
       //$data = $this->model->getEmpresa();
        $this->views->getView($this, "index");
    }
    
}

?>