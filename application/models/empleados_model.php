<?php

class Empleados_model extends CI_Model {


    public function get_empleados()
    {
        $query = $this->db->get('tb01_empleados');
        return $query->result();
    }

    public function insertupdate_empleados()
    {
        $data = array(
            'nombre' => trim($this->security->xss_clean(strip_tags($this->input->post('strnombre')))),
            'apellido' => trim($this->security->xss_clean(strip_tags($this->input->post('strapellido')))),
            'direccion' => trim($this->security->xss_clean(strip_tags($this->input->post('strdescripcion')))),
        );

        $ele = trim($this->security->xss_clean(strip_tags($this->input->post('codsection'))));

        if ($ele==1) { // Insert
            $this->db->insert('tb01_empleados', $data);
        } else { // Update
            $cod_id = trim($this->security->xss_clean(strip_tags($this->input->post('cod'))));
            $this->db->where('id', $cod_id);
            $this->db->update('tb01_empleados', $data);
        }

        $query = $this->db->get('tb01_empleados');
        return $query->result();
    }

    public function delete_empleados()
    {
        $cod_id = trim($this->security->xss_clean(strip_tags($this->input->post('cod'))));
        $this->db->where('id', $cod_id);
        $this->db->delete('tb01_empleados');

        $query = $this->db->get('tb01_empleados');
        return $query->result();
    }



}

?>