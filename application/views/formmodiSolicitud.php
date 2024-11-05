<style>
    /* Estilos personalizados para llenar la pantalla y centrar el formulario */
    .full-height {
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .bg-gradient-primary {
        background-size: cover;
    }

    .card {
        width: 100%;
        max-width: 700px;
        margin: 0 auto;
    }
</style>

<br>
<br>

<div class="card o-hidden border-0 shadow-lg">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">MODIFICAR CLIENTE USUARIO</h1>
                    </div>

                    <?php foreach($infosolicitud->result() as $row) : ?>
                        <?= form_open_multipart("solicitudes/modificarbd"); ?>

                        <form class="user">
                            <input type="hidden" name="idSolicitud" value="<?php echo $row->idSolicitud; ?>">
                            <input type="hidden" name="idUsuario" value="<?= $this->session->userdata('idUsuario'); ?>">

                            <div class="form-group row">
                                <div class="col-sm-6">
                                    <label for="idVehiculo">Seleccionar Tipo Vehiculo</label>
                                    <select class="form-control" name="idVehiculo" id="idVehiculo" onchange="rellenarDatosVehiculo()">
                                        <option value="">Seleccione un Tipo</option>
                                        <?php if(!empty($vehiculos)): ?>
                                            <?php foreach ($vehiculos as $vehiculo): ?>
                                                <?php if ($vehiculo->activo == 1): ?>
                                                    <option value="<?= $vehiculo->idVehiculo ?>" 
                                                            data-numMovil="<?= $vehiculo->numMovil ?>"
                                                            data-tipo="<?= $vehiculo->tipo ?>"> 
                                                        <?= $vehiculo->numMovil ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">No hay clientes disponibles</option>
                                        <?php endif; ?>
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <label for="idParqueo">Seleccionar Parqueo</label>
                                    <select class="form-control" name="idParqueo" id="idParqueo" onchange="rellenarDatosParqueo()">
                                        <option value="">Seleccione un Parqueo</option>
                                        <?php if (!empty($parqueos)): ?>
                                            <?php foreach ($parqueos as $parqueo): ?>
                                                <?php if ($parqueo->estado == 1): ?>
                                                    <option value="<?= $parqueo->idParqueo ?>" 
                                                            data-nombreParq="<?= $parqueo->nombreParq ?>">
                                                        <?= $parqueo->nombreParq ?>
                                                    </option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <option value="">No hay parqueos disponibles</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-3 mb-3 mb-sm-0">
                                    <label for="nombreCliente">Nombre del Cliente</label>
                                    <input type="text" class="form-control" name="nombreCliente" placeholder="Nombre del Cliente" value="<?php echo $row->nombreCliente; ?>" readonly>
                                </div>

                                <div class="col-sm-3">
                                    <label for="telefonoCliente">Teléfono del Cliente</label>
                                    <input type="text" class="form-control" name="telefonoCliente" placeholder="Teléfono del Cliente" value="<?php echo $row->telefonoCliente; ?>" readonly>
                                </div>

                                <div class="col-sm-6">
                                    <label for="direccionCiente">Dirección del Cliente</label>
                                    <input type="text" class="form-control" name="direccionCiente" placeholder="Dirección del Cliente" value="<?php echo $row->direccionCiente; ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-4 mb-3 mb-sm-0">
                                    <label for="tipo">Tipo de Vehiculo</label>
                                    <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo de vehiculo" value="<?php echo $row->tipoServicio; ?>">
                                </div>

                                <div class="col-sm-4">
                                    <label for="numMovil">Numero de Vehiculo</label>
                                    <input type="text" class="form-control" name="numMovil" id="numMovil" placeholder="Numero de vehiculo" value="<?php echo $row->numConductor; ?>">
                                </div>

                                <div class="col-sm-4">
                                    <label for="nombreParq">Nombre de Parqueo</label>
                                    <input type="text" class="form-control" name="nombreParq" id="nombreParq" placeholder="Nombre Parqueo" value="<?php echo $row->nombreParqueo; ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-8 mb-3 mb-sm-0">
                                    <button type="submit" class="btn btn-success btn-user btn-block">Modificar Usuario</button>
                                </div>

                                <div class="col-sm-4">
                                    <a href="<?php echo base_url(); ?>index.php/cliente/listaCliente">
                                        <button type="button" class="btn btn-warning btn-user btn-block">Cancelar</button>
                                    </a>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <?= form_close(); ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>modeloLogin/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>modeloLogin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>modeloLogin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>modeloLogin/js/sb-admin-2.min.js"></script>

<script>
    function rellenarDatosVehiculo() {
        var vehiculoSelect = document.getElementById("idVehiculo");
        var selectedOption = vehiculoSelect.options[vehiculoSelect.selectedIndex];
        document.getElementById("tipo").value = selectedOption.getAttribute("data-tipo");
        document.getElementById("numMovil").value = selectedOption.getAttribute("data-numMovil");
    }

    function rellenarDatosParqueo() {
        var parqueoSelect = document.getElementById("idParqueo");
        var selectedOption = parqueoSelect.options[parqueoSelect.selectedIndex];
        document.getElementById("nombreParq").value = selectedOption.getAttribute("data-nombreParq");
    }
</script>
