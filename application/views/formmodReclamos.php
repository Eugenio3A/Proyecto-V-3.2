<h1>Editar Reclamo</h1>

<!-- Mostrar errores de validación -->
<?= validation_errors(); ?>

<form method="post" action="<?= site_url('reclamos/editar/' . $reclamo->idReclamo); ?>" class="form-horizontal">
    <div class="form-group">
        <label for="mensaje">Mensaje</label>
        <textarea name="mensaje" class="form-control" required><?= $reclamo->mensaje; ?></textarea>
    </div>

    <div class="form-group">
        <label for="estado">Estado</label>
        <select name="estado" class="form-control">
            <option value="pendiente" <?= $reclamo->estado == 'pendiente' ? 'selected' : ''; ?>>Pendiente</option>
            <option value="resuelto" <?= $reclamo->estado == 'resuelto' ? 'selected' : ''; ?>>Resuelto</option>
            <option value="cerrado" <?= $reclamo->estado == 'cerrado' ? 'selected' : ''; ?>>Cerrado</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>
</form>
