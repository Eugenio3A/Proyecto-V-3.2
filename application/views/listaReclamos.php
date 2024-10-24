<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <br><br><br>

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">LISTA DE RECLAMOS</h1>
            <h2>Bienvenido <?php echo $this->session->userdata('cuenta'); ?></h2>

            <p class="m-0 font-weight-bold text-primary"><?php echo date('Y/m/d H:i:s'); ?></p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <a href="<?php echo base_url(); ?>index.php/reclamos/reclamo">
                        <button type="button" class="btn btn-primary">AGREGAR RECLAMO</button>
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre Cliente</th>
                                    <th>Teléfono</th>
                                    <th>Mensaje</th>
                                    <th>Fecha</th>
                                    <th>Estado</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                foreach ($reclamos->result() as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo $row->nombre; ?></td>
                                    <td><?php echo $row->telefono; ?></td>
                                    <td><?php echo $row->mensaje; ?></td>
                                    <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                                    <td><?php echo $row->estado; ?></td>
                                    <td>
                                        <?php echo form_open_multipart("reclamos/editarReclamo/".$row->idReclamo); ?>
                                        <input type="hidden" name="idReclamo" value="<?php echo $row->idReclamo; ?>">
                                        <button type="submit" class="btn btn-success">Modificar</button>
                                        <?php echo form_close(); ?>
                                    </td>
                                    <td>
                                        <?php echo form_open_multipart("reclamos/eliminarReclamo/".$row->idReclamo); ?>
                                        <input type="hidden" name="idReclamo" value="<?php echo $row->idReclamo; ?>">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
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
        </div>
        <!-- End of Main Content -->
    </div>
</div>
