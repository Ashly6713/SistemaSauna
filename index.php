<?php
    
    require 'config/config.php';

    require 'controller/Usuario.php';
    require 'model/UsuarioModel.php';

    $inicio = new Usuario();
    $inicio->inicio();

 echo "conectado";
    
