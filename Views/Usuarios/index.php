<?php include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
     <h1><li class="breadcrumb-item active">Usuarios</li></h1>
</ol>

<button class="btn btn-outline-primary btn-lg mb-2" type="button" onclick="frmUsuario();">Añadir nuevo Usuario</button>

<table class="table table-dark" id="tblUsuarios">
    <thead class="thead-dark">
    <tr>
            <th>Id</th>
            <th>Nombre de Usuario</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo</th>
            <th>Contraseña</th>
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
            <div class="modal-header">
                <h5 class="modal-title" id="my-modal-title">Nuevo Usuario</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmUsuarios">
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
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
                   <div class="row">
                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input id="contrasena" class="form-control" type="password" name="contrasena" placeholder="Contrasena">
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
                            <option>Administrador</option>
                            <option>Empleado</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estado">Estado</label>
                        <select id="estado" class="form-control" name="estado">
                            <option>Activo</option>
                            <option>Inactivo</option>
                        </select>
                    </div>
                   <button class="btn btn-primary" type="button">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php  include "Views/Templates/footer.php"; ?>