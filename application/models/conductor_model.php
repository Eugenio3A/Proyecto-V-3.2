<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conductor_model extends CI_Model {

    public function listaconductores()
    {
        $this->db->select('*');
        $this->db->from('conductores');
        $this->db->where('estado', '1'); // Asegúrate de que el estado sea correcto
        return $this->db->get(); // Devuelve el resultado
    }

    public function listaconductoresConDetalles()
    {
        $this->db->select('c.*, v.*, p.*');
        $this->db->from('conductores c');
        $this->db->join('vehiculos v', 'v.conductor_id = c.idConductor'); // Unir con vehículos
        $this->db->join('vehiculo_propietario vp', 'vp.vehiculo_id = v.idVehiculo'); // Unir con propietario
        $this->db->join('propietarioVehiculo p', 'p.idPropietario = vp.propietario_id'); // Unir con propietarios
        $this->db->where('c.estado', '1'); // Asegúrate de que el estado sea correcto
        return $this->db->get(); // Devuelve el resultado
    }

    public function listadeshabilitados1()
    {
        $this->db->select('*');
        $this->db->from('conductores');
        $this->db->where('estado', '0'); // Cambia 'disponible' a 'estado'
        return $this->db->get(); // Devuelve el resultado
    }

    public function agregarconductores($data)
    {
        $this->db->insert('conductores', $data);
        return $this->db->insert_id(); // Retorna el ID del conductor agregado
    }

    public function agregarVehiculo($data)
    {
        $this->db->insert('vehiculos', $data);
        return $this->db->insert_id(); // Retorna el ID del vehículo agregado
    }

    public function agregarPropietario($data)
    {
        $this->db->insert('propietarioVehiculo', $data);
        return $this->db->insert_id(); // Retorna el ID del propietario agregado
    }

    public function relacionarVehiculoPropietario($vehiculo_id, $propietario_id)
    {
        $data = [
            'vehiculo_id' => $vehiculo_id,
            'propietario_id' => $propietario_id
        ];
        $this->db->insert('vehiculo_propietario', $data);
    }

    public function recuperarconductores($id_conductor)
    {
        $this->db->select('*');
        $this->db->from('conductores');
        $this->db->where('idConductor', $id_conductor);
        return $this->db->get(); // Devuelve el resultado
    }

    public function modificarconductores($id_conductor, $data)
    {
        $this->db->where('idConductor', $id_conductor);
        $this->db->update('conductores', $data);
    }

    public function eliminarconductores($id_conductor)
    {
        $this->db->where('idConductor', $id_conductor);
        $this->db->delete('conductores');
    }

    public function obtenerVehiculoPorConductor($id_conductor)
    {
        $this->db->select('*');
        $this->db->from('vehiculos');
        $this->db->where('conductor_id', $id_conductor);
        return $this->db->get(); // Devuelve el resultado
    }
}
