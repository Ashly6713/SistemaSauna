<?php
class AdministracionModel extends Query{
public function __construct(){
    parent::__construct();
}
public function getEmpresa()
{
    $sql = "SELECT * FROM configuracion";
    $data = $this->select($sql);
    return $data;
}
public function modificar(string $nit,string $nombre, string $telefono, string $dir, string $mensaje, int $id)
{
        $sql = "UPDATE configuracion SET nit = ?,nombre = ?, telefono = ?, direccion = ?, mensaje = ? WHERE id=?";
        $datos = array($nit, $nombre, $telefono, $dir, $mensaje,$id );
        $data = $this->save($sql, $datos);
        if($data == 1){
          $res = 'ok';
        }else {
            $res = 'error';
        }
    return $res;
}
public function getCuartos()
{
    $sql = "SELECT c.*, cc.id as categoria_id, cc.nombre, cc.capacidad FROM cuarto c INNER JOIN categoria_cuarto cc WHERE c.categoria_id = cc.id";
    $data = $this->selectAll($sql);
    return $data;
}
public function getClientes()
{
    $sql = "SELECT * FROM cliente";
    $data = $this->selectAll($sql);
    return $data;
}
public function getUsuarios()
{
    $sql = "SELECT * FROM usuario";
    $data = $this->selectAll($sql);
    return $data;
}
public function getReservas()
{
    $sql = "SELECT * FROM reserva";
    $data = $this->selectAll($sql);
    return $data;
}


}


?>