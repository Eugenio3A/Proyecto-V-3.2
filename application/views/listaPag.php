
      

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">


<!-- Main Content -->
<div id="content">

    <!-- Begin Page Content -->
    <div class="container-fluid">
        <br>
        <br>
        <br>

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">LISTA DE PAGOS</h1>
        <h2>Bienvenido <?php echo $this->session->userdata('login'); ?></h2>

         <p class="m-0 font-weight-bold text-primary" ><?php echo date ('Y/m/d H:i:s'); ?></p>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            
            <div class="card-header py-3">
                <a href="<?php echo base_url(); ?>index.php/cliente/deshabilitados">
                    <button type="button" class="btn btn-warning">USUARIOS NO FUNCIONALES</button>
                </a>
                <a href="<?php echo base_url(); ?>index.php/pagos/crear">
                    <button type="button" class="btn btn-primary">AGREGAR USUARIO</button>
                </a>
            </div>
           
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                       <tr>
                            <th>No.</th>
                            <th>Monto</th>
                            <th>Método</th>
                            <th>Estado</th>
                            <th>ID Usuario</th>
                            <th>ID Reserva</th>
                            <th>Fecha de Pago</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                            <th>Deshabilitar</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
if (!empty($pagos)) {
    $contador = 1;
    foreach ($pagos as $row) {
?>
<tr>
    <td><?php echo $contador; ?></td>
    <td><?php echo $row->monto; ?></td>
    <td><?php echo $row->metodo; ?></td>
    <td><?php echo $row->estado; ?></td>
    <td><?php echo $row->idUsuario; ?></td>
    <td><?php echo $row->id_reserva; ?></td>
    <td><?php echo formatearFecha($row->fecha_pago); ?></td>
    <td>
        <?php echo form_open_multipart("pagos/editar"); ?>
        <input type="hidden" name="id_pago" value="<?php echo $row->id_pago; ?>">
        <button type="submit" class="btn btn-success">Modificar</button>
        <?php echo form_close(); ?>
    </td>
    <td>
        <?php echo form_open_multipart("pagos/eliminar"); ?>
        <input type="hidden" name="id_pago" value="<?php echo $row->id_pago; ?>">
        <button type="submit" class="btn btn-danger">Eliminar</button>
        <?php echo form_close(); ?>
    </td>
    <td>
        <?php echo form_open_multipart("cliente/deshabilitarbd"); ?>
        <input type="hidden" name="id_pago" value="<?php echo $row->id_pago; ?>">
        <button type="submit" class="btn btn-warning">Deshabilitar</button>
        <?php echo form_close(); ?>
    </td>
</tr>
<?php
    $contador++;
    }
} else {
    echo "<tr><td colspan='10'>No se encontraron pagos.</td></tr>";
}
?>

                    </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

