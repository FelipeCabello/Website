<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articulo extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ConsultaArticulo');
		$this->load->model('ConsultaInicio');
		header('Access-Control-Allow-Origin: *');

	}

	public function index() {

		$sexo = $this->input->get('sexo');

		$data["datos"] = $this->ConsultaArticulo->articulo($sexo);

		$data["cesta"] = $this->ConsultaInicio->cesta();
		$this->load->view('libreria/menu', $data);
		$this->load->view('articulo/index', $data);
		$this->load->view('libreria/css');
		$this->load->view('libreria/menu_fin');

	}


	public function filtroTipo(){

		
		$tipo = $this->input->post('tipo');
		$talla = $this->input->post('talla');
		$color = $this->input->post('color');
		$sexo = $this->input->post('sexo');
		$p_min = $this->input->post('p_min');
		$p_max = $this->input->post('p_max');


		$data = $this->ConsultaArticulo->articuloTipo($tipo, $talla, $color, $sexo, $p_min, $p_max);
		$this->load->view('articulo/cuerpo_articulo', $data);


	}


}
