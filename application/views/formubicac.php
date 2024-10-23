public function registrarUbicacion() {
    $id_conductor = $this->input->post('id_conductor');
    $latitud = $this->input->post('latitud');
    $longitud = $this->input->post('longitud');

    $data = array(
        'id_conductor' => $id_conductor,
        'latitud' => $latitud,
        'longitud' => $longitud,
        'timestamp' => date('Y-m-d H:i:s')
    );

    $this->db->insert('seguimiento_conductores', $data);
    echo json_encode(array('status' => 'success'));
}
