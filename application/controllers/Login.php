<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', '', TRUE);
	}

	public function index()
	{
		$data = array('campos' => $this->campos());
		$this->load->view('_login', $data);
	}

	public function campos () {
		$campos = array(

                    'txtusuario' => array(  
                            'name'        => 'strusuario',
                            'id'          => 'strusuario',
                            'type'        =>'text',
                            'required'     => 'true',
                            'class'       => 'form-control ',
                            'value'       =>  set_value('strusuario'),
                            'placeholder'  => 'Correo Electronico'),

                    'txtpass' => array(  
                            'name'        => 'strpassword',
                            'id'          => 'strpassword',
                            'type'        =>'password',
                            'required'     => 'true',
                            'class'       => 'form-control ',
                            'value'       =>  set_value('strpassword'),
                            'placeholder'  => 'Contraseña'), 

                  );
        return $campos;
	}


	public function acceder() {
		try {
			if((isset($_POST) && !empty($_POST))) {

		      if ($this->login_model->login_usuario()) {
		      	redirect("Welcome");
		      } else {
		      	redirect("Login");
		      	// echo json_encode("Usuario o Contraseña no son validos");
		      }

		    } else {
		        show_404();
		    }
		} catch (Exception $e) {
			die($e->getMessaje());
		}
	}


}
