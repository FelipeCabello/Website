<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultaDetalle extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	

	public function detalle($_id) {

		$arr_detalle = array();
		$arr_talla = array();
		$arr_color = array();
		$art_completo = array();
		$art_talla = array();
		$color_completo = array();
		$talla_completo = array();

		$sql = "SELECT * from articulo";
		$sql_talla = "SELECT t.* from articulo a join talla t on a.id = t.id_articulo";
		$sql_color = "SELECT * FROM articulo ";

		if ($_id=="") {
			$sql .= " WHERE 1 ";
			$sql_talla .= " WHERE 1 ";
			$sql_color .= " WHERE 1 ";
		} else {
			$sql .= " WHERE id='".$_id."'";
			$sql_talla .= " WHERE a.id='".$_id."'";
			$sql_color .= " where id_padre=(select id_padre from articulo where id='".$_id."') ";

		}

		$arr_detalle = $this->db->query($sql)->result();
		$arr_talla = $this->db->query($sql_talla)->result();
		$arr_color = $this->db->query($sql_color)->result();

		/* BUCLES ARTICULO */
		foreach ($arr_detalle[0] as $key => $value) {
			$art_completo[0][$key] = $value;
		}

		foreach ($arr_talla[0] as $key => $value) {
			$talla_completo[0][$key] = $value;
		}

		for ($i=0; $i < count($arr_color); $i++) { 
			foreach ($arr_color[$i] as $key => $value) {
				$color_completo[$i][$key] = $value;
			}
		}

		$art_talla = array("detalle" => $art_completo, "talla" => $talla_completo, "color" => $color_completo);
		/*echo "<pre>";
		var_dump( $art_talla["color"][0]['id']);
		echo "</pre>";*/
		return $art_talla;
	
	}

	public function guardarArticulo($_id, $_talla, $_cantidad) {

		$sql = "INSERT INTO cesta VALUES ('".$this->session->id_usuario."', '".$_id."', '".$_cantidad."', '".$_talla."', '0', CURDATE())";
		$this->db->query($sql);
		return true;
	}
}