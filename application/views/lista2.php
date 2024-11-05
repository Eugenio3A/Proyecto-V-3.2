<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <br><br><br>
            <div class="header text-center mb-4">
                <h1 class="h3 mb-0 text-gray-800">Lista de Conductores</h1>
                </div>
                <h2 class="h5">Bienvenido <?php echo $this->session->userdata('cuenta'); ?></h2>
                <p class="text-muted"><?php echo date('Y/m/d H:i:s'); ?></p>
            

            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <div>
                        <a href="<?php echo base_url(); ?>index.php/conductor/deshabilitados" class="btn btn-warning btn-sm">Conductores No Funcionales</a>
                        <a href="<?php echo base_url(); ?>index.php/conductor/agregar" class="btn btn-primary btn-sm">Agregar Usuario</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                    <th>Licencia</th>
                                    <th>Teléfono</th>
                                    <th>Cuenta Email</th>
                                    <th>Domicilio</th>
                                    <th>Detalle</th>
                                    <th>Creado</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                foreach ($conductor->result() as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $contador; ?></td>
                                    <td>
                                        <img src="<?php echo base_url(); ?>/uploads/conductor/<?php echo $row->foto ? $row->foto : 'perfil.jpg'; ?>" width="50" class="img-fluid rounded-circle" alt="Foto de Conductor">
                                    </td>
                                    <td><?php echo $row->nombre; ?></td>
                                    <td><?php echo $row->primerApellido; ?></td>
                                    <td><?php echo $row->segundoApellido; ?></td>
                                    <td><?php echo $row->licencia; ?></td>
                                    <td><?php echo $row->telefono; ?></td>
                                    <td><?php echo $row->cuenta; ?></td>
                                    <td><?php echo $row->domicilio; ?></td>
                                    <td><?php echo $row->detalleChofProp; ?></td>
                                    <td><?php echo formatearFecha($row->fechaCreacion); ?></td>
                                    <td>
                                        <?php echo form_open_multipart("conductor/modificar"); ?>
                                        <input type="hidden" name="idConductor" value="<?php echo $row->idConductor; ?>">
                                        <button type="submit" class="btn btn-warning btn-sm">Modificar</button>
                                        <?php echo form_close(); ?>
                                    </td>
                                    <!-- <td>
                                        <?php echo form_open_multipart("conductor/eliminarbd"); ?>
                                        <input type="hidden" name="idConductor" value="<?php echo $row->idConductor; ?>">
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                        <?php echo form_close(); ?>
                                    </td>-->
                                    <td>
                                        <?php echo form_open_multipart("conductor/deshabilitarbd"); ?>
                                        <input type="hidden" name="idConductor" value="<?php echo $row->idConductor; ?>">
                                        <button type="submit" class="btn  btn-danger btn-sm">Eliminar</button>
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
        

<!-- CSS Styling -->
<style>
    .header {
        margin-bottom: 30px;
    }

    .card-header {
        background-color: #f8f9fa;
        border-bottom: 2px solid #007bff;
    }

    .table th {
        background-color: #007bff;
        color: white;
        text-align: center;
    }

    .table td {
        vertical-align: middle;
    }

    .img-fluid {
        max-width: 50px;
        height: auto;
    }
</style>
