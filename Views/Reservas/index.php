<?php include "Views/Templates/header.php";
date_default_timezone_set('America/La_Paz');?>
<ol class="breadcrumb mb-4">
     <h1><li class="breadcrumb-item active">Nueva Reserva</li></h1>
</ol>
<!-- CLIENTE -->
<form id="frmReserva">
    <div class="card bg-white bg-opacity-10">
        <div class="card-header bg-secondary bg-opacity-25">
            <h6>Datos del Cliente </h6>
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-md-2"> 
                        <div class="form-group">
                            <label for="ci" class="font-weight-bold"><i class="fas fa-users"></i> Buscar Cliente</label>
                            <input id="ci" class="form-control" type="text" name="ci" placeholder="Cédula de Identidad" onkeyup="buscarCi(event);" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>  
                            <input type="hidden" id="id_cli" name="id_cli">
                        </div>
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label for="nombre" class="font-weight-bold"><i class="fas fa-user"></i> Nombres</label>
                            <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombres" disabled>  
                        </div>
                    </div>
                    <div class="col-md-3"> 
                        <div class="form-group">
                            <label for="apellido" class="font-weight-bold"><i class="far fa-user"></i> Apellidos</label>
                            <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellidos" disabled>  
                        </div>
                    </div>
                    <div class="col-md-2"> 
                        <div class="form-group">
                            <label for="telefono" class="font-weight-bold"><i class="fas fa-phone"></i> Teléfono</label>
                            <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Telefono" disabled>  
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="fecha"><i class="fas fa-calendar-alt"></i> Fecha</label>
                            <input id="fecha" class="form-control" type="text" name="fecha" value="<?php echo date('d-m-Y');?>"disabled >
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <p></p><!-- CUARTOS -->
    <div class="card bg-white bg-opacity-10">
    <div class="card-header bg-secondary bg-opacity-25">
            <h6>Datos del Cuarto </h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="numero"><i class="fas fa-hashtag"></i> Número de Cuarto</label>
                        <input type="hidden" id="id" name="id">
                        <input id="numero" class="form-control" type="number" step="1" name="numero" placeholder="Número" onkeyup="buscarNumero(event);" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="categoria"><i class="fas fa-grip-horizontal"></i> Categoria</label>
                        <input id="categoria" class="form-control" type="text" name="categoria" placeholder="Categoria" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="precio_hora"><i class="fas fa-coins"></i> Precio por hora</label>
                        <input id="precio_hora" class="form-control" type="text" name="precio_hora" placeholder="Bs." disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="hora_inicio"><i class="fas fa-calendar-plus"></i> Hora de Inicio</label>
                        <input id="hora_inicio" class="form-control" type="time" name="hora_inicio" placeholder="Hora de Inicio" onkeyup="saltar(event,'cantidad')" disabled required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="hora_fin"><i class="fas fa-calendar-check"></i> Hora de Finalización</label>
                        <input id="hora_fin" class="form-control" type="time" name="hora_fin" placeholder="Hora de Finalización" disabled>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="cantidad"><i class="fas fa-clock"></i> Tiempo en minutos</label>
                            <input id="cantidad" class="form-control" type="number" name="cantidad" placeholder="Cantidad de minutos" onkeyup="calcularHoras(event);" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required disabled>
                        </div> 
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="precio_total"><i class="fas fa-dollar-sign"></i> Precio Total</label>
                            <input id="precio_total" class="form-control" type="text" name="precio_total" placeholder="precio_total de minutos" disabled>
                        </div> 
                    </div>
                </div>
            </div>   
        </div>
    </div>
</form>


<p></p><!--tabla -->
<table class="table table-light table-bordered table-hover">
    <thead class="table table-primary">
        <tr>
            <th>ID</th>
            <th>Número</th>
            <th>Categoria</th>
            <th>Precio por hora</th>
            <th>Hora de Inicio</th>
            <th>Hora de Finalización</th>
            <th>Tiempo en minutos</th>
            <th>Precio Total</th>
            <th></th>
        </tr>
    </thead>
    <tbody id="tblDetalle">
    </tbody>
</table>

<div class="row justify-content-end ">
    <div class="col-md-2 ml-auto"> 
        <div class="form-group">
                <label for="total" class="font-weight-bold">Total</label>
                <input id="total" class="form-control" type="text" name="total" placeholder="Sub total" required>     
        </div>
    </div>
    <div class="col-md-2 ml-10"> 
        <button type="button" class="btn btn-primary">Registrar Reserva</button>
    </div>
</div>
<?php  include "Views/Templates/footer.php"; ?>

