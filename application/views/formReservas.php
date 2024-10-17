<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrar Reserva</title>

    <!-- Custom fonts for this template-->
    <link href=" <?php echo base_url(); ?>modeloLogin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href=" <?php echo base_url(); ?>modeloLogin/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        /* Estilos personalizados para llenar la pantalla y centrar el formulario */
        .full-height {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .bg-gradient-primary {
            background-size: cover;
        }

        .card {
            width: 100%;
            max-width: 700px;
            margin: 0 auto;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container full-height">

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                 
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">CREAR UNA RESERVA</h1>
                            </div>

                            <?php
                                echo form_open_multipart("reservas/agregarbd");
                            ?>

                            <form class="user">
                                <!-- Campo para fecha del servicio -->
                                <div class="form-group">
                                    <input type="datetime-local" class="form-control" name="fechaServicio" placeholder="Fecha del servicio" required>
                                </div>

                                <!-- Campo para origen y destino -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="origen" placeholder="Lugar de origen" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="destino" placeholder="Lugar de destino" required>
                                    </div>
                                </div>

                                <!-- Campo para precio -->
                                <div class="form-group">
                                    <input type="number" step="0.01" class="form-control" name="precio" placeholder="Precio del servicio" required>
                                </div>

                                <!-- Campo para seleccionar el estado de la reserva -->
                                <div class="form-group">
                                    <select class="form-control" name="estado" required>
                                        <option value="pendiente">Pendiente</option>
                                        <option value="confirmada">Confirmada</option>
                                        <option value="completada">Completada</option>
                                        <option value="cancelada">Cancelada</option>
                                    </select>
                                </div>

                                <!-- Campo para seleccionar usuario y vehículo (deberían cargarse desde la base de datos) -->
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <select class="form-control" name="id_usuario" required>
                                            <option value="">Seleccionar Usuario</option>
                                            <!-- Aquí deberías cargar los usuarios desde la base de datos -->
                                            <?php foreach ($usuarios as $usuario): ?>
                                                <option value="<?= $usuario->id_usuario ?>"><?= $usuario->nombre ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-sm-6">
                                        <select class="form-control" name="id_vehiculo" required>
                                            <option value="">Seleccionar Vehículo</option>
                                            <!-- Aquí deberías cargar los vehículos desde la base de datos -->
                                            <?php foreach ($vehiculos as $vehiculo): ?>
                                                <option value="<?= $vehiculo->id_vehiculo ?>"><?= $vehiculo->placa ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <!-- Botones para agregar y cancelar -->
                                <div class="form-group row">
                                    <div class="col-sm-8 mb-3 mb-sm-0">
                                        <button type="submit" class=" btn btn-success btn-user btn-block">Agregar Reserva</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="<?php echo base_url(); ?>index.php/reservas/lista">
                                            <button type="button" class="btn btn-warning btn-user btn-block">Cancelar</button>
                                        </a>
                                    </div>
                                </div>

                            </form>

                            <hr>

                            <?php
                                echo form_close();
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src=" <?php echo base_url(); ?>modeloLogin/vendor/jquery/jquery.min.js"></script>
    <script src=" <?php echo base_url(); ?>modeloLogin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src=" <?php echo base_url(); ?>modeloLogin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src=" <?php echo base_url(); ?>modeloLogin/js/sb-admin-2.min.js"></script>

</body>

</html>
