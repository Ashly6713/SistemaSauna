<?php
class Cuartos extends Controller{
   public function __construct(){
      session_start();
      if(empty( $_SESSION['activo'])){
          header("location:".base_url) ;
      }
      parent:: __construct();
  } 
public function index()
{
    $data['categorias'] = $this->model->getCategorias();
$this->views->getView($this, "index", $data);
}
public function listar()
{
   $data = $this->model->getCuartos();
    
   for($i=0;$i< count($data); $i++){
      if($data[$i]['disponibilidad']==1) {
         $data[$i]['disponibilidad'] = '<p>Libre</p>';
      }else{
         $data[$i]['disponibilidad'] = '<p>Ocupado</p';
      }
      if($data[$i]['estado']==1) {
         $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
         $data[$i]['acciones'] = '<div>
            <button class="btn btn-secondary" type="button" onclick="btnDeshabilitarCuarto('.$data[$i]['id'].');"><i class="fas fa-circle"></i></button>
            </div>';
      }else{
         $data[$i]['estado'] = '<span class="badge badge-secondary">Inactivo</span>';
         $data[$i]['acciones'] = '<div>
            <button class="btn btn-success" type="button" onclick="btnReingresarCuarto('.$data[$i]['id'].');"><i class="fas fa-circle"></i></button>
             </div>';
      }
   }
   echo json_encode($data, JSON_UNESCAPED_UNICODE);
   die();
}


public function registrar()
{  
   $numero = $_POST['numero'];
   $disponibilidad = $_POST['disponibilidad'];
   $estado = $_POST['estado'];
   $categoria = $_POST['categoria'];
   $id = $_POST['id'];
   if(empty($numero)||  empty($categoria) ){
      $msg = "Todos los campos son obligatorios";
   }else{
    if($id ==""){
         $data = $this->model->registrarCuartos($numero,  $disponibilidad,$estado, $categoria );
         if($data == "ok"){
            $msg = "si";
   
         }else if($data=="existe"){
            $msg = "El numero ya existe";
         } else{
            $msg = "Error al registrar cuarto";
         }
      }else{
         $data = $this->model->modificarCuarto($numero,  $disponibilidad,  $estado, $categoria,$id );
         if($data == "modificado"){
            $msg = "modificado";
   
         } else{
            $msg = "Error al modificar el cuarto";
         }
      }
      
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}

public function editar(int $id){
   $data = $this->model->editarCuarto($id);
   echo json_encode($data, JSON_UNESCAPED_UNICODE);
   die();
}
public function eliminar(int $id){
   $data = $this->model->eliminarCuarto($id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al eliminar el cuarto";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function deshabilitar(int $id){
   $data = $this->model->accionCuarto(0, $id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al dashabilitar el cuarto";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function reingresar(int $id){
   $data = $this->model->accionCuarto(1, $id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al reingresar el cuarto";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}


}




?>

