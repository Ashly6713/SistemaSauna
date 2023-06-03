<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
     <h1><li class="breadcrumb-item active">Usuarios</li></h1>
</ol>

<button class="btn btn-outline-primary btn-lg mb-2" type="button" onclick="frmUsuario();"><i class="fas fa-plus"></i> Nuevo</button>
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
<table class="table table-sm table-hover" id="tblUsuarios">
    <thead class="table-primary">
    <tr>
            <th>Id</th>
            <th>Usuario</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Rol</th>
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
<div id="nuevo_usuario" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary opacity-50">
                <h5 class="modal-title text-white" id="title">Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUsuarios">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input type="hidden" id="id" name = "id">
                        <input id="usuario" class="form-control" type="text" name="usuario" placeholder="Usuario">
                    </div>
                    <div class="form-group">
                        <label for="nombre">Nombres</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombres">
                    </div>
                    <div class="form-group">
                        <label for="apellido">Apellidos</label>
                        <input id="apellido" class="form-control" type="text" name="apellido" placeholder="Apellido">
                    </div>
                    <div class="form-group">
                        <label for="correo">Correo</label>
                        <input id="correo" class="form-control" type="email" name="correo" placeholder="Correo">
                    </div>
                   <div class="row" id="claves">
                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="clave">Contraseña</label>
                        <input id="clave" class="form-control" type="password" name="clave" placeholder="Contrasena">
                       </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="confirmar">Confirmar contraseña</label>
                          <input id="confirmar" class="form-control" type="password" name="confirmar" placeholder="Confirmar Contraseña">
                       </div>
                    </div>
                   </div>
                    
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <select id="rol" class="form-control" name="rol">
                            <option value="<?php echo 1;?>">Administrador </option>
                            <option value="<?php echo 0;?>">Empleado </option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select id="estado" class="form-control" name="estado">
                            <option value="<?php echo 1;?>">Activo</option>
                            <option value="<?php echo 0;?>">Inactivo</option>
                        </select>
                    </div>
                    <div class="alert alert-danger text-center d-none" id="alertaU" role="alert">El campo Usuario no puede tener caracteres especiales (?@#$% ...) ni espacios</div>
                    <div class="alert alert-danger text-center d-none" id="alertaL" role="alert">Los campos de Nombres y Apellidos sólo pueden tener letras</div>
                    <div class="alert alert-danger text-center d-none" id="alertaC" role="alert">Ingrese un correo valido Ej: alguien@algunlugar.com </div>
                   <button class="btn btn-primary" type="button" onclick="registrarUser(event);" id="btnAccion">Registrar</button>
                   <button class="btn btn-danger"  data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php  include "Views/Templates/footer.php"; ?>

