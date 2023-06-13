<?php 
class Reservas extends Controller {
    public function __construct()
    {
        session_start();
        parent::__construct();
    }  
    public function index()
    {
        $data['categorias'] = $this->model->getCategorias();
        $data['clientes']= $this->model->getClientes();
        $this->views->getView($this, "index", $data);
    }
    public function historial()
    {
        $data['clientes']= $this->model->getClientes();
        $this->views->getView($this, "historial", $data);
    }
    public function buscarCi($ci)
    {
        $data = $this->model->getCi($ci);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function buscarNumero($id)
    {
        $data = $this->model->getCuNum($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function ingresar()
    {
        date_default_timezone_set('America/La_Paz');
        $id = $_POST['id'];
        $cliente_id = $_POST['id_cli'];
        $datos = $this->model->getCuartos($id);
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
               // $this->model->actualizarDisponibilidad($cuarto_id);
            }
            $vaciar = $this->model->vaciarDetalle($usuario_id);
            if($vaciar == 'ok'){
                $msg =  array('msg'=>'ok', 'icono'=> 'success', 'id_reserva'=> $reserva_id['id']);
            }
        } else{
            $msg = array('msg'=>'Error al generar Reserva', 'icono'=> 'error');
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
    } 
    public function listar_reservas()
    {
        $data = $this->model->getHistorialReservas();
        for ($i = 0; $i < count($data); $i++){
            $data[$i]['acciones'] = '<div>
            <a class="btn btn-danger" href="'. base_url."Reservas/generarPdf/".$data[$i]['id'].'" terget="_blank"><i class="fas fa-file-pdf"></i></a>
            </div>';
        }
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function generarPdf($id_reserva)
    {
        $empresa = $this->model->getEmpresa();
        
        $cuartos = $this->model->getCuReserva($id_reserva);
        $cliente_id = $cuartos[0]['cliente_id'];
        $cliente = $this->model->getCliReserva($cliente_id);
        $Date= strtotime($cuartos[0]['fecha_compra']);
        $Fecha =  date("d-m-Y", $Date);
        
        require('Libraries/fpdf/fpdf.php');
        
        $pdf = new FPDF('P','mm', array(80,100));//array ancho y alto
        $pdf->AddPage();
        $pdf->SetMargins(5, 0, 0);
        $pdf->SetTitle('Reporte Compra');
        $pdf->SetFont('Arial','B',13);
        $pdf->Cell(60,10, utf8_decode($empresa['nombre']), 0, 1, 'C');
        $pdf->Image(base_url . 'Assets/img/log.png', 53, 17, 18, 19);// , tamaño, atura, 25*25 
        $pdf->SetFont('Arial','B',6);
        $pdf->Cell(11, 5, 'NIT: ', 0, 0, 'L');
        $pdf->SetFont('Arial','',6);
        $pdf->Cell(20, 5, $empresa['nit'], 0, 1, 'L');

        $pdf->SetFont('Arial','B',6);
        $pdf->Cell(11, 5, utf8_decode('Teléfono: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',6);
        $pdf->Cell(20, 5, $empresa['telefono'], 0, 1, 'L');
        
        $pdf->SetFont('Arial','B',6);
        $pdf->Cell(11, 5, utf8_decode('Dirección: '), 0, 0, 'L');
        $pdf->SetFont('Arial','',6);
        $pdf->Cell(20, 5, $empresa['direccion'], 0, 1, 'L');

        $pdf->SetFont('Arial','B',6);
        $pdf->Cell(11, 5, 'Ticket:', 0, 0, 'L');
        $pdf->SetFont('Arial','',6);
        $pdf->Cell(32, 5, $id_reserva, 0, 0, 'L');
        $pdf->SetFont('Arial','B',6);
        $pdf->Cell(11, 5, 'Fecha:', 0, 0, 'L');
        $pdf->SetFont('Arial','',6);
        $pdf->Cell(20, 5, $Fecha, 0, 1, 'L');

        //Encabezado Cliente
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(15, 5, 'C. I.', 0, 0, 'L', true);
        $pdf->Cell(37, 5, 'Nombre', 0, 0, 'L', true);
        $pdf->Cell(15, 5, 'Telefono', 0, 1, 'L', true);

        $pdf->SetTextColor(0,0,0);
        $pdf->Cell(15, 5, $cliente['ci'], 0, 0, 'L');
        $pdf->Cell(37, 5,utf8_decode( $cliente['nombre'].' '.$cliente['apellido']), 0, 0, 'L');
        $pdf->Cell(15, 5, $cliente['telefono'], 0, 0, 'L');
        $pdf->Ln();

        //Encabezado Cuartos
        $pdf->SetFillColor(0,0,0);
        $pdf->SetTextColor(255,255,255);
        $pdf->Cell(9, 5, 'Cuarto', 0, 0, 'L', true);
        $pdf->Cell(12, 5, 'Categoria', 0, 0, 'L', true);
        $pdf->Cell(11, 5, 'Hr. Inicio', 0, 0, 'L', true);
        $pdf->Cell(11, 5, 'Hr. Fin', 0, 0, 'L', true);
        $pdf->Cell(13, 5, 'Precio hora', 0, 0, 'L', true);
        $pdf->Cell(11, 5, 'Sub Total', 0, 1, 'L', true);
        $pdf->SetTextColor(0,0,0);
        $total = 0.00;
        foreach($cuartos as $row) {
            $total = $total + $row['sub_total'];
            $pdf->Cell(9, 5, $row['numero'], 0, 0, 'L');
            $pdf->Cell(12, 5, $row['nombre'], 0, 0, 'L');
            $pdf->Cell(11, 5, $row['hora_inicio'], 0, 0, 'L');
            $pdf->Cell(11, 5, $row['hora_fin'], 0, 'L');
            $pdf->Cell(13, 5, $row['precio_hora'], 0, 0, 'L');
            $pdf->Cell(11, 5, number_format($row['sub_total'], 2, '.', ','), 0, 1, 'L');
        }
        $pdf->Ln();
        $pdf->SetFont('Arial','B',6);
        $pdf->Cell(68, 3,'Total a pagar', 0, 1, 'R');
        $pdf->SetFont('Arial','',6);
        $pdf->Cell(68, 5, number_format($total, 2, '.', ',').' Bs.', 0, 1, 'R');
        $pdf->Output();
    } 
    
    public function disponibles()
    {
        $hora_inicio = $_POST['hora_inicio'];
        $cantidad = $_POST['cantidad'];
        $hora_fin = date('H:i',strtotime ( '+'.$cantidad.' minute' , strtotime ($hora_inicio) )) ;
        $categoria = $_POST['categoria'];
        $data = $this->model->getDisponibles($categoria, $hora_inicio, $hora_fin);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
    }
    public function actualizar()
    {
        $data1 = $this->model->actualizarDisponibles();
        if($data1 == 'ok'){
             $msg = array('msg'=>'Actualizado', 'icono'=> 'success');
         } else{
             $msg = array('msg'=>'Error al actualizar', 'icono'=> 'error');
         }
         echo json_encode($msg, JSON_UNESCAPED_UNICODE);
         die();
    }
    public function actualizarNo()
    {
        $data2 = $this->model->actualizarNoDisponibles();
        if( $data2 !='error'){
             $msg = array('msg'=> $data2, 'icono'=> 'success');
         } else{
             $msg = array('msg'=>'Error No disponibles', 'icono'=> 'error');
         }
         echo json_encode($msg, JSON_UNESCAPED_UNICODE);
         die();
    }

}

?>