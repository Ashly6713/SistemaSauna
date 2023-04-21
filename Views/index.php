<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Iniciar Sesión</title>
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <script src="<?php echo base_url; ?>Assets/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary bg-opacity-50">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
            <section class="d-flex flex-column min-vh-100 justify-content-center aling-items-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-10 mx-auto rounded shadow bg-white">
                               <div class="row">
                                  <div class="col-md-6">
                                     <div class="m-5 text-center">
                                      <h1>Bienbenido!</h1>
                                  </div>
                                
                                    <div class="card-body">
                                        <form class="m-5" id="frmLogin">
                                            <div class="form-floating mb-3">
                                                <input class="form-control py-4.5" id="usuario" name="usuario" type="text" placeholder="Ingrese usuario" />
                                                <label class="small mb-1"  for="usuario"><i class="fas fa-user"></i>  Usuario</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                 <input class="form-control py-4.5" id="clave" name="clave" type="password" placeholder="Ingrese Contraseña" />
                                                <label class="small mb-1" for="clave"><i class="fas fa-key"></i>  Contraseña</label>
                                                
                                            </div>
                                            <div class="alert alert-danger text-center d-none" id="alerta" role="alert">

                                            </div>
                                            <div claa="form-group d-flex align-items-center justify-content-between mt-4 " >
                                                <button class="form-control btn btn-primary mt-3" type="submit" onclick="frmLogin(event);">Log In</button>
                                            </div>
                                        </form>
                                    </div>
                                 </div>
                                    <div class="col-md-6">
                                         <div >
                                              <img src="dinosaur-removebg.png" alt="login" class="img-fluid p-5">
                                         </div>
                                    </div>
                             </div>
                          </div>
                        </div>
                    </div>
             </section>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; <a href="https://es-la.facebook.com/Saunaminerva/" target="_blank" rel="noopener nooferrer">Visite mi pagina de Faceboock </a><?php echo date("Y"); ?></div>
            
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script>
            const base_url = "<?php echo base_url; ?>";
        </script>
        <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
    </body>
</html>
