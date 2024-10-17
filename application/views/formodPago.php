<h2>Editar Pago</h2>
<form action="<?php echo site_url('pagos/editar/'.$pago['id_pago']); ?>" method="POST">
    <label for="monto">Monto:</label>
    <input type="text" name="monto" value="<?php echo $pago['monto']; ?>" required><br>
    
    <label for="metodo">Método:</label>
    <select name="metodo">
        <option value="transferencia_QR" <?php echo ($pago['metodo'] == 'transferencia_QR') ? 'selected' : ''; ?>>Transferencia QR</option>
        <option value="tigo_money" <?php echo ($pago['metodo'] == 'tigo_money') ? 'selected' : ''; ?>>Tigo Money</option>
        <option value="tarjeta_debito" <?php echo ($pago['metodo'] == 'tarjeta_debito') ? 'selected' : ''; ?>>Tarjeta de Débito</option>
    </select><br>
    
    <label for="estado">Estado:</label>
    <input type="checkbox" name="estado" value="1" <?php echo ($pago['estado'] == '1') ? 'checked' : ''; ?>><br>

    <label for="idUsuario">ID Usuario:</label>
    <input type="text" name="idUsuario" value="<?php echo $pago['idUsuario']; ?>" required><br>

    <label for="id_reserva">ID Reserva:</label>
    <input type="text" name="id_reserva" value="<?php echo $pago['id_reserva']; ?>"><br>

    <button type="submit">Guardar Cambios</button>
</form>
