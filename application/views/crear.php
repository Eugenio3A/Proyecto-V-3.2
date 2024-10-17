
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Crear Nuevo Pago</title>

    <!-- Custom fonts for this template-->
    <link href=" <?php echo base_url(); ?>modeloLogin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
            width: 100%; /* Asegura que la tarjeta ocupe todo el ancho posible */
            max-width: 700px; /* Limita el ancho máximo */
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
                    <!-- Se elimina la clase que oculta la imagen en pantallas pequeñas -->
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">CREAR NUEVO PAGO</h1>
                            </div>

                            <?php
                                echo form_open_multipart("pagos/agregarbd");
                            ?>

                            <form class="user">

                                <div class="form-group row">
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="monto">Monto:</label>
                                        
                                    </div>
                                    <div class="col-sm-5 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="monto" placeholder="Ingresa el monto a pagar" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="metodo">Método:</label>
                                        <select name="metodo">
                                            <option value="transferencia_QR">Transferencia QR</option>
                                            <option value="tigo_money">Tigo Money</option>
                                            <option value="tarjeta_debito">Tarjeta de Débito</option>
                                        </select>
                                        
                                    </div>
                                    
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-2 mb-3 mb-sm-0">
                                        <label for="estado">Estado:</label>
                                        <input type="checkbox" name="estado" value="1" checked><br>
                                    </div>
                                    <div class="col-sm-5">
                                        <label for="idUsuario">ID Usuario:</label>
                                        <input type="text" name="idUsuario" placeholder="Ecrive el id del usuario" required><br>

                                    </div>
                                    <div class="col-sm-5 ">
                                        <label for="id_reserva">ID Reserva:</label>
                                        <input type="text" name="id_reserva" placeholder="Ecrive el id de la reserva" required><br>
                                        
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <button type="submit" class=" btn btn-success btn-user btn-block">Guardar</button>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="<?php echo base_url(); ?>index.php/pagos/index">
                                            <button type="button" class="btn btn-warning btn-user btn-block">Cancelar</button>
                                        </a>
                                    </div>
                                </div>

                                
                                <hr>
                                
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
