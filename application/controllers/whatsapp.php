<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class WhatsApp extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    // Función para enviar mensajes
    public function enviar_mensaje($numero, $mensaje) {
        // Configuración de la API
        $token = 'YOUR_WHATSAPP_API_TOKEN';  // Token que obtuviste de Facebook
        $phone_number_id = 'YOUR_PHONE_NUMBER_ID';  // ID de tu número de teléfono de WhatsApp
        $url = "https://graph.facebook.com/v13.0/$phone_number_id/messages";

        // Datos del mensaje
        $data = [
            'messaging_product' => 'whatsapp',
            'to' => $numero,
            'type' => 'text',
            'text' => [
                'body' => $mensaje
            ]
        ];

        // Enviar la solicitud con cURL
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token,
            'Content-Type: application/json'
        ]);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        $response = curl_exec($ch);
        curl_close($ch);

        // Decodificar la respuesta
        $response_data = json_decode($response, true);
        if (isset($response_data['error'])) {
            // Si hay un error, mostrarlo
            echo 'Error: ' . $response_data['error']['message'];
        } else {
            echo 'Mensaje enviado correctamente';
        }
    }


    public function index() {
        $this->load->view('whatsapp_form');
    }
    
    public function enviar_mensaje_post() {
        $numero = $this->input->post('numero');
        $mensaje = $this->input->post('mensaje');
        $this->enviar_mensaje($numero, $mensaje);
    }
    
}
