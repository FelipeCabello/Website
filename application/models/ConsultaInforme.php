<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultaInforme extends CI_Model {

	public function __construct() {
		parent::__construct();
		if (!$this->session->sesion && $this->session->privilegio!="root")
			header('Location:'.base_url()."./login/");
	}

	public function obtener_tabla_articulos($ini='', $fin='') {
		$sql = "SELECT * FROM cesta join articulo a on id_articulo=a.id where gestionado>'0' ";

		if ($ini!='') {
			$sql.=" AND CTS>='".$ini."' ";
		}

		if ($fin!='') {
			$sql.=" AND CTS<='".$fin."' ";
		}

		$articulos = $this->db->query($sql)->result();

		$articulos = json_encode($articulos);

		echo $articulos;
	}

}