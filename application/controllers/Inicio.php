<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ConsultaInicio');
		header('Access-Control-Allow-Origin: *');

	}

	
	public function index() {

		$data["cesta"] = $this->ConsultaInicio->cesta();

		$this->load->view('libreria/menu', $data);
		$this->load->view('inicio/index');
		$this->load->view('libreria/menu_fin');
		$this->load->view('libreria/css');

		
	}
}
