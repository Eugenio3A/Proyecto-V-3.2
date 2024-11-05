<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <br><br><br>

            <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800">LISTA DE PARQUEOS</h1>
            <h2>Bienvenido <?php echo $this->session->userdata('cuenta'); ?></h2>

            <p class="m-0 font-weight-bold text-primary"><?php echo date('Y/m/d H:i:s'); ?></p>

            <!-- DataTales Example -->
            <div class="card shadow mb-4">

                <div class="card-header py-3">
                    <a href="<?php echo base_url(); ?>index.php/puestos/deshabilitados">
                        <button type="button" class="btn btn-warning">PARQUEOS NO FUNCIONALES</button>
                    </a>
                    <a href="<?php echo base_url(); ?>index.php/puestos/agregar">
                        <button type="button" class="btn btn-primary">AGREGAR PARQUEO</button>
                    </a>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre</th>
                                    <th>Dirección</th>
                                    <th>Latitud</th>
                                    <th>Longitud</th>
                                    <th>Estado</th>
                                    <th>Creado</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                    <th>Deshabilitar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                foreach ($parqueos->result() as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo $row->nombreParq; ?></td>
                                    <td><?php echo $row->direccion; ?></td>
                                    <td><?php echo $row->latitud; ?></td>
                                    <td><?php echo $row->longitud; ?></td>
                                    <td><?php echo $row->estado ; ?></td>
                                    <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                                    <td>
                                        <?php echo form_open_multipart("parqueo/modificar"); ?>
                                        <input type="hidden" name="idParqueo" value="<?php echo $row->idParqueo; ?>">
                                        <button type="submit" class="btn btn-success">Modificar</button>
                                        <?php echo form_close(); ?>
                                    </td>
                                    <td>
                                        <?php echo form_open_multipart("parqueo/eliminarbd"); ?>
                                        <input type="hidden" name="idParqueo" value="<?php echo $row->idParqueo; ?>">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                        <?php echo form_close(); ?>
                                    </td>
                                    <td>
                                        <?php echo form_open_multipart("parqueo/deshabilitarbd"); ?>
                                        <input type="hidden" name="idParqueo" value="<?php echo $row->idParqueo; ?>">
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
