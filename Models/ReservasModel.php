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
public function getCuartos(int $id)
{
    $sql = "SELECT c.*, cc.nombre, cc.capacidad, cc.precio_hora, cc.estado FROM cuarto c INNER JOIN categoria_cuarto cc WHERE c.categoria_id = cc.id AND c.id = $id" ;
    $data = $this->select($sql);
    return $data;
}


}


?>