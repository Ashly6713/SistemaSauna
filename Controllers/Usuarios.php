<?php
class Usuarios extends Controller{
   public function __construct(){
      session_start();
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
         $data[$i]['Rol'] = '<p>Empleado</p>';
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
         $msg = "ok";
           $_SESSION['id']  = $data['id'] ;
           $_SESSION['nom_usuario']  = $data['nom_usuario'] ;
           $_SESSION['nombres']  = $data['nombres'] ;
           $_SESSION['rol']  = $data['Rol'] ;
           $_SESSION['activo']  = true ;
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
      $msg = array('msg' => 'Todos los campos son obligatorios', 'icono' => 'warning');
   }else{
      if (!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ0-9]+$/", $usuario) ) {
         $msg = "usuario";
      }else if(!preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $nombre) || !preg_match("/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]*$/", $apellido) ){
         $msg = "letras";
      }else if (!preg_match("/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/", $correo) ) {
         $msg = "correo";
      }else { 
         if($id == "")
      {  if($clave !=$confirmar){
         $msg = array('msg' => 'Las contraseñas no coinciden', 'icono' => 'warning');
      }else{
         $data = $this->model->registrarUsuario($usuario,  $nombre, $apellido, $correo, $hash, $rol, $estado );
         if($data == "ok"){
            $msg = "si";
            $msg = array('msg' => 'Usuario registrado con éxito', 'icono' => 'success');
         }else if($data=="existe"){
            $msg = array('msg' => 'El usuario ya existe', 'icono' => 'warning');
         } else{
            $msg = array('msg' => 'Error al registrar usuario', 'icono' => 'error');
         }
      }
        
      }else{
         $data = $this->model->modificarUsuario($usuario,  $nombre, $apellido, $correo, $rol, $estado, $id );
         if($data == "modificado"){
            $msg = array('msg' => 'Usuario Modificado con éxito', 'icono' => 'success');
         } else{
            $msg = array('msg' => 'Error al modificar Usuario', 'icono' => 'error');
         }
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
      $msg = array('msg' => 'Usuario eliminado', 'icono' => 'success');
   } else{
      $msg = array('msg' => 'Error al elimiar Usuario', 'icono' => 'error');
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function deshabilitar(int $id){
   $data = $this->model->accionUser(0, $id);
   if($data == 1){
      $msg = array('msg' => 'Usuario desactivado', 'icono' => 'success');
   } else{
      $msg = array('msg' => 'Error al desactivar Usuario', 'icono' => 'error');
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function reingresar(int $id){
   $data = $this->model->accionUser(1, $id);
   if($data == 1){
      $msg = array('msg' => 'Usuario Reactivado', 'icono' => 'success');
   } else{
      $msg = array('msg' => 'Error al Reactivar Usuario', 'icono' => 'error');
   }
   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
public function cambiarPass(){
   $actual= $_POST['clave_actual'];
   $nueva = $_POST['clave_nueva'];
   $confirmar = $_POST['confirmar_clave'];
   if(empty($actual) || empty($nueva) || empty($confirmar)){
      $msg = array('msg' => 'Todos los campos son obligatorios', 'icono' => 'warning');
   } else{
      if($nueva != $confirmar){
      $msg = array('msg' => 'Las contraseñas no coinciden', 'icono' => 'warning');
      } else{
            $id = $_SESSION['id'];
            $hash = hash("SHA256", $actual);
            $data = $this->model->getPass($hash, $id); 
            if(!empty($data)){
                $verificar = $this->model->modificarPass(hash("SHA256", $nueva), $id);
               
               if($verificar == 1){
                  $msg = array('msg' => 'Contraseña modificada', 'icono' => 'success');
               }else{
                  $msg = array('msg' => 'Error al modifcar la contraseña', 'icono' => 'error');
               }
            } else {
               $msg = array('msg' => 'La contraseña actual es incorrecta ', 'icono' => 'warning');
            }
      }
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

