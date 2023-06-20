<?php include "Views/Templates/header.php";?>
<h1 class="mt-4" align="center">Reporte Económico</h1>
<script>localStorage.removeItem("selectedValue"); </script>
<main>
<div class="row">
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                     Cuarto más reservado
            </div>
            <div class="card-body">
                <canvas id="masReservado" width="100%" height="40"></canvas>
            </div>
        </div>
     </div>
    <div class="col-xl-6">
      <div class="row">
            <div class="card">
                <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Ventas por mes
                </div>
                <div class="card-body">
                    <canvas id="myAreaChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div>  
        <div class="row">
            <div class="card">
                <div class="card-header">
                        <i class="fas fa-chart-bar me-1"></i>
                        Ventas por día
                </div>
                <div class="card-body">
                    <canvas id="myBarChart" width="100%" height="40"></canvas>
                </div>
            </div>
        </div> 
    </div>                                                  
</div>
</main> 
<script src="<?php echo base_url; ?>Assets/js/Chart.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/demo/chart-area-demo.js"></script>
        <script src="<?php echo base_url; ?>Assets/demo/chart-bar-demo.js"></script> 

 <?php include "Views/Templates/footer.php";?>