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
public function getHoraFin($id)
{
    date_default_timezone_set('America/La_Paz');
    $fecha = date('Y-m-d');
    $hora = date('H:i'); 
    $sql = "SELECT dr.hora_fin
    FROM detalle_reserva dr
    JOIN Reserva r ON dr.reserva_id = r.id
    WHERE dr.cuarto_id =$id
      AND r.fecha_compra = '$fecha'
      AND '$hora' BETWEEN dr.hora_inicio AND dr.hora_fin;";
    $data = $this->select($sql);
    return $data;
}

public function getVendido()
{
    $sql = "SELECT Cuarto.numero, COUNT(*) AS veces_reservado
    FROM Cuarto
    INNER JOIN detalle_reserva ON Cuarto.id = detalle_reserva.cuarto_id
    GROUP BY Cuarto.id 
    ORDER BY veces_reservado DESC
    LIMIT 10";
    $data = $this->selectAll($sql);
    return $data;
}
public function getVentas()
{
    $sql = "SELECT MONTH(fecha_compra) AS mes, YEAR(fecha_compra) AS anio, SUM(total) AS monto_vendido
    FROM Reserva
    GROUP BY YEAR(fecha_compra), MONTH(fecha_compra)
    ORDER BY YEAR(fecha_compra), MONTH(fecha_compra)";
    $data = $this->selectAll($sql);
    return $data;
}
public function getVentasSemana()
{
    $sql = "SELECT fecha_compra AS dia, SUM(total) AS monto_vendido
    FROM Reserva
    WHERE fecha_compra >= CURDATE() - INTERVAL 9 DAY
    GROUP BY dia;";
    $data = $this->selectAll($sql);
    return $data;
}

}


?>