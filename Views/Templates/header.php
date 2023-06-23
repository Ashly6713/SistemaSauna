
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sauna Minerva</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" /> 
        <link href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
       <!-- <link href="<?php echo base_url; ?>Assets/DataTables/datatables.min.css" rel="stylesheet" /> -->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed bg-primary bg-opacity-10" >
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
           <h1> <a class="navbar-brand ps-3 bs-border-color" href="index.html"> <FONT SIZE="+2">Sauna Minerva  </FONT>    
                <img src="dinosaur-removebg.png" width="50" height="50"></a></h1>
            
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto">      
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url; ?>Administracion/Home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $_SESSION['nom_usuario']?></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#cambiarPass">Perfil</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="<?php echo base_url; ?>Usuarios/salir">Cerrar Sesion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark bg-dark " id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <?php if($_SESSION['rol'] == 1) {?>
                            <a class="nav-link" href="<?php echo base_url; ?>Administracion">
                                <div class="sb-nav-link-icon text-white"><h5><i class="fas fa-building"></i></h5></div>
                                 <h5> Administración</h5> 
                            </a> 
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon text-white"><h5><i class="fas fa-bath" ></i></h5> </div>
                                <h5 >  Cuartos</h5>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo base_url; ?>Cuartos"><h6><i class="fas fa-door-closed"></i> Gestionar</h6></a>
                                    <a class="nav-link" href="<?php echo base_url; ?>Categorias"><h6><i class="fas fa-door-open"></i> Categorias</h6></a>
                                </nav>
                            </div>
                            <a class="nav-link" href="<?php echo base_url; ?>Usuarios">
                                <div class="sb-nav-link-icon text-white"><h5><i class="fas fa-users"></i></h5></div>
                                <h5> Usuarios</h5> 
                            </a><?php }?>
                            <a class="nav-link" href="<?php echo base_url; ?>Clientes">
                                <div class="sb-nav-link-icon text-white"><h5><i class="fas fa-user-plus"></i></h5></div>
                                 <h5> Clientes</h5> 
                            </a>
                            <a class="nav-link" href="<?php echo base_url; ?>Reservas">
                                <div class="sb-nav-link-icon text-white"><h5><i class="fas fa-ticket"></i></h5></div>
                                <h5>Reservas</h5>
                            </a>
                            <?php if($_SESSION['rol'] == 1) {?>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRep" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon text-white"><h5><i class="fas fa-area-chart"></i></h5></div>
                                <h5> Reportes</h5>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseRep" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link" href="<?php echo base_url; ?>Reservas/historial"><h6><i class="fas fa-money-check"></i> Reservas</h6></a>
                                    <a class="nav-link" href="<?php echo base_url; ?>RepEc"><h6><i class="fas fa-money-check-alt"></i> Gráficos</h6></a>
                                </nav>
                            </div><?php }?>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-2">