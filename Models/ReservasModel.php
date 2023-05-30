<?php
class ReservasModel extends Query{
    private  $nombre, $codigo, $precio_hora, $estado, $id, $data;
public function __construct(){
    parent::__construct();
}
public function getCuNum(string $num)
{
    $sql = "SELECT c.*, cc.nombre, cc.capacidad, cc.precio_hora, cc.estado FROM cuarto c INNER JOIN categoria_cuarto cc WHERE c.categoria_id = cc.id AND c.numero = '$num'" ;
    $data = $this->select($sql);
    return $data;
}
public function getCi(string $ci)
{
    $sql = "SELECT * FROM cliente WHERE ci = $ci" ;
    $data = $this->select($sql);
    return $data;
}
public function getCuartos(int $id)
{
    $sql = "SELECT c.*, cc.nombre, cc.capacidad, cc.precio_hora, cc.estado FROM cuarto c INNER JOIN categoria_cuarto cc WHERE c.categoria_id = cc.id AND c.id = $id" ;
    $data = $this->select($sql);
    return $data;
}
public function registrarDetalle(string $precio, string $hora_inicio, string $hora_fin, int $cantidad, string $sub_total, int $cliente_id, int $cuarto_id, int $usuario_id)
{
    $sql = "INSERT INTO detalle(precio, hora_inicio, hora_fin, cantidad, sub_total, cliente_id, cuarto_id, usuario_id) VALUES (?,?,?,?,?,?,?,?)";
    $datos = array($precio, $hora_inicio, $hora_fin, $cantidad, $sub_total, $cliente_id, $cuarto_id, $usuario_id);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = 'ok';
    }else {
          $res = 'error';
    }
    return $res;
}

public function getDetalle(int $id)
{
    $sql = "SELECT r.*, c.id as cuarto_id, c.numero, ca.nombre, ca.precio_hora FROM detalle r INNER JOIN cuarto c ON c.id = r.cuarto_id INNER JOIN categoria_cuarto ca ON ca.id = c.categoria_id  WHERE r.usuario_id =  $id";
    $data = $this->selectAll($sql);
    return $data;
}
public function calcularReserva(int $id_usuario)
{
   $sql = "SELECT sub_total, SUM(sub_total) AS total FROM detalle WHERE usuario_id =  $id_usuario";
   $data = $this->select($sql);
   return $data;
}
public function deleteDelete(int $id)
{
   $sql = "DELETE FROM detalle WHERE cuarto_id = $id";
   $datos = array($id);
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