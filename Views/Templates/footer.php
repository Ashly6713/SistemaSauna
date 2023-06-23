</div>

                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Suana y Duchas Minerva 2023</div>
                            <div>
                                <a href="https://es-la.facebook.com/Saunaminerva/">Página de Faceboock <i class="fa-brands fa-facebook" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <div id="cambiarPass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white">
                        <h5 class="modal-title">Modificar Contraseña</h5>
                        <button class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" >
                        <form id="frmCambiarPass" onsubmit="frmCambiarPass(event);">
                            <div class="form-group">
                                <label for="clave_actual">Contraseña Actual</label>
                                <input id="clave_actual" class="form-control" type="password" name="clave_actual" placeholder="Contraseña Actual">
                            </div>
                            <div class="form-group">
                                <label for="clave_nueva">Contraseña Nueva</label>
                                <input id="clave_nueva" class="form-control" type="password" name="clave_nueva" placeholder="Nueva Contraseña" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required title="La contraseña debe tener al menos 8 caracteres, una letra mayúscula, una letra minúscula y un número.">
                            </div>
                            <div class="form-group">
                                <label for="confirmar_clave">Confirmar Contraseña</label>
                                <input id="confirmar_clave" class="form-control" type="password" name="confirmar_clave" placeholder="Confirmar Contraseña">
                            </div>
                            <button class="btn btn-primary" type="submit">Modificar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="<?php echo base_url; ?>Assets/js/jquery-3.6.4.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>'
        <script src="https://cdn.jsdelivr.net/npm/chart.js@4.3.0/dist/chart.umd.min.js"></script>'
        <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="<?php echo base_url; ?>Assets/js/datatables-simple-demo.js"></script>
        <script src="<?php echo base_url; ?>Assets/demo/datatables-demo.js"></script>
        <script src="<?php echo base_url; ?>Assets/DataTables/datatables.min.js"></script>
        <script>
            const base_url = "<?php echo base_url; ?>";
        </script>
        <script src="<?php echo base_url; ?>Assets/js/sweetalert2.all.min.js"></script>
        <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
    </body>
</html>