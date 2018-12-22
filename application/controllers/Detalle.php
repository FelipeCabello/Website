<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detalle extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ConsultaDetalle');
		$this->load->model('ConsultaInicio');
		header('Access-Control-Allow-Origin: *');

	}

	public function index(){

		$id = $this->input->get('id');
		
		$data["datos"] = $this->ConsultaDetalle->detalle($id);


		$data["cesta"] = $this->ConsultaInicio->cesta();
		$this->load->view('libreria/menu', $data);
		$this->load->view('detalle/index', $data);

		$this->load->view('libreria/css');
		$this->load->view('libreria/menu_fin');

	}

	public function addArticulo(){

		if ($this->session->sesion) {

			$id = $this->input->post('id');
			$talla = $this->input->post('talla');
			$cantidad = $this->input->post('cantidad');
			
			$this->ConsultaDetalle->guardarArticulo($id, $talla, $cantidad);

			echo "true";

		} else {
			echo "false";
		}


	}
}
