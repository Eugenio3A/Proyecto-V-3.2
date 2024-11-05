<h1>LISTA DE RESERVAS</h1>

<br>

<a href="<?php echo base_url(); ?>index.php/reservas/lista">
    <button type="button" class="btn btn-warning">VER RESERVAS HABILITADAS</button>
</a>

<table class="table table-bordered mt-3">
    <thead class="thead-dark">
        <tr>
            <th>No.</th>
            <th>Nombre del Cliente</th>
            <th>Teléfono</th>
            <th>Tipo de Servicio</th>
            <th>Fecha de Solicitud</th>
            <th>Fecha de Reserva</th>
            <th>Estado</th>
            <th>Acción</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $contador = 1;
        foreach ($reservas->result() as $row) {
        ?>
        <tr class="estado-<?php echo $row->estado; ?>">
            <td><?php echo $contador; ?></td>
            <td><?php echo $row->nombreCliente; ?></td>
            <td><?php echo $row->telefono; ?></td>
            <td><?php echo ucfirst($row->tipoServicio); ?></td>
            <td><?php echo date("d/m/Y H:i", strtotime($row->fechaSolicitud)); ?></td>
            <td><?php echo date("d/m/Y H:i", strtotime($row->fechaReserva)); ?></td>
            <td><?php echo ucfirst($row->estado); ?></td>
            <td>
                <?php echo form_open("reservas/modificarEstado"); ?>
                    <input type="hidden" name="idReserva" value="<?php echo $row->idReserva; ?>">
                    <select name="nuevo_estado" class="form-select" onchange="this.form.submit()">
                        <option value="pendiente" <?php echo ($row->estado == 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                        <option value="activo" <?php echo ($row->estado == 'activo') ? 'selected' : ''; ?>>Activo</option>
                        <option value="confirmado" <?php echo ($row->estado == 'confirmado') ? 'selected' : ''; ?>>Confirmado</option>
                        <option value="cancelado" <?php echo ($row->estado == 'cancelado') ? 'selected' : ''; ?>>Cancelado</option>
                    </select>
                <?php echo form_close(); ?>
            </td>
        </tr>
        <?php
        $contador++;
        }
        ?>
    </tbody>
</table>

<!-- Agregar estilos -->
<head>
    <style>
        /* Estilos de tabla */
        .table {
            width: 100%;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
        }
        .thead-dark {
            background-color: #34495e;
            color: #ecf0f1;
        }
        
        /* Colores de estado */
        .estado-pendiente {
            background-color: #ffd700;
        }
        .estado-activo {
            background-color: #32cd32;
            color: #fff;
        }
        .estado-confirmado {
            background-color: #00bfff;
            color: #fff;
        }
        .estado-cancelado {
            background-color: #ff4500;
            color: #fff;
        }
    </style>
</head>
