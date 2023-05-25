<?php
class ReservasModel extends Query{
    private  $nombre, $codigo, $precio_hora, $estado, $id, $data;
public function __construct(){
    parent::__construct();
}
public function getCuNum(string $num)
{
    $sql = "SELECT c.*, cc.* FROM cuarto c INNER JOIN categoria_cuarto cc WHERE c.categoria_id = cc.id AND numero = '$num'" ;
    $data = $this->select($sql);
    return $data;
}


}


?>