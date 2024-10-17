<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Solicitudes_model extends CI_Model {

    // Nueva función para obtener los datos según la consulta SQL especificada
    public function listarSolic()
    {
        // Definimos la consulta con la cláusula JOIN para combinar las tablas
        $this->db->select('
            U.nombre AS nombre_usuario, 
            U.familia, 
            U.telefono, 
            U.direccion, 
            V.numMovil AS numero_movil, 
            V.tipo, 
            V.placa, 
            C.nombre AS nombre_conductor, 
            C.telefono AS telefono_conductor
        ');
        $this->db->from('usuarios U');
        $this->db->join('reservas R', 'R.id_reserva = U.id_usuario'); // Relación usuarios-reservas
        $this->db->join('vehiculos V', 'V.id_vehiculo = R.id_vehiculo'); // Relación reservas-vehiculos
        $this->db->join('conductores C', 'C.id_vehiculo = V.id_vehiculo'); // Relación vehiculos-conductores
        $this->db->order_by('U.nombre', 'ASC'); // Ordenar por el nombre del usuario

        return $this->db->get(); // Devuelve el resultado de la consulta
    }

    // Función para listar solo usuarios activos
    public function listaestudiantes()
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('activo', '1');
        return $this->db->get(); // Devuelve el resultado
    }

    // Función para listar usuarios deshabilitados
    public function listadeshabilitados()
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('activo', '0');
        return $this->db->get(); // Devuelve el resultado
    }

    // Función para agregar un nuevo estudiante
    public function agregarestudiante($data)
    {
        $this->db->insert('usuarios', $data);
    }

    // Función para eliminar un estudiante
    public function eliminarestudiante($id_usuario)
    {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->delete('usuarios');
    }

    // Función para recuperar los datos de un estudiante
    public function recuperarestudiante($id_usuario)
    {
        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->where('id_usuario', $id_usuario);
        return $this->db->get(); // Devuelve el resultado
    }

    // Función para modificar un estudiante existente
    public function modificarestudiante($id_usuario, $data)
    {
        $this->db->where('id_usuario', $id_usuario);
        $this->db->update('usuarios', $data);
    }

    
}
