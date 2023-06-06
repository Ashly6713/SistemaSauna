<?php
  require_once 'config/App/Conexion.php';
  require_once 'config/App/Query.php';
  $sql = "SELECT * FROM cuarto";
  $conn = $data;
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <script>
    localStorage.removeItem("selectedValue");
    function abrirNuevaVentana(id) {
      var selectValue = id;
      localStorage.setItem("selectedValue", selectValue);
      window.location.href = "<?php echo base_url; ?>Reservas";
    }
    </script>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Menu principal</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
        <script src="<?php echo base_url; ?>Assets/js/all.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed bg-primary bg-opacity-10" >
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
           <h1> <a class="navbar-brand ps-3 bs-border-color" href="index.html"> <FONT SIZE="+2">Sauna Minerva  </FONT>    
                <img src="../dinosaur-removebg.png" width="50" height="50"></a></h1>
            
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto">      
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url; ?>Administracion/Home">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i><?php echo $_SESSION['nom_usuario'] ?></a>
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
                            <a class="nav-link" href="<?php echo base_url; ?>Clientes">
                                <div class="sb-nav-link-icon text-white"><h5><i class="fas fa-user-plus"></i></h5></div>
                                 <h5> Clientes</h5> 
                            </a>
                            <a class="nav-link" href="<?php echo base_url; ?>Usuarios">
                                <div class="sb-nav-link-icon text-white"><h5><i class="fas fa-users"></i></h5></div>
                                <h5> Usuarios</h5> 
                            </a>
                            <a class="nav-link" href="<?php echo base_url; ?>Reservas">
                                <div class="sb-nav-link-icon text-white"><h5><i class="fas fa-ticket"></i></h5></div>
                                <h5>Reservas</h5>
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseRep" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon text-white"><h5><i class="fas fa-area-chart"></i></h5></div>
                                <h5> Reportes</h5>
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseRep" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="#"><h6><i class="fas fa-money-check"></i> Reportes de reservas</h6></a>
                                    <a class="nav-link" href="<?php echo base_url; ?>RepEc"><h6><i class="fas fa-money-check-alt"></i> Reporte económico</h6></a>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!--<div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>-->
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid mt-2">            
                        <ol class="breadcrumb mb-4">
                            <h1><li class="breadcrumb-item active">Panel Principal</li></h1>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body"><h4>Clientes: <?php echo count($data['clientes'])?>  <i class="fas fa-user-plus" style="float: right;"></i><h4> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white" href="<?php echo base_url; ?>Clientes">Ver Clientes</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body"><h4>Usuarios: <?php echo count($data['usuarios'])?>  <i class="fas fa-users" style="float: right;"></i><h4> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white" href="<?php echo base_url; ?>Usuarios">Ver Usuarios</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body"><h4>Reservas: <?php echo count($data['reservas'])?>  <i class="fas fa-ticket" style="float: right;"></i><h4> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white" href="<?php echo base_url; ?>Reservas">Ver Reservas</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-secondary text-white mb-4">
                                    <div class="card-body"><h4>Cuartos: <?php echo count($data['cuartos'])?>  <i class="fas fa-bath" style="float: right;"></i><h4> </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white" href="<?php echo base_url; ?>Cuartos">Ver cuartos</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--CARDS-->
    <div class="card bg-white bg-opacity-25">
            <div class="card-header" style="max-height: 3rem;">
                <h5><p class="room_number" >Estado de los Cuartos</p> </h5>
            </div>  
            <div class="card-body" > 
            <div class="row">
            <?php
              for($i=0;$i< count($data['cuartos']); $i++){
                $row[$i]= $data['cuartos'][$i];
            ?>
            <div class="col-xl-2">
                    <?php if($row[$i]['estado'] == 0){  ?>
                            <div class="card bg-secondary bg-opacity-25 mb-3" align="center" style="max-width: 16rem;">
                    <?php  } else if($row[$i]['disponibilidad'] == 1 && $row[$i]['estado'] == 1 ){  ?>
                            <div class="card bg-success bg-opacity-25 mb-3" align="center" style="max-width: 16rem;">
                    <?php  } else if($row[$i]['disponibilidad'] == 0 && $row[$i]['estado'] == 1 ){  ?>
                            <div class="card bg-danger bg-opacity-25 mb-3" align="center" style="max-width: 16rem;">
                    <?php  } ?> 
                            <div class="card-header" style="max-height: 3rem;">
                                <h5><p class="room_number" > <i class="fas fa-bath"></i> Nro.<?php echo $row[$i]['numero'];?></p>
                                </h5>
                            </div>
                            <div class="card-body" style="max-height: 6rem;">
                                <div class="caption">
                                    <p class="categoria"><?php echo $row[$i]['nombre'];?></p>
                                    <p class="rate">
                                    <?php  for($j=0;$j< $row[$i]['capacidad']; $j++){ ?>
                                        <i class="fas fa-person" ></i>
                                    <?php  } ?> 
                                    </p>
                                </div>
                            </div>
                            <?php if($row[$i]['disponibilidad'] == 1 && $row[$i]['estado'] == 1 ){  ?>
                                <button class="btn btn-light mt-2 btn-block" type="button"  onclick="abrirNuevaVentana(<?php echo $row[$i]['categoria_id'];?>)">Reservar</button>
                            <?php } ?> 
                     </div>
             </div>
                <?php  }  ?> 
                </div>
            </div>
    </div>
                        <img src="../logo3.png" width="150" height="200"  align="right">
<?php include "Views/Templates/footer.php";?>