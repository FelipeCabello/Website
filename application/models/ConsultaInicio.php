<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultaInicio extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	
	public function cesta() {
		//CONTAR EL NUMERO DE ARTICULOS QUE TENEMOS EN NUESTRA CESTA
		$sql = "SELECT COUNT(*) as num_cesta from cesta 
			where id_usuario='".$this->session->id_usuario."' 
			AND gestionado='0'";
		$num_cesta = $this->db->query($sql)->result();
		foreach ($num_cesta[0] as $key => $value) {
			$cesta[0][$key] = $value;
		}
		return $cesta;
	}
}