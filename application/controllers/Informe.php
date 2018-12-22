<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informe extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if (!$this->session->sesion && $this->session->privilegio!="admin")
			header('Location:'.base_url()."./login/");

		$this->load->model('ConsultaInicio');
		$this->load->model('ConsultaInforme');

		header('Access-Control-Allow-Origin: *');

	}

	public function index() {

		$data["cesta"] = $this->ConsultaInicio->cesta();
		$this->load->view('libreria/menu', $data);

		$this->load->view('informe/index');
		$this->load->view('libreria/css');
		$this->load->view('libreria/menu_fin');

	}

	public function obtener_tabla_articulos() {
		$ini = $this->input->post('ini');
		$fin = $this->input->post('fin');

		
		$this->ConsultaInforme->obtener_tabla_articulos($ini, $fin);
	}


}
