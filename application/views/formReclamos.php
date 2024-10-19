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
            <h1 class="h3 mb-2 text-gray-800">REGISTRAR RECLAMO</h1>
            <h2>Bienvenido <?php echo $this->session->userdata('cuenta'); ?></h2>

            <p class="m-0 font-weight-bold text-primary"><?php echo date('Y/m/d H:i:s'); ?></p>

            <!-- Formulario para Registrar Reclamo -->
            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">REGISTRAR RECLAMO</h1>
                                </div>

                                <?php echo form_open("reclamos/agregarReclamoBd"); ?>

                                <form class="user">

                                    <!-- Campo para el nombre del cliente -->
                                    <div class="form-group">
                                        <label for="nombre_cliente">Nombre del Cliente:</label>
                                        <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" value="<?php echo $nombre_cliente; ?>" readonly required>
                                    </div>

                                    <!-- Campo para el teléfono del cliente -->
                                    <div class="form-group">
                                        <label for="telefono_cliente">Teléfono del Cliente:</label>
                                        <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" value="<?php echo $telefono_cliente; ?>" readonly required>
                                    </div>

                                    <!-- Campo para el nombre del conductor -->
                                    <div class="form-group">
                                        <label for="nombre_conductor">Nombre del Conductor:</label>
                                        <input type="text" class="form-control" id="nombre_conductor" name="nombre_conductor" value="<?php echo $nombre_conductor; ?>" readonly required>
                                    </div>

                                    <!-- Campo para la placa del vehículo -->
                                    <div class="form-group">
                                        <label for="placa_vehiculo">Placa del Vehículo:</label>
                                        <input type="text" class="form-control" id="placa_vehiculo" name="placa_vehiculo" value="<?php echo $placa_vehiculo; ?>" readonly required>
                                    </div>

                                    <!-- Campo para el mensaje del reclamo -->
                                    <div class="form-group">
                                        <label for="mensaje">Mensaje de Reclamo:</label>
                                        <textarea class="form-control" id="mensaje" name="mensaje" placeholder="Escribe tu mensaje de reclamo" rows="5" required></textarea>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-8 mb-3 mb-sm-0">
                                            <button type="submit" class="btn btn-danger btn-user btn-block">Enviar Reclamo</button>
                                        </div>
                                        <div class="col-sm-4">
                                            <a href="<?php echo base_url(); ?>index.php/cliente/dashboard">
                                                <button type="button" class="btn btn-warning btn-user btn-block">Cancelar</button>
                                            </a>
                                        </div>
                                    </div>

                                    <hr>
                                </form>

                                <hr>

                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->
</div>
