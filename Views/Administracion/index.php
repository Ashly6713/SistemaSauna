<?php include "Views/Templates/header.php";?>
<script>localStorage.removeItem("selectedValue"); </script>
<script>
    window.onload = function() {
      document.title = "Administración";
    };
</script>
<div class="card">
    <div class="card-header bg-primary bg-opacity-50 text-white" >
      <h5>  Datos de la Empresa </h5>
    </div>
    <div class="card-body">
        <form id="frmEmpresa">
            <div class="row">
               <div class="col-md-6">
                    <div class="form-group">
                        <input id="id" class="form-control" type="hidden" name="id" value="<?php echo $data['id'] ?>">
                        <label for="nombre">Nombre</label>
                        <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" value="<?php echo $data['nombre'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <label for="nit">NIT</label>
                        <input id="nit" class="form-control" type="text" name="nit" placeholder="nit" value="<?php echo $data['nit'] ?>">
                     </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                        <label for="telefono">Teléfono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="Teléfono" value="<?php echo $data['telefono'] ?>">
                     </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input id="direccion" class="form-control" type="text" name="direccion" placeholder="Dirección" value="<?php echo $data['direccion'] ?>">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mesaje">Mensaje</label>
                        <textarea name="mensaje" id="mensaje" class="form-control" placeholder="Mensaje" rows="3"><?php echo $data['mensaje'] ?></textarea>
                    </div>
                </div>
            </div>
            
            <button class="btn btn-outline-primary mb-2" type="button" onclick="modificarEmpresa();">Modificar</button>
        </form>
    </div>
</div>
<?php include "Views/Templates/footer.php";?>