<!DOCTYPE html>
<html lang="es">
<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Usuarios</title>
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>modeloLogin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>modeloLogin/css/sb-admin-2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #ffdd00, #ff4500, #e63600);
            background-size: 400% 400%;
            animation: gradientAnimation 15s ease infinite;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: 'Roboto', sans-serif;
            color: #ffffff;
            margin: 0;
        }

        @keyframes gradientAnimation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 350px;
            color: #333333;
        }

        h1 {
            color: #e63600; /* Rojo llamativo */
            margin-bottom: 20px;
            font-family: 'Pacifico', cursive;
        }

        .form-control {
            border-radius: 25px;
            margin-bottom: 15px;
            border: 1px solid #e63600; /* Rojo llamativo */
        }

        .btn-custom {
            background-color: #ff4500; /* Naranja llamativo */
            color: #ffffff;
            border-radius: 25px;
            padding: 10px 20px;
            border: none;
            font-weight: bold;
            font-family: 'Roboto', sans-serif;
        }

        .btn-custom:hover {
            background-color: #e63600; /* Rojo llamativo */
        }

        hr {
            border-top: 2px solid #ff4500; /* Naranja llamativo */
            width: 80%;
            margin: 20px auto;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark fixed-top">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" 
      data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
    </div>
  </nav>
  <div class="collapse" id="sidebarMenu">
    <div class="bg-dark p-4">
      <ul class="nav flex-column">
        <br> 
    
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="<?php echo base_url(); ?> index.php/usuarios"> Ini-Login </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?php echo base_url(); ?> index.php/usuarios">Usuario</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?php echo base_url(); ?>index.php/adminLogin">Administrador</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?php echo base_url(); ?>index.php/conductorLogin">Conductor</a>
        </li>
      </ul>
    </div>
  </div>

<body class="bg-gradient-primary">
    
    <div class="container">                                   

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">             
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"> BIEN VENIDO! Administrador </h1>
                                    </div>
                                    

                                    <?php echo form_open_multipart ("usuarios/validarusuario"); ?>
                                    <form class="user">
                                        <div class="form-group">
                                             <input type="email"  class="form-control" name="cuenta" placeholder="Escribe tu email" required>
                                        </div>
                                        <div class="form-group">
                                             <input type="password" class="form-control" name="contrasena" placeholder="Escribe tu contraseña" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recdordar
                                                    </label>
                                            </div>
                                        </div>
                                           <button type="submit" class="btn btn-primary btn-user btn-block">Iniciar Secion</button>
                                        <hr>
                                        <a href="<?php echo base_url(); ?>modeloLogin/index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Iniciar Secion con Google
                                        </a>
                                        <a href="<?php echo base_url(); ?>modeloLogin/index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Iniciar Secion con Facebook
                                        </a>
                                    </form>
                                    <?php echo form_close(); ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url(); ?>modeloLogin/forgot-password.html">Olvidaste tu contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="<?php echo base_url(); ?>index.php/administrador/registrar">Crear nueva Cuenta!</a>
                                    </div>
                                </div>
                            </div>
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

<style>
  body {
    padding-top: 56px; /* Ajusta este valor si el tamaño de la navbar cambia */
  }
  
  .navbar-toggler {
    position: fixed;
    top: 15px;
    left: 15px;
    z-index: 1030;
  }
  
  #sidebarMenu {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100%;
    z-index: 1040;
    background-color: #343a40; /* Mismo color de la barra superior */
    transition: transform 0.3s ease-in-out;
  }
</style>
