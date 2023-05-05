<?php
class UsuariosModel extends Query{
    private $usuario, $nombre, $apellido, $correo, $clave, $rol, $estado, $id;
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
    $vericar = "SELECT * FROM usuario WHERE nom_usuario = '$this->usuario'";
    $existe = $this->select($vericar);
    if(empty($existe)){

        $sql = "INSERT INTO usuario(nom_usuario, nombres, apellido, correo, contrasena, Rol, estado) VALUES (?,?,?,?,?,?,?)";
        $datos = array($this->usuario, $this->nombre, $this->apellido, $this->correo, $this->clave, $this->rol, $this->estado);
        $data = $this->save($sql, $datos);
        if($data == 1){
          $res = 'ok';
        }else {
            $res = 'error';
        }
    }else{
        $res = "existe";
    }
    return $res;
}


public function modificarUsuario(string $usuario, string $nombre, string $apellido, string $correo, int $rol, int $estado, int $id )
{
    $this->usuario = $usuario;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->correo = $correo;
    $this->id = $id;
    $this->rol = $rol;
    $this->estado = $estado;
    $sql = "UPDATE usuario SET nom_usuario = ?, nombres = ?, apellido = ?, correo = ?, Rol = ?,  Estado = ? WHERE id = ?";
    $datos = array($this->usuario, $this->nombre, $this->apellido, $this->correo, $this->rol, $this->estado, $this->id);
    $data = $this->save($sql, $datos);
    if($data == 1){
      $res = 'modificado';
    }else {
        $res = 'error';
    }
    return $res;
}

public function editarUser(int $id){
    $sql = "SELECT * FROM usuario WHERE id = $id";
    $data = $this->select($sql);
    return $data;
}
public function accionUser( int $estado,int $id){
    $this->id = $id;
    $this->estado = $estado;
    $sql = "UPDATE usuario SET estado = ? WHERE id = ?";
    $datos = array($this->estado, $this->id);
    $data = $this->save($sql, $datos);
    return $data;
}
public function eliminarUser(int $id){
    $this->id = $id;
    $sql = "DELETE FROM usuario WHERE id = ?";
    $datos = array( $this->id);
    $data = $this->save($sql, $datos);
    return $data;
}


}


?>