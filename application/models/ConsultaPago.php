<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultaPago extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	public function compraCesta() {

		$num_pago = array();
		$pago_art = array();
		$pago_precio = array();
		$pago_total = array();

		$sql = "SELECT * from cesta c left join articulo a on a.id=c.id_articulo where c.id_usuario='".$this->session->id_usuario."' AND gestionado='0' ORDER BY a.nombre";

		$num_pago = $this->db->query($sql)->result();

		for ($i=0; $i < count($num_pago) ; $i++) { 
			foreach ($num_pago[$i] as $key => $value) {
				$pago_art[$i][$key] = $value;
			}
		}

		$sql2 = "SELECT sum(precio_venta*cantidad) as total, sum(cantidad) as cantidad  from cesta c left join articulo a on a.id=c.id_articulo where id_usuario='".$this->session->id_usuario."' AND gestionado='0' ORDER BY a.nombre";

		$pago_precio = $this->db->query($sql2)->result();

		foreach ($pago_precio[0] as $key => $value) {
			$pago_total[$key] = $value;
		}


		$pago_total = array( "art" => $pago_art, "pre" => $pago_total );

		return $pago_total;

	}


	function realizarPago($_nombre, $_apellidos, $_email, $_direccion, $_ciudad, $_card, $_num_card, $_fecha_card, $_ano_card, $_cvv) {

		$sql = "INSERT INTO pago values ( NULL, '".$this->session->id_usuario."', '".$_nombre."', '".$_apellidos."', '".$_email."', '".$_direccion."',	'".$_ciudad."',	'".$_card."', '".$_num_card."', '".$_fecha_card."', '".$_ano_card."', '".$_cvv."', now())";

		$this->db->query($sql);




		/*RESTAR CANTIDAD ARTICULO A LA TABLA TALLA*/

		$restar_total = array();
		$restar_array = array();

		$restar = "select * from cesta where gestionado='0' and id_usuario='".$this->session->id_usuario."';";

		$restar_array = $this->db->query($restar)->result();

		for ($i=0; $i < count($restar_array); $i++) { 
			foreach ($restar_array[$i] as $key => $value) {
				$restar_total[$i][$key] = $value;
			}
		}

		for ($i=0; $i < count($restar_total); $i++) { 
			$restar_cantidad = "UPDATE talla SET ".$restar_total[$i]['talla']." = ".$restar_total[$i]['talla']." - ".$restar_total[$i]['cantidad']." WHERE id_articulo = '".$restar_total[$i]['id_articulo']."'";

			$this->db->query($restar_cantidad);
		}









		/*MARCAR EN LA TABLA CESTA QUE EL ARTICULO ESTA PAGADO*/

		$sql2 = "SELECT (MAX(id)) AS id FROM pago";

		$id_insert = $this->db->query($sql2)->result();

		foreach ($id_insert[0] as $key => $value) {
			$id_insert2[$key] = $value;
		}

		$sql3 = "UPDATE cesta  SET gestionado='".$id_insert2['id']."' WHERE id_usuario='".$this->session->id_usuario."' AND gestionado='0'";

		$this->db->query($sql3);
		echo "true";

	}
	
}