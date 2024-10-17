<br><br>
<h1>AGREGAR CONDUCTOR</h1>
<br>

<?php
echo form_open_multipart("conductor/agregarbd2");
?>

<input type="text" class="form-control" name="nombre" placeholder="Escribe nombre" required>
<input type="text" class="form-control" name="primerApellido" placeholder="Escribe primer Apellido" minlength="3" maxlength="20" required>
<input type="text" class="form-control" name="segundoApellido" placeholder="Escribe segundo Apellido" minlength="3" maxlength="20" required>
<input type="text" class="form-control" name="licencia" placeholder="Escribe numero de licencia" required>
<input type="number" min="1000000" max="99999999" class="form-control" name="telefono" placeholder="Escribe telefono" required>
<input type="text" class="form-control" name="domicilio" placeholder="Escribe direccion de domicilio" required>
<input type="text" class="form-control" name="antecedentes" placeholder="Escribe antecedentes" required>
<input type="text" class="form-control" name="foto" placeholder="Inserte foto del conductor">

<button type="submit" class="btn btn-success">Agregar Conductor</button>

<?php
echo form_close();
?>



<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrar conductor</title>

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
                                <h1 class="h4 text-gray-900 mb-4">AGREGAR NUEVO CONDUCTOR</h1>
                            </div>

                            <?php
                                echo form_open_multipart("conductor/agregarbd2");
                            ?>

                            <form class="user">

                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="nombre" placeholder="Escribe nombre de Administrador" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="primerApellido" placeholder="Escribe Primer Apellido" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="segundoApellido" placeholder="Escribe Segundo Apellido">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="licencia" placeholder=" número de Lic" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="cargo" required>
                                            <option value="">Selecciona Observaciones</option>
                                            <option value="mañana">Sin Antesedentes</option>
                                            <option value="tarde">Con Antesedentes</option>
                                            <option value="noche">En Proseso</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="number" min="1000000" max="99999999" class="form-control" name="telefono" placeholder="Numero de telefono" required>
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-9 mb-6 mb-sm-0">
                                        <input type="text" class="form-control" name="domicilio" placeholder="Escribe direccion de domicilio" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control" name="foto" placeholder="Inserte foto del conductor">
                                    </div>
                                    
                                </div>

                                
                                <div class="form-group row">
                                    <div class="col-sm-8 mb-3 mb-sm-0">
                                        <button type="submit" class=" btn btn-success btn-user btn-block">Agregar Conductor</button>
                                    </div>
                                    <div class="col-sm-4">
                                        <a href="<?php echo base_url(); ?>index.php/conductor/listaConductores">
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
