<?php
$tabla = 'usuario';
$item = null;
$valor = null;

$personas = Usuario::listar($tabla, $item, $valor);

?>

<h2>Listado de Usuarios</h2>
<h3>Base de datos conectada</h3>
<br>
<a href="<?= BASE_URL ?>?ruta=crear">Agregar Usuario</a>
<br>
<br>
<table border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>nombre</th>
            <th>apellido</th>
            <th>correo</th>
            <th>contrasena</th>
            <th>Rol</th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($personas as $key => $persona) : ?>
            <tr>
                <td><?= ($key+1)?></td>
                <td><?= $persona['nombre'] ?></td>
                <td><?= $persona['apellido'] ?> </td>
                <td><?= $persona['correo'] ?></td>
                <td><?= $persona['contrasena'] ?></td>
                <td><?= $persona['Rol'] ?></td>
                
            </tr>
        <?php endforeach; ?>
    </tbody>

</table>