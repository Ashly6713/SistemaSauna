<?php 
class Reservas extends Controller {
    public function __construct()
    {
        session_start();
        parent::__construct();
    }  
    public function index()
    {
        $data = $this->model->getClientes();
        $this->views->getView($this, "index", $data);
    }
    public function buscarCi($ci)
    {
        $data = $this->model->getCi($ci);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
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
        $cliente_id = $_POST['id_cli'];
        $datos = $this->model->getCuartos($id);
        $id_producto = $datos['id'];
        $precio = $datos['precio_hora'];
        $hora_inicio = $_POST['hora_inicio'];
        $cantidad = $_POST['cantidad'];
        $hora_fin = date('H:i',strtotime ( '+'.$cantidad.' minute' , strtotime ($hora_inicio) )) ;
        $cuarto_id = $datos['id'];
        $usuario_id = $_SESSION['id'];
         
         $comprobar = $this->model->consultarDetalle($cuarto_id, $usuario_id);
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
         if(empty($comprobar)){
                $data = $this->model->registrarDetalle($precio, $hora_inicio, $hora_fin, $cantidad, $sub_total, $cliente_id, $cuarto_id, $usuario_id);
                if($data == 'ok'){
                    $msg = array('msg'=>'Cuarto ingresado a la reserva', 'icono'=> 'success');
                } else{
                    $msg = array('msg'=>'Error al ingresar cuarto a la reserva', 'icono'=> 'error');
                }
         } else {
            $data = $this->model->actualizarDetalle($precio, $hora_inicio, $hora_fin, $cantidad, $sub_total, $cliente_id, $cuarto_id, $usuario_id);
                if($data == 'modificado'){
                    $msg = array('msg'=>'Registro de cuarto modificado', 'icono'=> 'success');
                } else{
                    $msg = array('msg'=>'Error al modificar', 'icono'=> 'error');
                }
        }
       
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function listar()
    {
    $id_usuario = $_SESSION['id'];
    $data['detalle'] = $this->model->getDetalle($id_usuario);
    $data['total_pagar'] = $this->model->calcularReserva( $id_usuario);
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
    die();
    }
    public function delete(int $id)
    {
       $data =  $this->model->deleteDelete($id);
       if($data == 'ok'){
            $msg = array('msg'=>'Cuarto eliminado', 'icono'=> 'success');
        } else{
            $msg = array('msg'=>'Error eliminar cuarto', 'icono'=> 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function registrarReserva($cliente_id){
        date_default_timezone_set('America/La_Paz');
        $fecha_compra = date('Y-m-d');
        $usuario_id = $_SESSION['id'];
        $detalle= $this->model->getDetalle($usuario_id);
       $total = $this->model->calcularReserva($usuario_id); 
       $data = $this->model->registraReserva($fecha_compra, $total['total'], $cliente_id, $usuario_id);
       if($data == 'ok'){
            $reserva_id = $this->model->id_reserva();
            foreach($detalle as $row){
                $precio = $row['precio'];
                $hora_inicio = $row['hora_inicio'];
                $hora_fin = $row['hora_fin'];
                $cantidad = $row['cantidad'];
                $sub_total = $row['sub_total'];
                $cuarto_id = $row['cuarto_id'];
                $this->model->registrarDetalleReserva($precio, $hora_inicio, $hora_fin, $cantidad, $sub_total, $cuarto_id, $reserva_id['id']);
            }
            $msg = array('msg'=>'Reserva generada', 'icono'=> 'success');
        } else{
            $msg = array('msg'=>'Error al generar Reserva', 'icono'=> 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    }   

}

?>