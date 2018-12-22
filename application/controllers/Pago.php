<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pago extends CI_Controller {

	public function __construct() {
		parent::__construct();

		if (!$this->session->sesion)
			header('Location:'.base_url('login'));

		$this->load->model('ConsultaInicio');
		$this->load->model('ConsultaPago');

		header('Access-Control-Allow-Origin: *');

	}

	public function index() {

		$data["cesta"] = $this->ConsultaInicio->cesta();
		$this->load->view('libreria/menu', $data);

		$data["datos"] = $this->ConsultaPago->compraCesta();

		$num =  intval($data["datos"]["pre"]["cantidad"]);


		if ($num <= 0) {
			header('Location:'.base_url('articulo'));
		}

		$this->load->view('pago/index', $data);
		
		$this->load->view('libreria/css');
		$this->load->view('libreria/menu_fin');

	}

	public function realizarPago() {

		$nombre = $this->input->post('nombre');
		$apellidos = $this->input->post('apellidos');
		$email = $this->input->post('email');
		$direccion = $this->input->post('direccion');
		$ciudad = $this->input->post('ciudad');
		$card = $this->input->post('card');
		$num_card = $this->input->post('num_card');
		$fecha_card = $this->input->post('fecha_card');
		$ano_card = $this->input->post('ano_card');
		$cvv = $this->input->post('cvv');

		$this->ConsultaPago->realizarPago($nombre, $apellidos, $email, $direccion, $ciudad, $card, $num_card, $fecha_card, $ano_card, $cvv);

	}
}
