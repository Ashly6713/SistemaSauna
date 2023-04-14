<?php
    
    require 'config/config.php';

    require 'controller/Usuario.php';
    require 'model/UsuarioModel.php';

    $inicio = new Usuario();
    //$inicio->inicio();
?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-primary bg-opacity-50">

    <section class="d-flex flex-column min-vh-100 justify-content-center aling-items-center">
      <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto rounded shadow bg-white">
                <div class="row">
                    <div class="col-md-6">
                        <div class="m-5 text-center">
                            <h1>Bienbenido!</h1>
                        </div>
                        <form class="m-5">
                            <div class="m-3">
                                <label class="form-label" for="username">Nombre de Usuario</label>
                                <input class="form-control" type="text" id="username">
                            </div>
                            <div class="m-3">
                                <label class="form-label" for="password">Contraseña</label>
                                <input class="form-control" type="password" id="password">
                            </div>
                            <div class="row mb-3">
                                <div clas="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-me">
                                        <label class="form-check-label" for="remember-me">Recordar contraseña</label>
                                    </div>
                                </div>
                                <!-- <div class="col-6">
                                    <div class="text-end">
                                        <a href="#">Forgot Password?</a>
                                    </div>
                                </div>-->
                                <div>
                               <!-- <button type="submit" class="form-control btn btn-primary mt-3">Enviar</button>-->
                                    <input type="submit" class="form-control btn btn-primary mt-3">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div >
                            <img src="./login_img.svg" alt="login" class="img-fluid p-5">
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</body>
</html>
