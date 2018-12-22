<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultaArticulo extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	

	public function articulo($_sexo) {
		$arr_total = array();
		$categoria_completo = array();
		$query = "SELECT categoria from articulo";
		if ($_sexo=="") {
			$query .= " WHERE 1 ";
		} else {
			$query .= " WHERE sexo='".$_sexo."'";
		}
		$query .= " GROUP BY categoria;";
		$arr_categoria = $this->db->query($query)->result();
		/* BUCLES ARTICULO */
		for ($i=0; $i < count($arr_categoria); $i++) { 
			foreach ($arr_categoria[$i] as $key => $value) {
				$categoria_completo[$i] = $value;
			}
		}
		$arr_total = array("categoria"=> $categoria_completo);
		return $arr_total;
	}



	public function articuloTipo($_tipo, $_talla, $_color, $_sexo, $_p_min, $_p_max) {
		$sexo = $_sexo;
		$arr_categoria = array();
		$result_query = array();
		$arr_total = array();
		$query = "SELECT * from articulo a join talla t on a.id = t.id_articulo";
		if ($sexo=="") {
			$query .= " WHERE 1 ";
		} else {
			$query .= " WHERE sexo='". $sexo ."' ";
		}
		if ($_tipo!="") {
			for ($i=0; $i < count($_tipo); $i++) {
				if ($i=="0") {
					$query .= " AND ( categoria='".$_tipo[$i]."'";
				} else {
					$query .= " OR categoria='".$_tipo[$i]."'";
				}
			}
			$query .= ")";
		}
		if ($_talla!="") {
			for ($i=0; $i < count($_talla); $i++)
				$query .= " AND ".$_talla[$i]."!='0'";
		}

		if ($_color!="") {
			for ($i=0; $i < count($_color); $i++)
				$query .= " AND color='".$_color[$i]."'";
			
		}
		if ($_p_min!="" || $_p_min='0')
			$query .= "AND precio_venta>='".$_p_min."' ";

		if ($_p_max!="" || $_p_max='0')
			$query .= "AND precio_venta<='".$_p_max."' ";

		$query .= "and (2XS>5 or XS>5 or S>5 or M>5 or L>5 or XL>5 or 2XL>5 or 3XL>5) ORDER BY categoria";
		$result_query = $this->db->query($query)->result();

		/* BUCLES ARTICULO */
		for ($i=0; $i < count($result_query); $i++) { 
			foreach ($result_query[$i] as $key => $value) {
				$articulo_completo[$i][$key] = $value;
			}
		}
		$arr_categoria = $this->db->query("SELECT categoria from articulo GROUP BY categoria;")->result();
		/* BUCLES ARTICULO */
		for ($i=0; $i < count($arr_categoria); $i++) { 
			foreach ($arr_categoria[$i] as $key => $value) {
				$categoria_completo[$i] = $value;
			}
		}
		/* GENERADOR HTML ARTICULOS */
		$html = " ";
		if (count($result_query)!=0) {
			for ($i=0; $i < count($articulo_completo); $i++) { 


					$html .= "<div class='articulo'>";
					$html .= "<a href='".base_url()."./detalle?id=".$articulo_completo[$i]['id_articulo']."'>";
					$html .= "<div>";
					$html .= "<img src='".base_url()."./img/".$articulo_completo[$i]['imagen']."' style='width: 230;height: 230;'>";
					$html .= "</div>";
					$html .= "<div style='text-align: center;'>";
					$html .= "<p class='titulo'>".$articulo_completo[$i]['nombre']."</p>";
					$html .= "<p class='titulo_largo'>".$articulo_completo[$i]['nombre_largo']."</p>";
					$html .= "<p class='precio'>".$articulo_completo[$i]['precio_venta']." €</p>";
					$html .= "</div>";
					$html .= "</a>";
					$html .= "</div>";
			}
		}
		//$arr_total = array($html);
		/*return $arr_total;*/
		if (count($result_query)!=0) {
			echo $html;
		} else {
			echo "
			<div class='alert alert-warning' role='alert'>
			  <strong>Lo sentimos</strong> No hemos encontrado ningún articulo con esas características
			</div>
			";
		}
		//echo $query."<br>";
		//var_dump($articulo_completo);
	}

}