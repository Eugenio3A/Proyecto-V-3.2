<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrar Pago</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>modeloLogin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>modeloLogin/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">REGISTRAR PAGO</h1>
                            </div>

                            <?php echo form_open("pagos/agregarbd"); ?>

                            <form class="user">

                                <div class="form-group">
                                    <input type="number" class="form-control" name="solicitud_id" placeholder="ID de Solicitud" required>
                                </div>

                                <div class="form-group">
                                    <input type="number" step="0.01" class="form-control" name="monto" placeholder="Monto" required>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="metodoPago" required>
                                        <option value="">Selecciona Método de Pago</option>
                                        <option value="efectivo">Efectivo</option>
                                        <option value="tarjeta">Tarjeta</option>
                                        <option value="transferenciaQR">Transferencia QR</option>
                                        <option value="tigo money">Tigo Money</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control" name="transaccion_id" placeholder="ID de Transacción" required>
                                </div>

                                <div class="form-group">
                                    <select class="form-control" name="estadoPago" required>
                                        <option value="">Selecciona Estado de Pago</option>
                                        <option value="pendiente">Pendiente</option>
                                        <option value="completado">Completado</option>
                                        <option value="fallido">Fallido</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-user btn-block">Registrar Pago</button>
                                </div>

                                <div class="form-group">
                                    <a href="<?php echo base_url(); ?>index.php/pagos/listaPagos">
                                        <button type="button" class="btn btn-warning btn-user btn-block">Cancelar</button>
                                    </a>
                                </div>

                                <hr>
                            </form>

                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url(); ?>modeloLogin/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>modeloLogin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url(); ?>modeloLogin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url(); ?>modeloLogin/js/sb-admin-2.min.js"></script>

</body>

</html>
