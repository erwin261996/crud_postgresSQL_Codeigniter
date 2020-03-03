<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('login_model', '', TRUE);
	}

	public function index()
	{
		$data = array('campos' => $this->campos());
		$this->load->view('_register', $data);
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


	public function registro () {
		try {
			if((isset($_POST) && !empty($_POST))) {

		      $this->login_model->register_usuario();

		    } else {
		        show_404();
		    }
		} catch (Exception $e) {
			die($e->getMessaje());
		}
	}


}
