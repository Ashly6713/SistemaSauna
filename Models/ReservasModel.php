<?php
class ReservasModel extends Query{
    private  $nombre, $codigo, $precio_hora, $estado, $id, $data;
public function __construct(){
    parent::__construct();
}
public function getCategorias()
{
    $sql = "SELECT * FROM categoria_cuarto WHERE estado = 1";
    $data = $this->selectAll($sql);
    return $data;
}
public function getCuNum(int $id)
{
    $sql = "SELECT c.*, cc.nombre, cc.capacidad, cc.precio_hora, cc.estado FROM cuarto c INNER JOIN categoria_cuarto cc WHERE c.categoria_id = cc.id AND c.id = $id AND c.estado = 1" ;
    $data = $this->select($sql);
    return $data;
}
public function getCi(string $ci)
{
    $sql = "SELECT * FROM cliente WHERE ci = $ci AND estado = 1" ;
    $data = $this->select($sql);
    return $data;
}
public function getClientes()
{
    $sql = "SELECT * FROM cliente WHERE estado = 1" ;
    $data = $this->selectAll($sql);
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
    $sql = "SELECT d.*, c.id as cuarto_id, c.numero, ca.nombre, ca.precio_hora FROM detalle d INNER JOIN cuarto c ON c.id = d.cuarto_id INNER JOIN categoria_cuarto ca ON ca.id = c.categoria_id  WHERE d.usuario_id =  $id";
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
public function consultarDetalle(int $id_cuarto, int $id_usuario)
{
   $sql = "SELECT * FROM detalle WHERE cuarto_id =  $id_cuarto AND usuario_id = $id_usuario";
   $data = $this->select($sql);
   return $data;
}
public function actualizarDetalle(string $precio,  string $hora_inicio, string $hora_fin, int $cantidad, string $sub_total, int $cliente_id, int $cuarto_id, int $usuario_id)
{
    $sql = "UPDATE detalle SET precio = ?,  hora_inicio = ?, hora_fin = ?, cantidad = ?, sub_total = ? WHERE cliente_id = ? AND cuarto_id = ? AND usuario_id = ?";
    $datos = array($precio, $hora_inicio, $hora_fin, $cantidad, $sub_total, $cliente_id,$cuarto_id, $usuario_id);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = 'modificado';
    }else {
          $res = 'error';
    }
    return $res;
}
public function registraReserva(string $fecha_compra, string $total, int $cliente_id, int $usuario_id)
{
    $sql = "INSERT INTO reserva(fecha_compra, total, cliente_id, usuario_id) VALUES (?,?,?,?)";
    $datos = array($fecha_compra, $total, $cliente_id, $usuario_id);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = 'ok';
    }else {
        $res = 'error';
    }
    return $res;
}
public function id_reserva(){
    $sql = "SELECT MAX(id) AS id FROM reserva";
    $data = $this->select($sql);
     return $data;
}
public function registrarDetalleReserva(string $precio, string $hora_inicio, string $hora_fin, int $cantidad,string $sub_total,int $cuarto_id,int $reserva_id){
    $sql = "INSERT INTO detalle_reserva(precio, hora_inicio, hora_fin, cantidad, sub_total, cuarto_id, reserva_id) VALUES (?,?,?,?,?,?,?)";
    $datos = array($precio, $hora_inicio, $hora_fin, $cantidad, $sub_total, $cuarto_id, $reserva_id);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = 'ok';
    }else {
        $res = 'error';
    }
    return $res;
}
public function getEmpresa()
{
    $sql = "SELECT * FROM configuracion";
    $data = $this->select($sql);
     return $data;
}
public function vaciarDetalle(int $usuario_id)
{
    $sql = "DELETE FROM detalle WHERE usuario_id = ?";
    $datos = array($usuario_id);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = 'ok';
    }else {
        $res = 'error';
    }
    return $res;
}
public function getCuReserva(int $reserva_id)
{
    $sql = "SELECT r.*, d.*, ca.*, c.id as cuarto_id, c.numero  FROM reserva r INNER JOIN detalle_reserva d ON r.id = d.reserva_id INNER JOIN cuarto c ON c.id = d.cuarto_id INNER JOIN categoria_cuarto ca ON ca.id = c.categoria_id  WHERE r.id =  $reserva_id";
    $data = $this->selectAll($sql);
    return $data;
}
public function getCliReserva(int $id)
{
    $sql = "SELECT * FROM cliente WHERE id = $id AND estado = 1" ;
    $data = $this->select($sql);
    return $data;
}

