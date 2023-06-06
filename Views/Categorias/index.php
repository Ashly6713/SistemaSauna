<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
     <h1><li class="breadcrumb-item active">Categorias</li></h1>
</ol>
<script>localStorage.removeItem("selectedValue"); </script>
<button class="btn btn-outline-primary btn-lg mb-2" type="button" onclick="frmCategoria();"><i class="fas fa-plus"></i> Nuevo</button>
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
<table class="table table-sm table-hover" id="tblCategorias">
    <thead class="table-primary">
    <tr>
            <th>Id</th>
            <th>Nombre de Categoria</th>
            <th>Capacidad</th>
            <th>Precio por Hora</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody >
        <tr>
            <td></td>
        </tr>
    </tbody>
</table>
<div id="nuevo_categoria" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary opacity-50">
                <h5 class="modal-title text-white" id="title">Nueva Categoria</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmCategorias">
                    <div class="form-group">
                         <input type="hidden" id="id" name = "id">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre de la categoria">
                    </div>
                    <div class="form-group">
                        <label for="capacidad">Capacidad</label>
                        <input id="capacidad" class="form-control" type="number" name="capacidad" placeholder="Capacidad de personas por cuarto">
                    </div>
                    <div class="form-group">
                        <label for="precio_hora">Precio por hora</label>
                        <input id="precio_hora" class="form-control" type="text" name="precio_hora" placeholder="Precio por hora">
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select id="estado" class="form-control" name="estado">
                            <option value="<?php echo 1;?>">Activo</option>
                            <option value="<?php echo 0;?>">Inactivo</option>
                        </select>
                    </div>
                    <div class="alert alert-danger text-center d-none" id="alertaL" role="alert">Los campos de Nombre y Codigo sólo admiten Letras</div>
                    <div class="alert alert-danger text-center d-none" id="alertaN" role="alert">Los campos Capacidad y Precio sólo admiten Numeros, y los precios con decimal Ej: 00.00</div>
                   <button class="btn btn-primary" type="button" onclick="registrarCategoria(event);" id="btnAccion">Registrar</button>
                   <button class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php  include "Views/Templates/footer.php"; ?>

