<?php

class Login_model extends CI_Model {



    public function login_usuario()
    {
        $data = array(
            0 => trim($this->security->xss_clean(strip_tags($this->input->post('strusuario')))),
            1 => md5(trim($this->security->xss_clean(strip_tags($this->input->post('strpassword')))))
        );

        // $this->db->where('usuario', $data[0]);
        // $this->db->where('pass', $data[1]);
        // $query = $this->db->get('tb00_usuario');
        $query = $this->db->query("select * from tb00_usuario t0 where t0.usuario = '$data[0]' AND t0.pass = '$data[1]' AND t0.estado = 2");
        if ($query->num_rows()>0) {
            return true;
        } else {
            return false;
        }

    }

    public function register_usuario()
    {
        $data = array(
            0 => trim($this->security->xss_clean(strip_tags($this->input->post('strusuario')))),
            1 => md5(trim($this->security->xss_clean(strip_tags($this->input->post('strpassword')))))
        );

        $this->db->query("insert into tb00_usuario (usuario, pass, estado) values ('$data[0]', '$data[1]', 2)");
        $this->db->close();
        redirect('Login');

    }




}

?>