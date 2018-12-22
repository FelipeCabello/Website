<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultaCesta extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	

	public function cargarArticulo() {

		$num_cesta = array();
		$cesta_art = array();
		$cesta_precio = array();
		$cesta_total = array();

		$sql = "SELECT * from cesta c left join articulo a on a.id=c.id_articulo where id_usuario='".$this->session->id_usuario."' AND gestionado='0' ORDER BY a.nombre";

		$num_cesta = $this->db->query($sql)->result();

		for ($i=0; $i < count($num_cesta) ; $i++) { 
			foreach ($num_cesta[$i] as $key => $value) {
				$cesta_art[$i][$key] = $value;
			}
		}

		$sql2 = "SELECT sum(precio_venta*cantidad) as total, sum(cantidad) as cantidad  from cesta c left join articulo a on a.id=c.id_articulo where id_usuario='".$this->session->id_usuario."' AND gestionado='0' ORDER BY a.nombre";

		$cesta_precio = $this->db->query($sql2)->result();

		foreach ($cesta_precio[0] as $key => $value) {
			$cesta_total[$key] = $value;
		}


		$cesta_total = array( "art" => $cesta_art, "pre" => $cesta_total );

		return $cesta_total;
	}


	public function borrarArt($_id, $_talla) {

		$sql = "DELETE from cesta where id_usuario='".$this->session->id_usuario."' AND id_articulo='".$_id."' AND talla='".$_talla."';";

		$this->db->query($sql);

	}


}