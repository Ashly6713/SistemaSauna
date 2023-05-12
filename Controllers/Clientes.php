<?php
class Clientes extends Controller{
   public function __construct(){
      session_start();
      if(empty( $_SESSION['activo'])){
          header("location:".base_url) ;
      }
      parent:: __construct();
  } 
public function index()
{
   $this->views->getView($this, "index");
}
public function listar()
{
   $data = $this->model->getClientes();
   for($i=0;$i< count($data); $i++){
      if($data[$i]['estado']==1) {
         $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
         $data[$i]['acciones'] = '<div>
            <button class="btn btn-primary" type="button" onclick="btnEditarCliente('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="btnEliminarCliente('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-secondary" type="button" onclick="btnDeshabilitarCliente('.$data[$i]['id'].');"><i class="fas fa-circle"></i></button>
             </div>';
      }else{
         $data[$i]['estado'] = '<span class="badge badge-secondary">Inactivo</span>';
         $data[$i]['acciones'] = '<div>
            <button class="btn btn-danger" type="button" onclick="btnEliminarCliente('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-success" type="button" onclick="btnReingresarCliente('.$data[$i]['id'].');"><i class="fas fa-circle"></i></button>
             </div>';
      }      
   }
   echo json_encode($data, JSON_UNESCAPED_UNICODE);
   die();
}


public function registrar()
{  
   $ci = $_POST['ci'];
   $nombre = $_POST['nombre'];
   $apellido = $_POST['apellido'];
   $telefono = $_POST['telefono'];
   $estado = $_POST['estado'];
   $id = $_POST['id'];
   if(empty($ci)||empty($nombre)|| empty($apellido)|| empty($telefono) ){
      $msg = "Todos los campos son obligatorios";
   }else{
      if( !preg_match("/^[[:digit:]]+$/", $ci)){
         $msg = "ci";
      }else if(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $nombre) || !preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $apellido) ){
         $msg = "letras";
      }else if ( !preg_match("/^(\d{8})$/", $telefono)) {
         $msg = "numeros";
      }else{
         if($id == "")
      {  
         $data = $this->model->registrarCliente($ci, $nombre, $apellido, $telefono, $estado );
         if($data == "ok"){
            $msg = "si";
   
         }else if($data=="existe"){
            $msg = "El cliente ya existe";
         } else{
            $msg = "Error al registrar el cliente";
         }
        
      }else{
         $data = $this->model->modificarCliente( $ci, $nombre, $apellido, $telefono, $estado, $id );
         if($data == "modificado"){
            $msg = "modificado";
   
         } else{
            $msg = "Error al modificar el cliente";
         }
      }
      }
      
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}

public function editar(int $id){
   $data = $this->model->editarCliente($id);
   echo json_encode($data, JSON_UNESCAPED_UNICODE);
   die();
}
public function eliminar(int $id){
   $data = $this->model->eliminarCliente($id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al eliminar el cliente";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function deshabilitar(int $id){
   $data = $this->model->accionCliente(0, $id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al reingresar el cliente";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function reingresar(int $id){
   $data = $this->model->accionCliente(1, $id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al reingresar el cliente";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function salir(){
   session_destroy();
   header("location:".base_url) ;
}


}




?>

