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