<?php
class Categorias extends Controller{
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
   $data = $this->model->getCategorias();
   for($i=0;$i< count($data); $i++){
      if($data[$i]['estado']==1) {
         $data[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
         $data[$i]['acciones'] = '<div>
            <button class="btn btn-primary" type="button" onclick="btnEditarCategoria('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="btnEliminarCategoria('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-secondary" type="button" onclick="btnDeshabilitarCategoria('.$data[$i]['id'].');"><i class="fas fa-circle"></i></button>
             </div>';
      }else{
         $data[$i]['estado'] = '<span class="badge badge-secondary">Inactivo</span>';
         $data[$i]['acciones'] = '<div>
            <button class="btn btn-danger" type="button" onclick="btnEliminarCategoria('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-success" type="button" onclick="btnReingresarCategoria('.$data[$i]['id'].');"><i class="fas fa-circle"></i></button>
             </div>';
      }
            
   }
   echo json_encode($data, JSON_UNESCAPED_UNICODE);
   die();
}


public function registrar()
{  
   $nombre = $_POST['nombre'];
   $capacidad = $_POST['capacidad'];
   $precio_hora = $_POST['precio_hora'];
   $estado = $_POST['estado'];
   $id = $_POST['id'];
   if(empty($nombre)|| empty($capacidad)|| empty($precio_hora) ){
      $msg = "Todos los campos son obligatorios";
   }else{
      if(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ]+$/", $nombre) ){
         $msg = "letras";
      }else if ( !preg_match("/^[0-9]+([.][0-9]+)?$/", $precio_hora) || !preg_match("/^[[:digit:]]+$/", $capacidad)) {
         $msg = "numeros";
      }else{
         if($id == "")
         {  
            $data = $this->model->registrarCategoria( $nombre, $capacidad, $precio_hora, $estado );
            if($data == "ok"){
               $msg = "si";
      
            }else if($data=="existe"){
               $msg = "La categoria ya existe";
            } else{
               $msg = "Error al registrar la categoria";
            }
           
         }else{
            $data = $this->model->modificarCategoria( $nombre, $capacidad, $precio_hora, $estado, $id );
            if($data == "modificado"){
               $msg = "modificado";
      
            } else{
               $msg = "Error al modificar la categoria";
            }
         }
      }
      
      
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}

public function editar(int $id){
   $data = $this->model->editarCategoria($id);
   echo json_encode($data, JSON_UNESCAPED_UNICODE);
   die();
}
public function eliminar(int $id){
   $data = $this->model->eliminarCategoria($id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al eliminar la categoria";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function deshabilitar(int $id){
   $data = $this->model->accionCategoria(0, $id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al reingresar la categoria";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function reingresar(int $id){
   $data = $this->model->accionCategoria(1, $id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al reingresar la categoria";
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

