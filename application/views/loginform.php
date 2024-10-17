
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Usuarios</title>
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
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="<?php echo base_url(); ?>index.php/usuarios"> Ini-Login </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?php echo base_url(); ?>index.php/usuarios">Administrador</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="<?php echo base_url(); ?>index.php/gerenteprop">Gerente</a>
        </li>
      </ul>
    </div>
  </div>

    <div class="login-container">
        <h1>Ingreso al Sistema</h1>
        <br>

        <?php echo form_open_multipart("usuarios/validarusuario"); ?>

        <input type="text" class="form-control" name="login" placeholder="Escribe login" required>
        <input type="password" class="form-control" name="codigo" placeholder="Escribe password" required>
        <button type="submit" class="btn btn-custom">Ingresar</button>
        <hr>

        <?php echo form_close(); ?>

        
       
    </div>
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
