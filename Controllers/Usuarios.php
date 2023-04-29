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
         $data[$i]['Rol'] = '<span class="badge badge-primary">Administrador</span>';
      }else{
         $data[$i]['Rol'] = '<span class="badge badge-primary">Empleado</span>';
      }
      if($data[$i]['Estado']==1) {
         $data[$i]['Estado'] = '<span class="badge badge-outline-success">Activo</span>';
      }else{
         $data[$i]['Estado'] = '<span class="badge badge-outline-danger">Inactivo</span>';
      }
            $data[$i]['acciones'] = '<div>
            <button class="btn btn-primary" type="button">Editar</button>
            <button class="btn btn-danger" type="button">Eliminar</button>
             </div>';
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
      $data = $this->model->getUsuario($usuario, $clave);
      if($data){
           $_SESSION['id']  = $data['id'] ;
           $_SESSION['nom_usuario']  = $data['nom_usuario'] ;
           $_SESSION['nombres']  = $data['nombres'] ;
           $msg = "ok";
      } else{
         $msg = "Usuario o contraseña incorrecta";
      }
   }

   echo json_encode($msg, JSON_UNESCAPED_UNICODE);
   die();
}
}

?>