public function actualizarDisponibles()
{
    date_default_timezone_set('America/La_Paz');
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    $sql = "UPDATE Cuarto
    SET disponibilidad = ?
    WHERE NOT EXISTS (
      SELECT 1
      FROM detalle_reserva dr
      INNER JOIN Reserva r ON dr.reserva_id = r.id
      WHERE dr.cuarto_id = Cuarto.id
        AND r.fecha_compra = '$fecha'
        AND '$hora' BETWEEN dr.hora_inicio AND dr.hora_fin
    );" ;
    $datos = array(1);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = 'ok';
    }else {
        $res = 'error';
    }
    return $res;
}
public function actualizarNoDisponibles()
{
    date_default_timezone_set('America/La_Paz');
    $fecha = date('Y-m-d');
    $hora = date('H:i:s');
    $sql = "UPDATE Cuarto
    SET disponibilidad = ?
    WHERE id IN (
      SELECT cuarto_id
      FROM detalle_reserva
      WHERE reserva_id IN (
        SELECT id
        FROM Reserva
        WHERE fecha_compra = '$fecha' 
        AND '$hora' BETWEEN hora_inicio AND hora_fin
      )
    );" ;
    $datos = array(0);
    $data = $this->save($sql, $datos);
    if($data == 1){
        $res = $hora;
    }else {
        $res = 'error';
    }
    return $res;
}
public function getDisponibles(int $categoria, string $hora_inicio, string $hora_fin)
{   date_default_timezone_set('America/La_Paz');  
    $fecha_compra = date('Y-m-d');
    $sql = "SELECT c.id, c.numero, cc.precio_hora
    FROM Cuarto c
    INNER JOIN Categoria_cuarto cc ON c.categoria_id = cc.id
    WHERE c.id NOT IN (
      SELECT dr.cuarto_id
      FROM detalle_reserva dr
      INNER JOIN Reserva r ON dr.reserva_id = r.id
      WHERE (dr.hora_inicio <= '$hora_fin' AND dr.hora_fin >= '$hora_inicio')
        AND r.fecha_compra = '$fecha_compra'
    )
    AND cc.id = $categoria AND c.estado = 1";
    $data = $this->selectAll($sql);
    return $data;
}
public function getHistorialReservas()
{
    $sql = "SELECT u.nom_usuario, u.nombres as nombre_u, u.apellido as apellido_u, c.ci, c.nombre, c.apellido, r.* FROM cliente c INNER JOIN Reserva r ON r.cliente_id = c.id INNER JOIN usuario u ON u.id = r.usuario_id";
    $data = $this->selectAll($sql);
    return $data;
}

public function getRangoFechas(string $desde, string $hasta)
{
    $sql = "SELECT u.nom_usuario, u.nombres as nombre_u, u.apellido as apellido_u, c.ci, c.nombre, c.apellido, r.* FROM cliente c INNER JOIN Reserva r ON r.cliente_id = c.id INNER JOIN usuario u ON u.id = r.usuario_id WHERE r.fecha_compra BETWEEN '$desde' AND '$hasta'";
    $data = $this->selectAll($sql);
    return $data;
}
public function getRangoFechasCi(string $desde, string $hasta, string $ci)
{
    $sql = "SELECT u.nom_usuario, u.nombres as nombre_u, u.apellido as apellido_u, c.ci, c.nombre, c.apellido, r.* FROM cliente c INNER JOIN Reserva r ON r.cliente_id = c.id INNER JOIN usuario u ON u.id = r.usuario_id WHERE c.ci = '$ci' AND r.fecha_compra BETWEEN '$desde' AND '$hasta'";
    $data = $this->selectAll($sql);
    return $data;
}
public function getRangoFechasUsuario(string $desde, string $hasta, string $usuario)
{
    $sql = "SELECT u.nom_usuario, u.nombres as nombre_u, u.apellido as apellido_u, c.ci, c.nombre, c.apellido, r.* FROM cliente c INNER JOIN Reserva r ON r.cliente_id = c.id INNER JOIN usuario u ON u.id = r.usuario_id WHERE u.nom_usuario = '$usuario' AND r.fecha_compra BETWEEN '$desde' AND '$hasta'";
    $data = $this->selectAll($sql);
    return $data;
}
public function getRangoFechasCiUsuario(string $desde, string $hasta, string $ci, string $usuario)
{
    $sql = "SELECT u.nom_usuario, u.nombres as nombre_u, u.apellido as apellido_u, c.ci, c.nombre, c.apellido, r.* FROM cliente c INNER JOIN Reserva r ON r.cliente_id = c.id INNER JOIN usuario u ON u.id = r.usuario_id WHERE c.ci = '$ci' AND u.nom_usuario = '$usuario' AND r.fecha_compra BETWEEN '$desde' AND '$hasta'";
    $data = $this->selectAll($sql);
    return $data;
}

}


?>