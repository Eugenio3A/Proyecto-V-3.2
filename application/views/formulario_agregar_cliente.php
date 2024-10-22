<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Cliente</title>
</head>
<body>
    <h1>Agregar Cliente</h1>
    <form action="<?php echo site_url('SolicitudController/agregar_cliente'); ?>" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" required><br>

        <label for="direccion">Dirección:</label>
        <input type="text" name="direccion"><br>

        <input type="submit" value="Agregar Cliente">
    </form>
</body>
</html>
