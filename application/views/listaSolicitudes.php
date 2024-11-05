<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f6f9; min-height: 100vh;">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="header mt-4 mb-4 text-center">
                <h1 style="color: #2c3e50;">Lista de Solicitudes</h1>
            </div>

            <h2 style="color: #2c3e50;">Bienvenido <?php echo $this->session->userdata('cuenta'); ?></h2>
            <p style="color: #7f8c8d;"><?php echo date('Y/m/d H:i:s'); ?></p>

            <div class="card-header py-3 d-flex justify-content-between align-items-center">
        
                <a href="<?php echo base_url('index.php/solicitudes/listaAcignados'); ?>">
                    <button type="button" class="btn btn-danger">Ver Asignados</button>
                </a>
              
                
               
                <a href="<?php echo base_url(); ?>index.php/solicitudes/agregar" class="btn btn-primary">Agregar Reserva</a>
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
                                <th>Teléfono</th>
                                <th>Nombre Cliente</th>
                                <th>Dirección</th>
                                <th>Tipo Servicio</th>
                                <th>No. de Vehículo</th>
                                <th>No. de Parqueo</th>
                                <th>Fecha de Solicitud</th>
                                <th>Estado</th>
                                <th>Modificar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $contador = 1;
                            foreach ($solicitudes as $row) {
                            ?>
                            <tr id="fila_<?php echo $row['idSolicitud']; ?>" class="estado-<?php echo $row['estado']; ?>">
                                <td><?php echo $contador; ?></td>
                                <td><?php echo $row['telefonoCliente']; ?></td>
                                <td><?php echo $row['nombreCliente']; ?></td>
                                <td><?php echo $row['direccionCiente']; ?></td>
                                <td><?php echo $row['tipoServicio']; ?></td>
                                <td><?php echo $row['numConductor']; ?></td>
                                <td><?php echo $row['nombreParqueo']; ?></td>
                                <td><?php echo formatearFecha($row['fechaSolicitud']); ?></td>
                                <td>
                                    <form action="<?php echo base_url('solicitudes/modificarEstado'); ?>" method="post" style="display: inline;" id="estadoForm_<?php echo $row['idSolicitud']; ?>">
                                        <input type="hidden" name="idSolicitud" value="<?php echo $row['idSolicitud']; ?>">
                                        <select name="nuevo_estado" class="form-select" aria-label="Estado de las solicitudes" onchange="cambiarEstado(this, '<?php echo $row['idSolicitud']; ?>')">
                                            <option value="pendiente" <?php echo ($row['estado'] == 'pendiente') ? 'selected' : ''; ?>>Pendiente</option>
                                            <option value="asignado" <?php echo ($row['estado'] == 'asignado') ? 'selected' : ''; ?>>Asignado</option>
                                            <option value="completado" <?php echo ($row['estado'] == 'completado') ? 'selected' : ''; ?>>Completado</option>
                                            <option value="cancelado" <?php echo ($row['estado'] == 'cancelado') ? 'selected' : ''; ?>>Cancelado</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <?php echo form_open("solicitudes/modificar"); ?>
                                    <input type="hidden" name="idSolicitud" value="<?php echo $row['idSolicitud']; ?>">
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


<script>
    function cambiarEstado(selectElement, idSolicitud) {
        var fila = document.getElementById('fila_' + idSolicitud);
        fila.classList.remove('estado-pendiente', 'estado-asignado', 'estado-completado', 'estado-cancelado');

        var nuevoEstado = selectElement.value;
        fila.classList.add('estado-' + nuevoEstado);

        if (nuevoEstado === 'cancelado') {
            var url = "<?php echo base_url('index.php/solicitudes/listaCancelados'); ?>";
            document.getElementById('estadoForm_' + idSolicitud).action = url;
            document.getElementById('estadoForm_' + idSolicitud).submit();
        } else {
            document.getElementById('estadoForm_' + idSolicitud).action = "<?php echo base_url('index.php/solicitudes/modificarEstado'); ?>";
            document.getElementById('estadoForm_' + idSolicitud).submit();
        }
    }
</script>
