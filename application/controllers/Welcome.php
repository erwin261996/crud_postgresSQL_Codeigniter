<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('empleados_model', '', TRUE);
	}

	public function index()
	{
		$data = array('campos' => $this->campos());
		$this->load->view('welcome_message', $data);
	}

	public function campos () {
		$campos = array(
			'txtcodig' => array(
                          'name'        => 'cod',
                          'id'          => 'cod',
                          'type'        => 'hidden',
                          'value'       => set_value('cod')),


			'txtsection' => array(
                          'name'        => 'codsection',
                          'id'          => 'codsection',
                          'type'        => 'hidden',
                          'value'       => set_value('codsection')),


                    'txtnombre' => array(  
                            'name'        => 'strnombre',
                            'id'          => 'strnombre',
                            'type'        =>'text',
                            'required'     => 'true',
                            'class'       => 'form-control ',
                            'value'       =>  set_value('strnombre'),
                            'placeholder'  => 'Escriba un nombre'),

                    'txtapellido' => array(  
                            'name'        => 'strapellido',
                            'id'          => 'strapellido',
                            'type'        =>'text',
                            'required'     => 'true',
                            'class'       => 'form-control ',
                            'value'       =>  set_value('strapellido'),
                            'placeholder'  => 'Escriba un apellido'), 

                    'txtdescripcion' => array(  
                            'name'        => 'strdescripcion',
                            'id'          => 'strdescripcion',
                            'type'        =>'text',
                            'class'       => 'form-control input-circle-right',
                            'rows'        =>'5',
                            'value'       =>  set_value('strdescripcion'),
                            'placeholder'  => 'Escriba una descripcion'), 
                  );
        return $campos;
	}

	public function lista () {
		try {
			if($this->input->is_ajax_request()) {
                $datos['data'] = $this->empleados_model->get_empleados();
		      	echo json_encode($datos);
		    } else {
		        show_404();
		    }
		    $this->db->close();
		} catch (Exception $e) {
			die($e->getMessaje());
		}
	}

	public function insert_update () {
		try {
			if($this->input->is_ajax_request() && (isset($_POST) && !empty($_POST))) {

		      $datos = $this->empleados_model->insertupdate_empleados();
		      echo json_encode($datos);

		    } else {
		        show_404();
		    }
		    $this->db->close();
		} catch (Exception $e) {
			die($e->getMessaje());
		}
	}

	public function delete () {
		try {
			if($this->input->is_ajax_request()) {

		      $datos = $this->empleados_model->delete_empleados();
		      echo json_encode($datos);

		    } else {
		        show_404();
		    }
		    $this->db->close();
		} catch (Exception $e) {
			die($e->getMessaje());
		}
	}


}
