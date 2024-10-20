<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <br>
            <br>
            <br>
            <br>
            <div class="header">
                <h1>LISTA DE CONDUCTORES</h1>
            </div>

            <h2>Bienvenido <?php echo $this->session->userdata('login'); ?></h2>

            <p><?php echo date('Y/m/d H:i:s'); ?></p>

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="<?php echo base_url(); ?>index.php/conductor/deshabilitados">
                        <button type="button" class="btn btn-warning">CONDUCTORES NO FUNCIONALES</button>
                    </a>

                    <a href="<?php echo base_url(); ?>index.php/conductor/agregar">
                        <button type="button" class="btn btn-primary">AGREGAR USUARIO</button>
                    </a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Foto</th>
                                    <th>Nombre</th>
                                    <th>Primer Apellido</th>
                                    <th>Segundo Apellido</th>
                                    <th>Licencia</th>
                                    <th>Vehículo</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Año</th>
                                    <th>Color</th>
                                    <th>Placa</th>
                                    <th>Propietario</th>
                                    <th>Modificar</th>
                                    <th>Eliminar</th>
                                    <th>Deshabilitar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $contador = 1;
                                foreach ($conductores as $row) { // Cambié a foreach directamente
                                ?>
                                <tr>
                                    <td><?php echo $contador; ?></td>
                                    <td>
                                        <?php 
                                        $foto = $row->foto;
                                        if ($foto == "") {
                                        ?>
                                        <img src="<?php echo base_url(); ?>/uploads/conductor/perfil.jpg" width="50">  
                                        <?php
                                        } else {
                                        ?>
                                        <img src="<?php echo base_url(); ?>/uploads/conductor/<?php echo $foto; ?>" width="50">  
                                        <?php
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $row->nombre; ?></td>
                                    <td><?php echo $row->primerApellido; ?></td>
                                    <td><?php echo $row->segundoApellido; ?></td>
                                    <td><?php echo $row->numConductor; ?></td> <!-- Cambié a numConductor según tu base de datos -->

                                    <!-- Mostrar detalles del vehículo -->
                                    <td><?php echo $row->identificador; ?></td>
                                    <td><?php echo $row->marca; ?></td>
                                    <td><?php echo $row->modelo; ?></td>
                                    <td><?php echo $row->anio; ?></td>
                                    <td><?php echo $row->color; ?></td>
                                    <td><?php echo $row->placa; ?></td>
                                    
                                    <!-- Mostrar propietario solo si no es dueño -->
                                    <td>
                                        <?php if (isset($row->propietarioNombre)) { // Verificar si el propietario existe
                                            echo $row->propietarioNombre . ' ' . $row->propietarioPrimerApellido . ' ' . $row->propietarioSegundoApellido;
                                            echo '<br>Teléfono: ' . $row->propietarioTelefono . '<br>Dirección: ' . $row->propietarioDireccion;
                                        } else {
                                            echo 'Es propietario';
                                        } ?>
                                    </td>

                                    <td>
                                        <?php echo form_open("conductor/modificar"); ?>
                                        <input type="hidden" name="idConductor" value="<?php echo $row->idConductor; ?>">
                                        <button type="submit" class="btn btn-success">Modificar</button>
                                        <?php echo form_close(); ?>
                                    </td>
                                    <td>
                                        <?php echo form_open("conductor/eliminarbd"); ?>
                                        <input type="hidden" name="idConductor" value="<?php echo $row->idConductor; ?>">
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                        <?php echo form_close(); ?>
                                    </td>
                                    <td>
                                        <?php echo form_open("conductor/deshabilitarbd"); ?>
                                        <input type="hidden" name="idConductor" value="<?php echo $row->idConductor; ?>">
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
