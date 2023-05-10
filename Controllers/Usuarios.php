<?php
class Usuarios extends Controller{
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
   $data = $this->model->getUsuarios();
   for($i=0;$i< count($data); $i++){
      if($data[$i]['Rol']==1) {
         $data[$i]['Rol'] = '<p>Administrador</p>';
      }else{
         $data[$i]['Rol'] = '<p>Empleado</p';
      }
      if($data[$i]['Estado']==1) {
         $data[$i]['Estado'] = '<span class="badge badge-success">Activo</span>';
         $data[$i]['acciones'] = '<div>
            <button class="btn btn-primary" type="button" onclick="btnEditarUser('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button>
            <button class="btn btn-danger" type="button" onclick="btnEliminarUser('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-secondary" type="button" onclick="btnDeshabilitarUser('.$data[$i]['id'].');"><i class="fas fa-circle"></i></button>
             </div>';
      }else{
         $data[$i]['Estado'] = '<span class="badge badge-secondary">Inactivo</span>';
         $data[$i]['acciones'] = '<div>
            <button class="btn btn-danger" type="button" onclick="btnEliminarUser('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
            <button class="btn btn-success" type="button" onclick="btnReingresarUser('.$data[$i]['id'].');"><i class="fas fa-circle"></i></button>
             </div>';
      }
            
   }
   echo json_encode($data, JSON_UNESCAPED_UNICODE);
   die();
}
public function validar()
{
   if (empty($_POST['usuario']) || empty($_POST['clave'])){
         $msg = "Los campos estan vacios";
   } else{
      $usuario = $_POST['usuario'];
      $clave = $_POST['clave'];
      $hash = hash("SHA256", $clave);
      $data = $this->model->getUsuario($usuario, $hash);
      if($data){
           $_SESSION['id']  = $data['id'] ;
           $_SESSION['nom_usuario']  = $data['nom_usuario'] ;
           $_SESSION['nombres']  = $data['nombres'] ;
           $_SESSION['activo']  = true ;
           $msg = "ok";
      } else{
         $msg = "Usuario o contraseña incorrecta";
      }
   }

   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}

public function registrar()
{  
   $usuario = $_POST['usuario'];
   $nombre = $_POST['nombre'];
   $apellido = $_POST['apellido'];
   $correo = $_POST['correo'];
   $clave = $_POST['clave'];
   $confirmar = $_POST['confirmar'];
   $rol = $_POST['rol'];
   $estado = $_POST['estado'];
   $id = $_POST['id'];
   $hash = hash("SHA256", $clave);
   if(empty($usuario)|| empty($nombre)|| empty($apellido)|| empty($correo) ){
      $msg = "Todos los campos son obligatorios";
   }else{
      if($id == "")
      {  if($clave !=$confirmar){
         $msg = "Las contraseñas no coinciden";
      }else{
         $data = $this->model->registrarUsuario($usuario,  $nombre, $apellido, $correo, $hash, $rol, $estado );
         if($data == "ok"){
            $msg = "si";
   
         }else if($data=="existe"){
            $msg = "El usuario ya existe";
         } else{
            $msg = "Error al registrar usuario";
         }
      }
        
      }else{
         $data = $this->model->modificarUsuario($usuario,  $nombre, $apellido, $correo, $rol, $estado, $id );
         if($data == "modificado"){
            $msg = "modificado";
   
         } else{
            $msg = "Error al modificar el usuario";
         }
      }
      
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}

public function editar(int $id){
   $data = $this->model->editarUser($id);
   echo json_encode($data, JSON_UNESCAPED_UNICODE);
   die();
}
public function eliminar(int $id){
   $data = $this->model->eliminarUser($id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al eliminar el usuario";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function deshabilitar(int $id){
   $data = $this->model->accionUser(0, $id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al reingresar el usuario";
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function reingresar(int $id){
   $data = $this->model->accionUser(1, $id);
   if($data == 1){
      $msg = "ok";

   } else{
      $msg = "Error al reingresar el usuario";
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

