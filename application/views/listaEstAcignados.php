
    <!-- Main Content -->
 <br>
 <br>
 <br>
 <br>
<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f4f6f9; min-height: 100vh;">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
                       <!-- Encabezado de la página -->
<div class="header mt-4 mb-4 text-center">
    <h2 style="color: #2c3e50;">Lista de Solicitudes Asignadas</h2>
</div>


            <h6 style="color: #2c3e50;">Bienvenido <?php echo $this->session->userdata('cuenta'); ?></h6>
            <p style="color: #7f8c8d;"><?php echo date('Y/m/d H:i:s'); ?></p>


<div class="d-flex justify-content-end mb-4">
    <a href="<?php echo base_url(); ?>index.php/solicitudes/lista">
        <button type="button" class="btn btn-warning">VER LISTA PENDIENTES</button>
    </a>
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



<!-- Tabla de Solicitudes Asignadas -->
<div class="card-body mt-4">
    <div class="table-responsive">

        <table class="table table-bordered table-hover">
            <thead style="background-color: #34495e; color: #ecf0f1;">
                <tr>
                    <th>No.</th>
                    <th>Teléfono</th>
                    <th>Nombre Cliente</th>
                    <th>Dirección</th>
                    <th>Tipo de Servicio</th>
                    <th>No. de Vehículo</th>
                    <th>No. de Parqueo</th>
                    <th>Fecha de Asignación</th>
                    <th>Modificar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $contador = 1;
                if (!empty($solicitudes)) {
                    foreach ($solicitudes as $row) {
                        // Asignar color de fila basado en el estado
                        $estadoClase = '';
                        switch ($row['estado']) {
                            case 'asignado':
                                $estadoClase = 'estado-asignado';
                                break;
                            case 'completado':
                                $estadoClase = 'estado-completado';
                                break;
                            case 'cancelado':
                                $estadoClase = 'estado-cancelado';
                                break;
                            default:
                                $estadoClase = 'estado-pendiente';
                        }
                ?>
                <tr class="<?php echo $estadoClase; ?>">
                    <td><?php echo $contador; ?></td>
                    <td><?php echo $row['telefonoCliente']; ?></td>
                    <td><?php echo $row['nombreCliente']; ?></td>
                    <td><?php echo $row['direccionCiente']; ?></td>
                    <td><?php echo $row['tipoServicio']; ?></td>
                    <td><?php echo $row['numConductor']; ?></td>
                    <td><?php echo $row['nombreParqueo']; ?></td>
                    <td><?php echo formatearFecha($row['fechaAsignacion']); ?></td>
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
                } else {
                    echo "<tr><td colspan='9' class='text-center'>No hay solicitudes asignadas.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Estilos personalizados para los estados -->
