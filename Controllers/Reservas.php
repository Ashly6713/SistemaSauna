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
    public function ingresar()
    {
        date_default_timezone_set('America/La_Paz');
        $id = $_POST['id'];
        $datos = $this->model->getCuartos($id);
        $precio = $datos['precio_hora'];
        $fecha_compra = date('d-m-Y');
        $hora_inicio = $_POST['hora_inicio'];
        $cantidad = $_POST['cantidad'];
        $hora_fin = date('H:i',strtotime ( '+'.$cantidad.' minute' , strtotime ($hora_inicio) )) ;
        $cuarto_id = $datos['id'];
        $usuario_id = $_SESSION['id'];
        
        //$comprobar = $this->model->consultarDetalle('detalle_temp',$cuarto_id, $usuario_id);
        if(empty($comprobar)){
            //calcular total
            $preTot =  ($cantidad/60)*$precio;
            $rPreTot = round($preTot,2);
            $decimal = $rPreTot - floor($rPreTot);
            if($decimal == 0.0 || $decimal == 0.50 ){
                $sub_total =  $rPreTot;
            }else{
                if($decimal > 0.50 ){
                $sub_total =floor($rPreTot)+1;
                } else{
                    $sub_total =floor($rPreTot);
                }
            }
            //fin
            $data = $this->model->registrarDetalle($precio, $fecha_compra, $hora_inicio, $hora_fin, $cantidad, $sub_total/*, $cliente_id*/, $cuarto_id, $usuario_id);
            if($data == 'ok'){
                $msg = array('msg'=>'Cuarto ingresado a la reserva', 'icono'=> 'success');
            } else{
                $msg = array('msg'=>'Error al ingresar cuarto a la reserva', 'icono'=> 'error');
            }
        } else {
            //$total_cantidad = $comprobar['cantidad'] +$cantidad;
        }
    }
}

?>