<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cesta extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if (!$this->session->sesion)
			header('Location:'.base_url('login'));

		$this->load->model('ConsultaInicio');
		$this->load->model('ConsultaCesta');
		header('Access-Control-Allow-Origin: *');

	}

	public function index() {

		$data["cesta"] = $this->ConsultaInicio->cesta();
		$this->load->view('libreria/menu', $data);

		$data["datos"] = $this->ConsultaCesta->cargarArticulo();
		$this->load->view('cesta/index', $data);
		
		$this->load->view('libreria/css');
		$this->load->view('libreria/menu_fin');

	}

	public function borrarArt() {
		$id = $this->input->post('id');
		$talla = $this->input->post('talla');

		$this->ConsultaCesta->borrarArt($id, $talla);

	}
}
