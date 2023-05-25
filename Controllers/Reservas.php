<?php 
class Reservas extends Controller {
    public function __construct()
    {
        session_start();
        parent::__construct();
    }  
    public function index()
    {
        $this->views->getView($this, "index");
    }
    public function buscarNumero($num)
    {
        $data = $this->model->getCuNum($num);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
}

?>