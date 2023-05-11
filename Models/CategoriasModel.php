<?php
class CategoriasModel extends Query{
    private  $nombre, $codigo, $precio_hora, $estado, $id, $data;
public function __construct(){
    parent::__construct();
}
public function getCategorias()
{
    $sql = "SELECT * FROM categoria_cuarto";
    $data = $this->selectAll($sql);
    return $data;
}
public function registrarCategoria(string $nombre, string $codigo, string $precio_hora, int $estado )
{
    $this->nombre = $nombre;
    $this->codigo = $codigo;
    $this->precio_hora = $precio_hora;
    $this->estado = $estado;
    $vericar = "SELECT * FROM categoria_cuarto WHERE nombre = '$this->nombre'";
    $existe = $this->select($vericar);
    if(empty($existe)){

        $sql = "INSERT INTO categoria_cuarto(nombre, codigo, precio_hora, estado) VALUES (?,?,?,?)";
        $datos = array($this->nombre, $this->codigo, $this->precio_hora, $this->estado);
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


public function modificarCategoria(string $nombre, string $codigo, string $precio_hora, int $estado, int $id )
{
    $this->nombre = $nombre;
    $this->codigo = $codigo;
    $this->precio_hora = $precio_hora;
    $this->id = $id;
    $this->estado = $estado;
    $sql = "UPDATE categoria_cuarto SET nombre = ?, codigo = ?, precio_hora = ?,  estado = ? WHERE id = ?";
    $datos = array($this->nombre, $this->codigo, $this->precio_hora, $this->estado, $this->id);
    $data = $this->save($sql, $datos);
    if($data == 1){
      $res = 'modificado';
    }else {
        $res = 'error';
    }
    return $res;
}

public function editarCategoria(int $id){
    $sql = "SELECT * FROM categoria_cuarto WHERE id = $id";
    $data = $this->select($sql);
    return $data;
}
public function accionCategoria( int $estado,int $id){
    $this->id = $id;
    $this->estado = $estado;
    $sql = "UPDATE categoria_cuarto SET estado = ? WHERE id = ?";
    $datos = array($this->estado, $this->id);
    $data = $this->save($sql, $datos);
    return $data;
}
public function eliminarCategoria(int $id){
    $this->id = $id;
    $sql = "DELETE FROM categoria_cuarto WHERE id = ?";
    $datos = array( $this->id);
    $data = $this->save($sql, $datos);
    return $data;
}


}


?>