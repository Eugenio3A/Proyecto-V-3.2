<!--<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #2c3e50; /* Fondo oscuro */
            color: #0000; /* Texto claro */
            font-family: 'Arial', sans-serif; /* Tipo de letra */
        }
        h1 {
            color: #f39c12; /* Amarillo dorado */
            text-align: center;
            margin-bottom: 20px;
            font-family: 'Arial', sans-serif;
        }
        h2 {
            color: #f39c12; /* Amarillo dorado */
            font-family: 'Arial', sans-serif;
        }
        p {
            color: #ecf0f1; /* Texto claro */
            font-family: 'Arial', sans-serif;
        }
        .table {
            margin-top: 30px;
            background-color: rgba(255, 255, 255, 0.9); /* Fondo blanco semi-transparente */
            color: #2c3e50; /* Texto oscuro */
        }
        .table thead th {
            color: #2c3e50; /*  */
        }
        .table tbody td {
            color: #2980b9; /* Azul */
        }
        .btn-primary {
            background-color: #3498db; /* Azul claro */
            border-color: #3498db;
            color: #fff; /* Texto blanco */
        }
        .btn-primary:hover {
            background-color: #2980b9; /* Azul */
            border-color: #2980b9;
        }
        .btn-warning {
            background-color: #f39c12; /* Amarillo */
            border-color: #f39c12;
            color: #fff; /* Texto blanco */
        }
        .btn-warning:hover {
            background-color: #e67e22; /* Naranja */
            border-color: #e67e22;
        }
        .btn-success {
            background-color: #2ecc71; /* Verde claro */
            border-color: #2ecc71;
            color: #fff; /* Texto blanco */
        }
        .btn-success:hover {
            background-color: #27ae60; /* Verde */
            border-color: #27ae60;
        }
        .btn-danger {
            background-color: #e74c3c; /* Rojo */
            border-color: #e74c3c;
            color: #fff; /* Texto blanco */
        }
        .btn-danger:hover {
            background-color: #c0392b; /* Rojo oscuro */
            border-color: #c0392b;
        }
        .header {
            text-align: center;
            margin-bottom: 50px;
        }
        .header img {
            max-width: 100px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="<?php echo base_url(); ?>img/taxi-amarillo.jpg" alt="Logo"> 
        <h1>LISTA DE RESERVAS</h1>
    </div>

    <div class="container">
        <a href="<?php echo base_url(); ?>index.php/usuarios/logout">
            <button type="button" class="btn btn-primary">Cerrar sesión</button>
        </a>

        <?php echo form_open_multipart('estudiante/inscribir'); ?>
        <button type="submit" name="buton2" class="btn btn-success">INSCRIBIR ESTUDIANTE</button>
      <?php echo form_close(); ?>



      <?php echo form_open_multipart('estudiante/listapdf'); ?>
        <button type="submit" name="buton2" class="btn btn-success">Lista estudiantes PDF</button>
      <?php echo form_close(); ?>


        <h2>Bienvenido <?php echo $this->session->userdata('login'); ?></h2>

        <p><?php echo date ('Y/m/d H:i:s'); ?></p>

        <a href="<?php echo base_url(); ?>index.php/reservas/deshabilitados">
            <button type="button" class="btn btn-warning">USUARIOS NO FUNCIONALES</button>
        </a>

        <a href="<?php echo base_url(); ?>index.php/reservas/agregar">
            <button type="button" class="btn btn-primary">AGREGAR USUARIO</button>
        </a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>fechaServicio </th>
                    <th>fechaActualizacion</th>
                    <th>origen</th>
                    <th>destino</th>
                    <th>precio</th>
                    <th>estado</th>
                    <th>fechaReserva</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Deshabilitar</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                $contador = 1;
                foreach ($alumnos->result() as $row) {
                ?>
                <tr>
                    <td><?php echo $contador; ?></td>
                    <td><?php echo $row->fechaServicio; ?></td>
                    <td><?php echo $row->fechaActualizacion; ?></td>
                    <td><?php echo $row->origen; ?></td>
                    <td><?php echo $row->destino; ?></td>
                    <td><?php echo $row->precio; ?></td>
                    <td><?php echo $row->estado; ?></td>
                    <td><?php echo formatearFecha($row->fechaReserva); ?></td>
                    <td>

                        <?php echo form_open_multipart("reservas/modificar"); ?>
                        <input type="hidden" name="id_usuario" value="<?php echo $row->id_usuario; ?>">
                        <button type="submit" class="btn btn-success">Modificar</button>
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open_multipart("reservas/eliminarbd"); ?>
                        <input type="hidden" name="id_usuario" value="<?php echo $row->id_usuario; ?>">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open_multipart("reservas/deshabilitarbd"); ?>
                        <input type="hidden" name="id_usuario" value="<?php echo $row->id_usuario; ?>">
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
</body>
</html>-->



<!-- Aquí iría el resto del código para mostrar la lista de reservas -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">


            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <br>
                    <br>
                    <br>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">LISTA DE CLIENTES</h1>
                    <h2>Bienvenido <?php echo $this->session->userdata('login'); ?></h2>

                     <p class="m-0 font-weight-bold text-primary" ><?php echo date ('Y/m/d H:i:s'); ?></p>
   
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        
                        <div class="card-header py-3">
                            <a href="<?php echo base_url(); ?>index.php/reservas/deshabilitados">
                                <button type="button" class="btn btn-warning">USUARIOS NO FUNCIONALES</button>
                            </a>
                            <a href="<?php echo base_url(); ?>index.php/reservas/agregar">
                                <button type="button" class="btn btn-primary">AGREGAR USUARIO</button>
                            </a>
                        </div>

                        <?php if($this->session->flashdata('mensaje')): ?>
    <div class="alert alert-success">
        <?= $this->session->flashdata('mensaje'); ?>
    </div>
<?php endif; ?>

<?php if($this->session->flashdata('error')): ?>
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
                    <th>fechaServicio </th>
                    <th>fechaActualizacion</th>
                    <th>origen</th>
                    <th>destino</th>
                    <th>precio</th>
                    <th>estado</th>
                    <th>fechaReserva</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Deshabilitar</th>
                   
                </tr>
            </thead>
            <tbody>
                <?php
                $contador = 1;
                foreach ($alumnos->result() as $row) {
                ?>
                <tr>
                    <td><?php echo $contador; ?></td>
                    <td><?php echo $row->fechaServicio; ?></td>
                    <td><?php echo $row->fechaActualizacion; ?></td>
                    <td><?php echo $row->origen; ?></td>
                    <td><?php echo $row->destino; ?></td>
                    <td><?php echo $row->precio; ?></td>
                    <td><?php echo $row->estado; ?></td>
                    <td><?php echo formatearFecha($row->fechaReserva); ?></td>
                    <td>

                        <?php echo form_open_multipart("reservas/modificar"); ?>
                        <input type="hidden" name="id_reserva" value="<?php echo $row->id_reserva; ?>">
                        <button type="submit" class="btn btn-success">Modificar</button>
                        <?php echo form_close(); ?>
                    </td>
                    <td>
                        <?php echo form_open_multipart("reservas/eliminar"); ?>
                        <input type="hidden" name="id_reserva" value="<?php echo $row->id_reserva; ?>">
                        <button type="submit" class="btn btn-danger" 
                        onclick="return confirm('¿Estás seguro de que deseas eliminar esta reserva?');">Eliminar</button>
                        <?php echo form_close(); ?>
                    </td>
                    
                    <td>
                        <?php echo form_open_multipart("reservas/deshabilitarbd"); ?>
                        <input type="hidden" name="id_reserva" value="<?php echo $row->id_reserva; ?>">
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

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           