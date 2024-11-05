

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
                    <!-- Se elimina la clase que oculta la imagen en pantallas pequeñas -->
                    <div class="col-lg-12">
                        <div class="p-5">
                            <br>
                            <br>

                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">AGREGAR NUEVA RESERVA</h1>
                            </div>

                            <?php echo form_open("reservas/agregarbd", ['class' => 'user']); ?>

<!-- Selección de Cliente -->
<div class="form-group">
    <label for="idCliente">Seleccionar Cliente</label>
    <select class="form-control" name="idCliente" id="idCliente" required onchange="rellenarDatosCliente()">
        <option value="">Seleccione un Cliente</option>
        <?php if(!empty($clientes)): ?>
            <?php foreach ($clientes as $cliente): ?>
                <option value="<?= $cliente->idCliente ?>" data-nombre="<?= $cliente->nombre ?>" data-telefono="<?= $cliente->telefono ?>">
                    <?= $cliente->nombre ?>
                </option>
            <?php endforeach; ?>
        <?php else: ?>
            <option value="">No hay clientes disponibles</option>
        <?php endif; ?>
    </select>
</div>

<!-- Resto del formulario -->


<!-- Campo Nombre del Cliente (auto-completado) -->
<div class="form-group">
    <label for="nombre">Nombre del Cliente</label>
    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre del Cliente" required readonly>
</div>

<!-- Campo Teléfono del Cliente (auto-completado) -->
<div class="form-group">
    <label for="telefono">Teléfono del Cliente</label>
    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="Teléfono del Cliente" required readonly>
</div>

<!-- Fecha de Reserva -->
<div class="form-group">
    <label for="fechaReserva">Fecha de Reserva</label>
    <input type="datetime-local" class="form-control" name="fechaReserva" id="fechaReserva" required>
</div>

<!-- Tipo de Servicio -->
<div class="form-group">
    <label for="tipoServicio">Tipo de Servicio</label>
    <select class="form-control" name="tipoServicio" id="tipoServicio" required>
        <option value="">Seleccione un Servicio</option>
        <option value="taxi">Taxi</option>
        <option value="vagoneta">Vagoneta</option>
        <option value="taxi_familiar">Taxi Familiar</option>
        <option value="mudanza">Mudanza</option>
    </select>
</div>

<!-- Campo Oculto para el ID del Usuario -->
<input type="hidden" name="idUsuario" value="<?= $this->session->userdata('idUsuario'); ?>"> <!-- Ajusta esto según tu sistema de autenticación -->

<!-- Botón de Agregar Reserva -->
<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <button type="submit" class="btn btn-success btn-block">Agregar Reserva</button>
    </div>
    <div class="col-sm-6">
        <a href="<?php echo base_url(); ?>index.php/reservas/lista" class="btn btn-warning btn-block">Cancelar</a>
    </div>
</div>

<?php echo form_close(); ?>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src=" <?php echo base_url(); ?>modeloLogin/vendor/jquery/jquery.min.js"></script>
    <script src=" <?php echo base_url(); ?>modeloLogin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src=" <?php echo base_url(); ?>modeloLogin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src=" <?php echo base_url(); ?>modeloLogin/js/sb-admin-2.min.js"></script>

    <!-- Script para auto-completar datos del cliente -->
<script>
    function rellenarDatosCliente() {
        var clienteSelect = document.getElementById("idCliente");
        var selectedOption = clienteSelect.options[clienteSelect.selectedIndex];
        document.getElementById("nombre").value = selectedOption.getAttribute("data-nombre");
        document.getElementById("telefono").value = selectedOption.getAttribute("data-telefono");
    }
</script>


</body>

</html>


