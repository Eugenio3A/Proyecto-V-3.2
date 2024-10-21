<!DOCTYPE html>
<html>
<head>
    <title>Enviar Mensaje por WhatsApp</title>
</head>
<body>

    <h1>Enviar Mensaje por WhatsApp</h1>
    <form action="<?= site_url('whatsapp/enviar_mensaje'); ?>" method="post">
        <label for="numero">Número de WhatsApp (con código de país):</label><br>
        <input type="text" id="numero" name="numero" required><br><br>
        
        <label for="mensaje">Mensaje:</label><br>
        <textarea id="mensaje" name="mensaje" required></textarea><br><br>
        
        <button type="submit">Enviar Mensaje</button>
    </form>

</body>
</html>
