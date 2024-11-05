<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column" style="background-color: #f7f9fc; min-height: 100vh;">
    <!-- Main Content -->
    <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid pt-5">
            <!-- Page Heading -->

            <br>
            <br>
            <br>
            <br>
            <div class="text-center mb-4">
                <h1 class="h2 mb-2 text-dark font-weight-bold">Lista de Clientes</h1>
                </div>
                <h6 class="text-secondary">Bienvenido, <?php echo $this->session->userdata('cuenta'); ?></h6>
                <p class="text-muted"><?php echo date('Y/m/d H:i:s'); ?></p>
            

            <!-- Buttons Section -->
            <div class="d-flex justify-content-center mb-3">
                <a href="<?php echo base_url(); ?>index.php/cliente/deshabilitados" class="btn btn-outline-warning mx-2">
                    Usuarios No Funcionales
                </a>
                <a href="<?php echo base_url(); ?>index.php/cliente/agregar" class="btn btn-outline-primary mx-2">
                    Agregar Usuario
                </a>
            </div>

            <!-- Card for Table -->
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0" style="border-radius: 8px;">
                            <thead class="thead-dark" style="background-color: #343a40; color: #ffffff;">
                                <tr>
                                    <th>No.</th>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Dirección</th>
                                    <th>Creado</th>
                                    <th>Modificar</th>
                                   
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                foreach ($personas->result() as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $contador; ?></td>
                                    <td><?php echo $row->nombre; ?></td>
                                    <td><?php echo $row->telefono; ?></td>
                                    <td><?php echo $row->direccion; ?></td>
                                    <td><?php echo formatearFecha($row->fechaRegistro); ?></td>
                                    <td>
                                        <?php echo form_open_multipart("cliente/modificar"); ?>
                                        <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
                                        <button type="submit" class="btn btn-outline-success">Modificar</button>
                                        <?php echo form_close(); ?>
                                    </td>
                                    
                                    <td>
                                        <?php echo form_open_multipart("cliente/deshabilitarbd"); ?>
                                        <input type="hidden" name="idCliente" value="<?php echo $row->idCliente; ?>">
                                        <button type="submit" class="btn btn-outline-warning">Eliminar</button>
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
           
        

<!-- CSS Styling -->
<style>
    body {
        font-family: 'Arial', sans-serif;
    }

    .card {
        border: none;
    }

    .btn-outline-primary, .btn-outline-warning, .btn-outline-success, .btn-outline-danger {
        font-weight: bold;
        padding: 10px 15px;
    }

    .table {
        font-size: 0.9rem;
    }

    th, td {
        vertical-align: middle;
    }

    h1, h2 {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
</style>
