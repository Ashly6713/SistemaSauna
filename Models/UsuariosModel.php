<?php
class UsuariosModel extends Query{
    private $usuario, $nombre, $apellido, $correo, $clave, $rol, $estado;
public function __construct(){
    parent::__construct();
}
public function getUsuario(string $usuario, string $clave)
{
    $sql = "SELECT * FROM usuario WHERE nom_usuario = '$usuario' AND contrasena = '$clave'";
    $data = $this->select($sql);
    return $data;
}
public function getUsuarios()
{
    $sql = "SELECT * FROM usuario";
    $data = $this->selectAll($sql);
    return $data;
}
public function registrarUsuario(string $usuario, string $nombre, string $apellido, string $correo, string $clave, int $rol, int $estado )
{
    $this->usuario = $usuario;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->correo = $correo;
    $this->clave = $clave;
    $this->rol = $rol;
    $this->estado = $estado;
    $sql = "INSERT INTO usuario(nom_usuario, nombres, apellido, correo, contrasena, Rol, estado) VALUES (?,?,?,?,?,?,?)";
    $datos = array($this->usuario, $this->nombre, $this->apellido, $this->correo, $this->clave, $this->rol, $this->estado);
    $data = $this->save($sql, $datos);
    if($data == 1){
      $res = 'ok';
    }else {
        $res = 'error';
    }
    return $res;
}
}

?>