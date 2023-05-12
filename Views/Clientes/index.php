<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
     <h1><li class="breadcrumb-item active">Clientes</li></h1>
</ol>

<button class="btn btn-outline-primary btn-lg mb-2" type="button" onclick="frmCliente();"><i class="fas fa-plus"></i> Nuevo</button>
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
<table class="table table-primary " id="tblClientes">
    <thead class="thead-dark">
    <tr>
            <th>Id</th>
            <th>C.I.</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Telefono</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>
<div id="nuevo_cliente" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary opacity-50">
                <h5 class="modal-title text-white" id="title">Nuevo Cliente</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmClientes">
                <div class="form-group">
                        <label for="ci">C. I.</label>
                        <input id="ci" class="form-control" type="text" name="ci" placeholder="Cedula de Identidad">
                        <input type="hidden" id="id" name = "id">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombres">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellido</label>
                        <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellidos">
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Telefono o Celular">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select id="estado" class="form-control" name="estado">
                            <option value="<?php echo 1;?>">Activo</option>
                            <option value="<?php echo 0;?>">Inactivo</option>
                        </select>
                    </div>
                    <div class="alert alert-danger text-center d-none" id="alertaCi" role="alert">El campo C. I. sólo admite numeros</div>
                    <div class="alert alert-danger text-center d-none" id="alertaL" role="alert">Los campos de Nombres y Apellidos sólo pueden tener letras</div>
                    <div class="alert alert-danger text-center d-none" id="alertaN" role="alert">El Telefono o celular sólo admite numero con 8 dígitos </div>
                   <button class="btn btn-primary" type="button" onclick="registrarCliente(event);" id="btnAccion">Registrar</button>
                   <button class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php  include "Views/Templates/footer.php"; ?>

