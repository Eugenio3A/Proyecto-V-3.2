<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <br><br><br>

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">LISTA DE RESERVAS</h1>
            <h2>Bienvenido <?php echo $this->session->userdata('cuenta'); ?></h2>

            <p class="m-0 font-weight-bold text-primary"><?php echo date('Y/m/d H:i:s'); ?></p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="<?php echo base_url(); ?>index.php/reservas/deshabilitados">
                        <button type="button" class="btn btn-warning">RESERVAS CANCELADAS</button>
                    </a>
                    <a href="<?php echo base_url(); ?>index.php/reservas/agregar">
                        <button type="button" class="btn btn-primary">AGREGAR RESERVA</button>
                    </a>
                </div>

                <?php if ($this->session->flashdata('mensaje')): ?>
                    <div class="alert alert-success">
                        <?= $this->session->flashdata('mensaje'); ?>
                    </div>
                <?php endif; ?>

                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Fecha de Reserva</th>
                                    <th>Tipo de Servicio</th> <!-- Cambiado para mostrar tipo de servicio -->
                                    <th>Cliente</th> <!-- Cambiado para mostrar nombre del cliente -->
                                    <th>Estado</th>
                                    <th>Fecha Actualización</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                    <th>Deshabilitar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                foreach ($reservas->result() as $row) {
                                ?>
                                    <tr>
                                        <td><?php echo $contador; ?></td>
                                        <td><?php echo formatearFecha($row->fechaReserva); ?></td>
                                        <td><?php echo $row->tipoServicio; ?></td> <!-- Mostrando tipo de servicio -->
                                        <td><?php echo $row->cliente_id; // Cambiar según tu estructura ?></td> <!-- Muestra el ID del cliente, cambiar para mostrar nombre -->
                                        <td><?php echo $row->estado; ?></td>
                                        <td><?php echo $row->fechaActualizacion; ?></td>
                                        <td>
                                            <?php echo form_open_multipart("reservas/modificar"); ?>
                                            <input type="hidden" name="idReserva" value="<?php echo $row->idReserva; ?>">
                                            <button type="submit" class="btn btn-success">Modificar</button>
                                            <?php echo form_close(); ?>
                                        </td>
                                        <td>
                                            <?php echo form_open_multipart("reservas/eliminar"); ?>
                                            <input type="hidden" name="idReserva" value="<?php echo $row->idReserva; ?>">
                                            <button type="submit" class="btn btn-danger" 
                                            onclick="return confirm('¿Estás seguro de que deseas eliminar esta reserva?');">Eliminar</button>
                                            <?php echo form_close(); ?>
                                        </td>
                                        <td>
                                            <?php echo form_open_multipart("reservas/deshabilitarbd"); ?>
                                            <input type="hidden" name="idReserva" value="<?php echo $row->idReserva; ?>">
                                            <button type="submit" class="btn btn-warning">Deshabilitar</button>
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
            </div>
