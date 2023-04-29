<?php
class UsuariosModel extends Query{
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
}

?>