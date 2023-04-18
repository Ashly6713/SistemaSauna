<?php

class Conexion{

    public static function conectar()
    {
        $link  = new PDO("mysql:host=localhost;dbname=sistema_reservas","root", "" );
        $link->exec("set name utf-8");
        return $link;
    
    
    }

}