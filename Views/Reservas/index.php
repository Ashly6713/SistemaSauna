<?php include "Views/Templates/header.php";
date_default_timezone_set('America/La_Paz');?>
<ol class="breadcrumb mb-4">
     <h1><li class="breadcrumb-item active">Nueva Reserva</li></h1>
</ol>
<div class="card">
    <div class="card-body">
        <form id="frmReserva">
          <div class="row">
            <div class="col-md-2">
                <div class="form-group">
                    <label for="numero">Número de Cuarto</label>
                    <input type="hidden" id="id" name="id">
                    <input id="numero" class="form-control" type="text" name="numero" placeholder="Número" onkeyup="buscarNumero(event);">
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="categoria">Categoria</label>
                    <input id="categoria" class="form-control" type="text" name="categoria" placeholder="Categoria" disabled>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="precio_hora">Precio por hora</label>
                    <input id="precio_hora" class="form-control" type="text" name="precio_hora" placeholder="Bs." disabled>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="fecha">Fecha</label>
                    <input id="fecha" class="form-control" type="text" name="fecha" value="<?php echo date('d-m-Y');?>"disabled >
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="hora_inicio">Hora de Inicio</label>
                    <input id="hora_inicio" class="form-control" type="time" name="hora_inicio" placeholder="Hora de Inicio" required>
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <label for="hora_fin">Hora de Finalización</label>
                    <input id="hora_fin" class="form-control" type="time" name="hora_fin" placeholder="Hora de Finalización" disabled>
                </div>
            </div>
            <div class="col-md-2">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="cantidad">Tiempo en minutos</label>
                        <input id="cantidad" class="form-control" type="text" name="cantidad" placeholder="Cantidad de minutos" onkeyup="calcularHoras(event);">
                    </div> 
                </div>
            </div>
            
          </div>   
        </form>
    </div>
</div>
<style>
    .badge-primary {
   color: #ebeef0;
   background-color: #B23CFD;
}

.badge-secondary{
   color: #ebeef0;
   background-color: #6c757d;
}

.badge-success {
   color: #ebeef0;
   background-color: #198754;
}

.badge-danger{
   color: #ebeef0;
   background-color: #dc3545;
}

.badge-warning {
   color: #ebeef0;
   background-color: #5f3cfd;
}

.badge-info {
   color: #ebeef0;
   background-color: #fd3c46;
}
.badge-light {
   color: #ebeef0;
   background-color: #3cfdbd;
}
.badge-dark {
   color: #ebeef0;
   background-color: #064118;
}
  
    </style>

<table class="table table-light">
    <thead class="table table-primary">
        <tr>
            <th>ID</th>
            <th>Número</th>
            <th>Categoria</th>
            <th>Precio</th>
            <th>Fecha</th>
            <th>Hora de Inicio</th>
            <th>Hora de Finalización</th>
            <th>Tiempo en minutos</th>
        </tr>
    </thead>
    <tbody>
    </tbody>
</table>

<div class="row justify-content-end ">
    <div class="col-md-2 ml-auto"> 
        <div class="form-group">
                    <label for="total" class="font-weight-bold">Total</label>
                    <input id="total" class="form-control" type="text" name="total" placeholder="Precio" required>     
             <button type="button" class="btn btn-primary">Generar Reserva</button>
        </div>
    </div>
</div>
<?php  include "Views/Templates/footer.php"; ?>

