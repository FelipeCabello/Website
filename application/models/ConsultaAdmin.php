<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultaAdmin extends CI_Model {

	public function __construct() {
		parent::__construct();
		if (!$this->session->sesion && $this->session->privilegio!="admin")
			header('Location:'.base_url()."./login/");
	}
	

	public function obtener_tabla_articulos() {

		$sql = "SELECT * FROM articulo";

		$articulos = $this->db->query($sql)->result();

		$articulos = json_encode($articulos);

		echo $articulos;
	}

	public function obtener_datos($id)	{
		$sql = "SELECT * from articulo a left join talla t on a.id=t.id_articulo WHERE id='".$id."'";

		$datos_articulos = $this->db->query($sql)->result();

		$datos_articulos = json_encode($datos_articulos);

		echo $datos_articulos;
	}

	public function borrar_datos($id)	{

		$resultado = array();
		$resultado_total = array();
		$sql3 = "SELECT * FROM articulo WHERE id='".$id."'";
		


		$resultado = $this->db->query($sql3)->result();

		foreach ($resultado[0] as $key => $value) {
			$resultado_total[0][$key] = $value;
		}

		$nombre_img = $resultado_total[0]['imagen'];

		unlink($_SERVER['DOCUMENT_ROOT']."/proyecto/img/".$nombre_img);
		
		$sql = "DELETE FROM articulo WHERE id='".$id."'";
		$sql2 = "DELETE FROM talla WHERE id_articulo='".$id."'";

		$this->db->query($sql);
		$this->db->query($sql2);

	}



	public function img($id, $nombre, $nombre_largo, $precio_compra, $precio_venta, $sexo, $categoria, $color, $dosXS, $XS, $S, $M, $L, $XL, $dosXL, $tresXL, $file)	{


		$img = $_FILES['fichero_usuario']['name'];

		$dir_subida = $_SERVER['DOCUMENT_ROOT']."/proyecto/img/";

		$fichero_subido = $dir_subida.basename($_FILES['fichero_usuario']['name']);
		
		if (move_uploaded_file($_FILES['fichero_usuario']['tmp_name'], $fichero_subido)) {

			if ($id!="") {
				/* EDITAR ARTICULO CON IMAGEN */

				$sql = "UPDATE articulo SET nombre='".$nombre."', nombre_largo='".$nombre_largo."', precio_compra='".$precio_compra."', precio_venta='".$precio_venta."', sexo='".$sexo."', categoria='".$categoria."', color='".$color."', imagen='".$img."' WHERE id='".$id."';";

				$sql2 = "UPDATE talla SET 2XS='".$dosXS."', XS='".$XS."', S='".$S."', M='".$M."', L='".$L."', XL='".$XL."', 2XL='".$dosXL."', 3XL='".$tresXL."' WHERE id_articulo='".$id."';";


				$this->db->query($sql);
				$this->db->query($sql2);


			} else {
				/* NUEVO ARTICULO CON IMAGEN */
				
				$resultado_total = array();
				$resultado = array();

				$sql = "INSERT INTO articulo (nombre, nombre_largo, precio_compra, precio_venta, sexo, categoria, color, imagen)
				VALUES ('".$nombre."', '".$nombre_largo."', '".$precio_compra."', '".$precio_venta."', '".$sexo."', '".$categoria."', '".$color."', '".$img."')";

				$this->db->query($sql);

				$sql_insert = "SELECT * from articulo where nombre='".$nombre."' and nombre_largo='".$nombre_largo."' and precio_compra='".$precio_compra."' and precio_venta='".$precio_venta."' and sexo='".$sexo."' and categoria='".$categoria."' and color='".$color."' ";


				$resultado = $this->db->query($sql_insert)->result();

				foreach ($resultado[0] as $key => $value) {
					$resultado_total[0][$key] = $value;
				}

				$id_art_insert = $resultado_total[0]['id'];


				$sql_talla = "INSERT INTO talla (id_articulo, 2XS, XS, S, M, L, XL, 2XL, 3XL)
				VALUES ('".$id_art_insert."', '".$dosXS."', '".$XS."', '".$S."', '".$M."', '".$L."', '".$XL."', '".$dosXL."', '".$tresXL."'  )";

				//echo $sql_talla;
				//echo $id_art_insert;

				$this->db->query($sql_talla);			
			}

		} else {
				/* EDITAR ARTICULO SIN IMAGEN */

				$sql = "UPDATE articulo SET nombre='".$nombre."', nombre_largo='".$nombre_largo."', precio_compra='".$precio_compra."', precio_venta='".$precio_venta."', sexo='".$sexo."', categoria='".$categoria."', color='".$color."' WHERE id='".$id."';";

				$sql2 = "UPDATE talla SET 2XS='".$dosXS."', XS='".$XS."', S='".$S."', M='".$M."', L='".$L."', XL='".$XL."', 2XL='".$dosXL."', 3XL='".$tresXL."' WHERE id_articulo='".$id."';";

				$this->db->query($sql);
				$this->db->query($sql2);
		}

	}


}
