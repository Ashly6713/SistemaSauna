<?php
class CuartosModel extends Query{
    private $numero, $disponibilidad,$estado, $id_categoria , $id;
public function __construct(){
    parent::__construct();
}
public function getCategorias()
{
    $sql = "SELECT * FROM categoria_cuarto WHERE estado = 1";
    $data = $this->selectAll($sql);
    return $data;
}
public function getCuartos()
{
    $sql = "SELECT c.*, cc.id as categoria_id, cc.nombre FROM cuarto c INNER JOIN categoria_cuarto cc WHERE c.categoria_id = cc.id";
    $data = $this->selectAll($sql);
    return $data;
}
public function registrarCuartos(int $numero, int $disponibilidad, int $estado, int $id_categoria )
{
    $this->numero = $numero;
    $this->disponibilidad = $disponibilidad;
    $this->estado = $estado;
    $this->id_categoria = $id_categoria;
    $verificar = "SELECT * FROM cuarto WHERE numero = '$this->numero'";
    $existe = $this->select($verificar);
    if(empty($existe)){

        $sql = "INSERT INTO cuarto(numero, disponibilidad, estado, categoria_id) VALUES (?,?,?,?)";
        $datos = array($this->numero, $this->disponibilidad,  $this->estado, $this->id_categoria);
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


public function modificarCuarto(int $numero, int $disponibilidad, int $estado, int $id_categoria, int $id )
{
    $this->numero = $numero;
    $this->disponibilidad = $disponibilidad;
    $this->estado = $estado;
    $this->id_categoria = $id_categoria;
    $this->id = $id;
    $sql = "UPDATE cuarto SET numero = ?, disponibilidad = ?, estado = ?, categoria_id = ?  WHERE id = ?";
    $datos = array($this->numero, $this->disponibilidad, $this->estado, $this->id_categoria,   $this->id);
    $data = $this->save($sql, $datos);
    if($data == 1){
      $res = 'modificado';
    }else {
        $res = 'error';
    }
    return $res;
}

public function editarCuarto(int $id){
    $sql = "SELECT * FROM cuarto WHERE id = $id";
    $data = $this->select($sql);
    return $data;
}
public function accionCuarto( int $estado,int $id){
    $this->id = $id;
    $this->estado = $estado;
    $sql = "UPDATE cuarto SET estado = ? WHERE id = ?";
    $datos = array($this->estado, $this->id);
    $data = $this->save($sql, $datos);
    return $data;
}
public function eliminarCuarto(int $id){
    $this->id = $id;
    $sql = "DELETE FROM cuarto WHERE id = ?";
    $datos = array( $this->id);
    $data = $this->save($sql, $datos);
    return $data;
}


}


?>