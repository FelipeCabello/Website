<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('ConsultaLogin');
		header('Access-Control-Allow-Origin: *');

	}

	function index() {
		$this->load->view('libreria/menu');
		$this->load->view('login/index');
		$this->load->view('libreria/css');
		$this->load->view('libreria/menu_fin');



	}

	function login() {
		$usuario = $this->input->post('usuario');
		$pass = $this->input->post('pass');

		$data = $this->ConsultaLogin->login($usuario, $pass);

	}

	function registro() {
		$usuario = $this->input->post('usuario');
		$pass = $this->input->post('pass');
		$nombre = $this->input->post('nombre');
		$apellidos = $this->input->post('apellidos');
		$email = $this->input->post('email');

		$data = $this->ConsultaLogin->registro($usuario, $pass, $nombre, $apellidos, $email);

	}

	function logout() {
		session_destroy();
		header('Location:'.base_url().'./inicio/');

	}


}
