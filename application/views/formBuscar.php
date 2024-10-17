<!-- Formulario de búsqueda -->
<div class="container">
    <form action="<?php echo base_url(); ?>index.php/estudiante/buscarPorMovil" method="post" class="form-inline">
        <input type="text" name="numero_movil" class="form-control" placeholder="Número de Móvil" required>
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
</div>
