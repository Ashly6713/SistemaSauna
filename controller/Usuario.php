<?php

class Usuario
{

    public function inicio()
    {
        return include('view/inicio.php');
    }

   
    public static function listar($tabla, $item, $valor){

        $respuesta = UsuarioModel::listar($tabla, $item, $valor);
        return $respuesta;
    }
}