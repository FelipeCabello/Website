<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if (!$this->session->sesion && $this->session->privilegio!="admin")
			header('Location:'.base_url()."./login/");

		$this->load->helper('form');


		$this->load->model('ConsultaInicio');
		$this->load->model('ConsultaAdmin');

		header('Access-Control-Allow-Origin: *');

	}

	
	public function index() {

		$data["cesta"] = $this->ConsultaInicio->cesta();

		$this->load->view('libreria/menu', $data);
		$this->load->view('admin/index');
		$this->load->view('libreria/menu_fin');
		$this->load->view('libreria/css');

	}

	public function obtener_tabla_articulos() {

		$this->ConsultaAdmin->obtener_tabla_articulos();
	}

	public function obtener_datos()	{
		$id = $this->input->post('id');

		$this->ConsultaAdmin->obtener_datos($id);

	}

	public function borrar_datos()	{
		$id = $this->input->post('id');

		$this->ConsultaAdmin->borrar_datos($id);

		header('Location:'.base_url()."./admin/");

	}

	public function insert(){

		$id = $this->input->post('id');
		$nombre = $this->input->post('nombre');
		$nombre_largo = $this->input->post('nombre_largo');
		$precio_compra = $this->input->post('precio_compra');
		$precio_venta = $this->input->post('precio_venta');
		$sexo = $this->input->post('sexo');
		$categoria = $this->input->post('categoria');
		$color = $this->input->post('color');
		$dosXS = $this->input->post('2XS');
		$XS = $this->input->post('XS');
		$S = $this->input->post('S');
		$M = $this->input->post('M');
		$L = $this->input->post('L');
		$XL = $this->input->post('XL');
		$dosXL = $this->input->post('2XL');
		$tresXL = $this->input->post('3XL');


		$file = array();
		$file = $_FILES['fichero_usuario'];

		$this->ConsultaAdmin->img($id, $nombre, $nombre_largo, $precio_compra, $precio_venta, $sexo, $categoria, $color, $dosXS, $XS, $S, $M, $L, $XL, $dosXL, $tresXL, $file);
		header('Location:'.base_url()."./admin/");

	}
}
