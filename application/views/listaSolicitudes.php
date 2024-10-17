
    <div class="header">
        <h1>LISTA DE SOLICITUDES</h1>
    </div>

    <div class="container">
        <!-- Cerrar sesión -->
        <a href="<?php echo base_url(); ?>index.php/usuarios/logout">
            <button type="button" class="btn btn-primary">Cerrar sesión</button>
        </a>

        <!-- Botones adicionales si los necesitas -->
        <a href="<?php echo base_url(); ?>index.php/reservas/agregar">
            <button type="button" class="btn btn-primary">AGREGAR RESERVA</button>
        </a>

        <!-- Bienvenida y fecha actual -->
        <h2>Bienvenido <?php echo $this->session->userdata('login'); ?></h2>
        <p><?php echo date('Y/m/d H:i:s'); ?></p>

        <!-- Botón para ver reservas deshabilitadas -->
        <a href="<?php echo base_url(); ?>index.php/reservas/deshabilitados">
            <button type="button" class="btn btn-warning">RESERVAS NO FUNCIONALES</button>
        </a>

        <!-- Tabla de reservas -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Familia</th>
                    <th>Teléfono</th>
                    <th>Dirección</th>
                    <th>No. Móvil</th>
                    <th>Tipo Móvil</th>
                    <th>Placa</th>
                    <th>Conductor</th>
                    <th>Teléfono</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                    <th>Deshabilitar</th>
                </tr>
            </thead>
            <tbody>

            <tbody>
    <?php
     $contador = 1;
    if (isset($usuarios) && $usuarios->num_rows() > 0) {
        foreach ($usuarios->result() as $row) {
    ?>
    <tr>
        <td><?php echo $contador; ?></td>
        <td><?php echo $row->familia; ?></td>
        <td><?php echo $row->telefono; ?></td>
        <td><?php echo $row->direccion; ?></td>
        <td><?php echo $row->numero_movil; ?></td>
        <td><?php echo $row->tipo; ?></td>
        <td><?php echo $row->placa; ?></td>
        <td><?php echo $row->nombre_conductor; ?></td>
        <td><?php echo $row->telefono_conductor; ?></td>
        <td>
            <!-- Modificar reserva -->
            <?php echo form_open_multipart("reservas/modificar"); ?>
            <input type="hidden" name="id_reserva" value="<?php echo $row->id_reserva; ?>">
            <button type="submit" class="btn btn-success">Modificar</button>
            <?php echo form_close(); ?>
        </td>
        <td>
            <!-- Eliminar reserva -->
            <?php echo form_open_multipart("reservas/eliminarbd"); ?>
            <input type="hidden" name="id_reserva" value="<?php echo $row->id_reserva; ?>">
            <button type="submit" class="btn btn-danger">Eliminar</button>
            <?php echo form_close(); ?>
        </td>
        <td>
            <!-- Deshabilitar reserva -->
            <?php echo form_open_multipart("reservas/deshabilitarbd"); ?>
            <input type="hidden" name="id_reserva" value="<?php echo $row->id_reserva; ?>">
            <button type="submit" class="btn btn-warning">Deshabilitar</button>
            <?php echo form_close(); ?>
        </td>
    </tr>
    <?php
        }
    } else {
    ?>
    <tr>
        <td colspan="12" class="text-center">No hay registros disponibles</td>
    </tr>
    <?php
    }
    ?>
</tbody>
</table>
</div>




Para integrar la funcionalidad de WhatsApp y gestionar los usuarios en tu aplicación, puedes utilizar la API de WhatsApp junto con tus scripts en PHP. La idea es que cuando se recibe una llamada, se verifique si el usuario ya existe en la base de datos, y si no existe, se redirija a un formulario para agregarlo.

Pasos a seguir:
Implementar un webhook para recibir llamadas de WhatsApp.
Verificar si el usuario ya existe en la base de datos.
Agregar un botón o enlace para redirigir a la página de agregar usuario si no existe.
Mostrar los datos del usuario si ya existe.
Paso 1: Implementar un webhook para recibir llamadas de WhatsApp
Para recibir notificaciones de WhatsApp sobre las llamadas, necesitas configurar un webhook. Este es un URL donde WhatsApp enviará información sobre las llamadas. Puedes usar servicios como ngrok para hacer pruebas locales.

Configura un webhook en tu controlador:
php
Copiar código
public function webhookWhatsApp() {
    // Obtener datos de la llamada desde la solicitud
    $data = json_decode(file_get_contents('php://input'), true);

    // Procesar el número de móvil de la llamada
    $numeroMovil = $data['from']; // Asegúrate de que el índice sea correcto según la estructura de tu JSON

    // Verificar si el usuario ya existe
    $usuario = $this->solicitudes_model->obtenerPorMovil($numeroMovil);

    if ($usuario->num_rows() > 0) {
        // El usuario existe, enviar respuesta o marcar en la tabla
        $this->marcarSolicitud($usuario->row()->id_reserva);
    } else {
        // Redirigir a agregar usuario
        redirect('reservas/agregar?movil=' . $numeroMovil);
    }
}
Paso 2: Verificar si el usuario ya existe
En el modelo Solicitudes_model, ya tienes el método obtenerPorMovil que puedes usar para verificar la existencia del usuario. Si el usuario ya existe, puedes marcar la solicitud como atendida o similar.

Paso 3: Redirigir a la página de agregar usuario
Si el usuario no existe, redirige a una página donde puedas agregar el usuario. En tu controlador, el método webhookWhatsApp envía a reservas/agregar, pasando el número de móvil como un parámetro para que se complete automáticamente.

Paso 4: Mostrar datos del usuario si ya existe
Cuando recibes la información del usuario, puedes mostrarla en tu vista. Aquí hay un ejemplo de cómo podrías estructurarlo en listaSolicitudes.php:

php
Copiar código
// Verificar si existe el usuario y mostrar datos
if (isset($usuario)) {
    echo '<h2>Datos del Usuario:</h2>';
    echo '<p>Nombre: ' . $usuario->nombre_usuario . '</p>';
    echo '<p>Familia: ' . $usuario->familia . '</p>';
    echo '<p>Teléfono: ' . $usuario->telefono . '</p>';
    // Añadir más datos según sea necesario
}
Resumen
Con estos pasos, puedes gestionar la interacción con WhatsApp, verificando si el usuario ya existe y actuando en consecuencia. Recuerda que para utilizar la API de WhatsApp, necesitas seguir sus políticas y posiblemente utilizar una cuenta de WhatsApp Business y un proveedor de API que ofrezca esta funcionalidad.

Notas Adicionales
API de WhatsApp: Asegúrate de que tienes acceso a la API de WhatsApp Business para poder recibir y enviar mensajes. Necesitarás autenticarte y configurar adecuadamente la API para manejar webhooks.

Seguridad: Ten en cuenta la seguridad de tu webhook. Es recomendable validar las solicitudes que recibes para asegurarte de que provienen de WhatsApp.

Testing: Realiza pruebas exhaustivas para verificar que la integración funciona correctamente en todos los escenarios (usuario existe, usuario no existe, errores en la API, etc.).

Con estas configuraciones, tu aplicación debería ser capaz de interactuar con WhatsApp y gestionar usuarios de manera eficiente.

