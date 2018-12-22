<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ConsultaLogin extends CI_Model {

	public function __construct() {
		parent::__construct();
	}
	

	function login($_usuario, $_pass) {

		// COMPROBAR EL USUARIO
		$sql = "SELECT * from usuario where usuario='".$_usuario."' and password=md5('".$_pass."'); ";

		$usuario_result = $this->db->query($sql)->result();

		foreach ($usuario_result[0] as $key => $value) {
			$usuario[0][$key] = $value;
		}

		if (count($usuario_result)=='1') {
			echo "true";
			$this->session->id_usuario = $usuario[0]['id'];
			$this->session->nombre = $usuario[0]['usuario'];
			$this->session->email = $usuario[0]['email'];
			$this->session->privilegio = $usuario[0]['privilegio'];
			$this->session->sesion = TRUE;
		} else {
			echo "false";
		}


		/*echo "<pre>";
		var_dump($usuario);
		echo "</pre>";*/
	}

	function registro($_usuario, $_pass, $_nombre, $_apellidos, $_email) {

		// COMPROBAR SI EL USUARIO EXISTE
		$sql = "SELECT * from usuario where usuario='".$_usuario."'";

		$usuario_result = $this->db->query($sql)->result();

		if (count($usuario_result)!='0') {

			// SI EXISTE DEVOLVEMOS "FALSE"
			echo "false";
		} else {

			// SI NO EXISTE HACEMOS LA INSERCION Y LO GUARDAMOS EN LA VARIABLE SESSION
			$insert = "INSERT INTO usuario value (NULL, '".$_nombre."', '".$_apellidos."', '".$_usuario."', md5('".$_pass."'), '".$_email."', 'usuario');";

			$this->db->query($insert);

			$sql = "SELECT * from usuario where usuario='".$_usuario."'";

			$usuario_result = $this->db->query($sql)->result();

			foreach ($usuario_result[0] as $key => $value) {
				$usuario[0][$key] = $value;
			}
			if (count($usuario_result)=='1') {
				$this->session->id_usuario = $usuario[0]['id'];
				$this->session->nombre = $usuario[0]['usuario'];
				$this->session->email = $usuario[0]['email'];
				$this->session->privilegio = $usuario[0]['privilegio'];
				$this->session->sesion = TRUE;
			}

			echo "true";
		}

	}

}