
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Registrar administrador</title>

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
                                <h1 class="h4 text-gray-900 mb-4">CREAR CUENTA ADMINISTRADOR</h1>
                            </div>

                            <?php
                                echo form_open_multipart("administrador/registrarbd");
                            ?>

                            <form class="user">

                            <div class="form-group row justify-content-center">
    <div class="col-sm-8 mb-3 mb-sm-0">
        <select name="id" class="form-control form-select form-select-lg" required>
            <option value="" disabled selected>Seleccione una...</option>
            <?php foreach ($cargos->result() as $row): ?>
                <option value="<?php echo $row->id; ?>"><?php echo $row->nombreCargo; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
</div>
  


                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="ciNit" placeholder="Ingresa numero CI" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="turno" placeholder="Ingresa turno " required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="fotos" placeholder="Ingrese su foto">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-4 mb-3 mb-sm-0">
                                        <input type="text" class="form-control" name="nombre" placeholder="Escribe nombre" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="primerApellido" placeholder="Escribe Primer Apellido" required>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="text" class="form-control" name="segundoApellido" placeholder="Escribe Segundo Apellido">
                                    </div>
                                </div>




<div class="form-group">
    <input type="email" class="form-control" name="email" placeholder="Escribe email" required>
</div>

<div class="form-group row">
    <div class="col-sm-6 mb-3 mb-sm-0">
        <!-- Campo de contraseña con validaciones -->
        <input type="password" class="form-control form-control-user" 
               id="exampleInputPassword" name="contrasena" 
               placeholder="Escribe contraseña" minlength="4" maxlength="250" required>
    </div>
    <div class="col-sm-6">
        <input type="password" class="form-control form-control-user"
               id="exampleRepeatPassword" placeholder="Repetir contraseña" minlength="3" maxlength="250" required>
    </div>
</div>

<div class=" form-group row">
    <div class="col-sm-8 mb-3 mb-sm-0">
        <button type="submit" class=" btn btn-success btn-user btn-block">Registrar Cuenta Usuario</button>
    </div>
    <div class="col-sm-4">
        <a href="<?php echo base_url(); ?>index.php/usuarios/logoutAdmin">
            <button type="button" class="btn btn-warning btn-user btn-block">Cancelar</button>
        </a>
    </div>
</div>


<hr>
<a href=" <?php echo base_url(); ?>modeloLogin/index.html" class="btn btn-google btn-user btn-block">
    <i class="fab fa-google fa-fw"></i> Registrar con Google
</a>
<a href=" <?php echo base_url(); ?>modeloLogin/index.html" class="btn btn-facebook btn-user btn-block">
    <i class="fab fa-facebook-f fa-fw"></i> Registrar con Facebook
</a>
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
