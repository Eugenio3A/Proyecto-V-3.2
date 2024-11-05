<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f6f9; min-height: 100vh;"> <!-- Fondo de página -->
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="header mt-4 mb-4 text-center">
                <h1 style="color: #2c3e50;">Lista de Reservas</h1>
            </div>

            <h2 style="color: #2c3e50;">Bienvenido <?php echo $this->session->userdata('cuenta'); ?></h2>
            <p style="color: #7f8c8d;"><?php echo date('Y/m/d H:i:s'); ?></p>

            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <a href="<?php echo base_url(); ?>index.php/reservas/deshabilitados" class="btn btn-warning">Reservas No Funcionales</a>
                <a href="<?php echo base_url(); ?>index.php/reservas/agregar" class="btn btn-primary">Agregar Reserva</a>
            </div>

            <?php if ($this->session->flashdata('mensaje')): ?>
                <div class="alert alert-success mt-4">
                    <?= $this->session->flashdata('mensaje'); ?>
                </div>
            <?php endif; ?>

            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger mt-4">
                    <?= $this->session->flashdata('error'); ?>
                </div>
            <?php endif; ?>

            <div class="card-body mt-4">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="background-color: #ffffff; border-radius: 8px;">
                        <thead style="background-color: #34495e; color: #ecf0f1;">
                            <tr>
                                <th>No.</th>
                                <th>Nombre Cliente</th>
                                <th>Teléfono</th>
                                <th>Tipo Servicio</th>
                                <th>Fecha de Solicitud</th>
                                <th>Fecha de Reserva</th>
                                <th>Estado</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 1;
                            foreach ($reservas as $row) {
                            ?>
                            <tr id="fila_<?php echo $row['idReserva']; ?>" class="estado-<?php echo $row['estado']; ?>">
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $row['nombreCliente']; ?></td>
                                <td><?php echo $row['telefono']; ?></td>
                                <td><?php echo $row['tipoServicio']; ?></td>
                                <td><?php echo formatearFecha($row['fechaSolicitud']); ?></td>
                                <td><?php echo formatearFecha($row['fechaReserva']); ?></td>
                                <td>
                                    <form action="<?php echo base_url('reservas/modificarEstado'); ?>" method="post" style="display: inline;" id="estadoForm_<?php echo $row['idReserva']; ?>">
                                        <input type="hidden" name="idReserva" value="<?php echo $row['idReserva']; ?>">
                                        <select name="nuevo_estado" class="form-select" aria-label="Estado de la reserva" onchange="cambiarEstado(this, '<?php echo $row['idReserva']; ?>')">
                                            <option value="pendiente" <?php echo ($row['estado'] == 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                                            <option value="activo" <?php echo ($row['estado'] == 'activo') ? 'selected' : ''; ?>>Activo</option>
                                            <option value="confirmado" <?php echo ($row['estado'] == 'confirmado') ? 'selected' : ''; ?>>Confirmado</option>
                                            <option value="cancelado" <?php echo ($row['estado'] == 'cancelado') ? 'selected' : ''; ?>>Cancelado</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <?php echo form_open("reservas/modificar"); ?>
                                    <input type="hidden" name="idReserva" value="<?php echo $row['idReserva']; ?>">
                                    <button type="submit" class="btn btn-success">Modificar</button>
                                    <?php echo form_close(); ?>
                                </td>
                            </tr>
                            <?php
                            $contador++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

<!-- Agrega los estilos para los estados y tabla -->
<head>
    <style>
        /* Colores de estado */
        .estado-pendiente {
            background-color: #ffd700; /* Amarillo para pendiente */
            color: #000;
        }
        .estado-activo {
            background-color: #32cd32; /* Verde para activo */
            color: #fff;
        }
        .estado-confirmado {
            background-color: #00bfff; /* Azul para confirmado */
            color: #fff;
        }
        .estado-cancelado {
            background-color: #ff4500; /* Rojo para cancelado */
            color: #fff;
        }

        /* Fondo de tabla y bordes */
        .table-bordered {
            border-color: #dcdcdc; /* Color suave para bordes */
        }

        /* Botones */
        .btn-primary {
            background-color: #2980b9;
            border-color: #2980b9;
        }
        .btn-primary:hover {
            background-color: #1c5981;
        }

        .btn-warning {
            background-color: #f39c12;
            border-color: #f39c12;
        }
        .btn-warning:hover {
            background-color: #c87f0a;
        }

        .btn-success {
            background-color: #27ae60;
            border-color: #27ae60;
        }
        .btn-success:hover {
            background-color: #1c7a45;
        }
    </style>
    
    <script>
        function cambiarEstado(selectElement, idReserva) {
            var fila = document.getElementById('fila_' + idReserva);
            fila.classList.remove('estado-pendiente', 'estado-activo', 'estado-confirmado', 'estado-cancelado');

            var nuevoEstado = selectElement.value;
            fila.classList.add('estado-' + nuevoEstado);

            // Redirigir solo si el estado es confirmado o cancelado
            if (nuevoEstado === 'confirmado' || nuevoEstado === 'cancelado') {
                // Modificar el formulario para redirigir a la lista correspondiente
                var url = (nuevoEstado === 'confirmado') ? " <?php echo base_url('index.php/reservas/deshabilitarbd'); ?>" : "<?php echo base_url('index.php/reservas/listaconfRes'); ?>";
                document.getElementById('estadoForm_' + idReserva).action = url;
                document.getElementById('estadoForm_' + idReserva).submit();
            }
        }
    </script>
    <script>
    function cambiarEstado(selectElement, idReserva) {
        var fila = document.getElementById('fila_' + idReserva);
        fila.classList.remove('estado-pendiente', 'estado-activo', 'estado-confirmado', 'estado-cancelado');

        var nuevoEstado = selectElement.value;
        fila.classList.add('estado-' + nuevoEstado);

        if (nuevoEstado === 'cancelado') {
            var url = "<?php echo base_url('index.php/solicitudes/listaCancelados'); ?>";
            document.getElementById('estadoForm_' + idReserva).action = url;
            document.getElementById('estadoForm_' + idReserva).submit();
        } else {
            document.getElementById('estadoForm_' + idReserva).action = "<?php echo base_url('index.php/solicitudes/modificarEstado'); ?>";
            document.getElementById('estadoForm_' + idReserva).submit();
        }
    }
</script>
</head>
