<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>USUARIOS</title>
</head>

<body>


    <?php
    if (isset($_GET['ruta'])) {

        if ($_GET['ruta'] == 'crear' || $_GET['ruta'] == 'edit') {
            include 'paginas/'. $_GET['ruta'].'.php';
        
        } else {
            include 'paginas/listado.php';
        }
    } else {
        include 'paginas/listado.php';
    }


    ?>
   


</form>

</body>

</html>