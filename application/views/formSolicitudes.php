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
        width: 100%; /* Asegura que la tarjeta ocupe todo el ancho posible */
        max-width: 700px; /* Limita el ancho máximo */
        margin: 0 auto;
    }
</style>

<div class="card o-hidden border-0 shadow-lg">
    <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
            <div class="col-lg-12">
                <div class="p-5">
                    <br>
                    <br>

                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">AGREGAR UNA NUEVA SOLICITUD</h1>
                    </div>

                    <?php echo form_open("solicitudes/agregarbd", ['class' => 'user']); ?>

                    <!-- Selección de Cliente -->
                    
                    <div class="form-group row">
                    <div class="col-sm-5 mb-3 mb-sm-0">
    <label for="idCliente">Seleccionar Cliente</label>
    <select class="form-control" name="idCliente" id="idCliente" required onchange="rellenarDatosCliente()">
        <option value="">Seleccione un Cliente</option>
        <?php if(!empty($clientes)): ?>
            <?php foreach ($clientes as $cliente): ?>
                <?php if ($cliente->habilitado == 1): // Filtrar clientes con estado 1 ?>
                    <option value="<?= $cliente->idCliente ?>" 
                            data-nombre="<?= $cliente->nombre ?>" 
                            data-telefono="<?= $cliente->telefono ?>" 
                            data-direccion="<?= $cliente->direccion ?>">
                        <?= $cliente->telefono ?>
                    </option>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="">No hay clientes disponibles</option>
        <?php endif; ?>
    </select>
</div>

                        <div class="col-sm-4">
                        <label for="idVehiculo">Seleccionar Tipo Vehiculo</label>
                        <select class="form-control" name="idVehiculo" id="idVehiculo" required onchange="rellenarDatosVehiculo()">
                            <option value="">Seleccione un Tipo</option>
                            <?php if(!empty($vehiculos)): ?>
                                <?php foreach ($vehiculos as $vehiculo): ?>
                                    <?php if ($vehiculo->activo == 1): ?>
                                    <option value="<?= $vehiculo->idVehiculo ?>" 
                                            data-numMovil="<?= $vehiculo->numMovil ?>"
                                            data-tipo="<?= $vehiculo->tipo ?>" 
                                             
                                            > 
                                        <?= $vehiculo->numMovil ?>
                                    </option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <option value="">No hay clientes disponibles</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="col-sm-3">
    <label for="idParqueo">Seleccionar Parqueo</label>
    <select class="form-control" name="idParqueo" id="idParqueo" required onchange="rellenarDatosParqueo()" >
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

                    <!-- Campo Nombre del Cliente (auto-completado) -->
                    <div class="form-group row">
                    <div class="col-sm-3 mb-3 mb-sm-0">
                        <label for="nombre">Nombre del Cliente</label>
                        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Cliente" required readonly>
                    </div>
                    <!-- Campo Teléfono del Cliente (auto-completado) -->
                    <div class="col-sm-3">
                        <label for="telefono">Teléfono del Cliente</label>
                        <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono del Cliente" required readonly>
                    </div>
                    <!-- Campo Dirección del Cliente (auto-completado) -->
                    <div class="col-sm-6">
                        <label for="direccion">Dirección del Cliente</label>
                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección del Cliente" required readonly>
                    </div>
                    </div>

                    <!-- Selección de Parqueo -->
                    <div class="form-group row">
                    <div class="col-sm-4 mb-3 mb-sm-0">
                        <!-- Campo Teléfono del Cliente (auto-completado) -->
                        <label for="tipo">Tipo de Vehiculo</label>
                        <input type="text" class="form-control" name="tipo" id="tipo" placeholder="Tipo de vehiculo" required readonly>
                    </div>
                    <!-- Campo Dirección del Cliente (auto-completado) -->
                    <div class="col-sm-4">
                        <label for="numMovil">Numero de Vehiculo</label>
                        <input type="text" class="form-control" name="numMovil" id="numMovil" placeholder="Numero de vehiculo" required readonly>
                    </div>

                    
<div class="col-sm-4">
                        <label for="nombreParq">Nombre de Parqueo</label>
                        <input type="text" class="form-control" name="nombreParq" id="nombreParq" placeholder="Nombre Parqueo" required readonly>
                    </div>


                    </div>
                    

                

                    <!-- Campo Oculto para el ID del Usuario -->
                    <input type="hidden" name="idUsuario" value="<?= $this->session->userdata('idUsuario'); ?>"> <!-- Ajusta esto según tu sistema de autenticación -->

                    <!-- Botón de Agregar Reserva -->
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <button type="submit" class="btn btn-success btn-block">Agregar Reserva</button>
                        </div>
                        <div class="col-sm-6">
                            <a href="<?php echo base_url(); ?>index.php/solicitudes/lista" class="btn btn-warning btn-block">Cancelar</a>
                        </div>
                    </div>

                    <?php echo form_close(); ?>

                </div>
            </div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>modeloLogin/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>modeloLogin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>modeloLogin/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>modeloLogin/js/sb-admin-2.min.js"></script>

<!-- Script para auto-completar datos del cliente -->
<script>
    function rellenarDatosCliente() { 
    var clienteSelect = document.getElementById("idCliente");
    var selectedOption = clienteSelect.options[clienteSelect.selectedIndex];

    // Verificar si hay un cliente seleccionado
    if (selectedOption.value !== "") {
        document.getElementById("nombre").value = selectedOption.getAttribute("data-nombre");
        document.getElementById("telefono").value = selectedOption.getAttribute("data-telefono");
        document.getElementById("direccion").value = selectedOption.getAttribute("data-direccion");
    } else {
        // Limpiar los campos si no se selecciona un cliente
        document.getElementById("nombre").value = "";
        document.getElementById("telefono").value = "";
        document.getElementById("direccion").value = "";
    }
}


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

</body>
</html>
