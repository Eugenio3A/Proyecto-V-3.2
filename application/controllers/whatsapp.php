<?php

class WhatsApp {

    public function enviar_mensaje($numero, $mensaje) {
        // Configuración de la API
        $token = 'EAAMvNi3AR34BOZCBD06U08T14LARRH9NZAEvBDpUhcYpGCQjBTSjNnKpLlkJwZCtcVqk74bMXR8K6MpZBjZCmurYZB5JmIPvkP0ycV8N5yd29NWOTANmOxEtEexNXzFxGiIrq9faJwiD3YcJZChVZA6Bdmy7rIeOOCttZAkInaGRQtcxZCXN95L0IA4kdPIOqljj0JgSpG1jxFTeHNWp0pkrOtkQZAj5IkZD';  // Reemplaza con tu nuevo token de acceso
        $phone_number_id = '451246348073709';  // Reemplaza con tu ID de número de teléfono de WhatsApp
        $url = 'https://graph.facebook.com/v20.0/451246348073709/messages';

        // Datos del mensaje
        $data = [
            'messaging_product' => 'whatsapp',
            'to' => $numero,  // El número debe estar en formato internacional, ej: +521234567890
            'type' => 'text',
            'text' => [
                'body' => $mensaje
            ]
        ];

        // Iniciar cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        // Forzar cURL a utilizar HTTP/1.1
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        
        // Habilitar la depuración
        curl_setopt($ch, CURLOPT_VERBOSE, true);

        // Ejecutar cURL y capturar la respuesta
        $response = curl_exec($ch);

        // Verificar errores de cURL
        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            echo "Error en cURL: " . $error_msg;
            return;
        }

        curl_close($ch);

        // Decodificar la respuesta
        $response_data = json_decode($response, true);
        if (isset($response_data['error'])) {
            // Mostrar el error si existe
            echo 'Error: ' . $response_data['error']['message'];
        } else {
            echo 'Mensaje enviado correctamente';
        }
    }
}

// Ejemplo de uso
$whatsapp = new WhatsApp();
$numero_destino = '+59176909838';  // Reemplaza con el número destino
$mensaje = '¡Hola! Este es un mensaje de prueba.';
$whatsapp->enviar_mensaje($numero_destino, $mensaje);
