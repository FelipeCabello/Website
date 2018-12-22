<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script type="text/javascript">
	
	$(document).ready(function(){
		$(".boton_registrar").click(function() {
			$(".login").hide()
			$(".boton_registrar").hide()
			$(".registro").show()
			$(".tipo_pagina").html("Registro")
		})

		$(".cancelar").click(function() {
			$(".registro").hide()
			$(".boton_registrar").show()
			$(".login").show()
			$(".tipo_pagina").html("Inicio de sesión")

		})



		$(".log").click(function() {
			var usuario = $(".log_usuario").val();
			var pass = $(".log_password").val();
			$.post("<?=base_url('Login/login')?>", {usuario:usuario, pass:pass}, function(data){
				if (data=="true") {
					location.assign("<?=base_url()?>"+"./inicio/");
				} else {
					$(".error_log").html("<div class='alert alert-warning' role='alert' style='padding: 6px 10px 6px 10px;'><i class='fas fa-exclamation-triangle'></i> Usuario o contraseña erronea</div>")
				}
			})
		})

		$(".registrarme").click(function() {
			var usuario = $(".reg_usuario").val();
			var pass = $(".reg_password").val();
			var nombre = $(".reg_nombre").val();
			var apellidos = $(".reg_apellidos").val();
			var email = $(".reg_email").val();

			if (usuario=="" || pass=="" || nombre=="" || apellidos=="" || email=="") {
				$(".error_user").html("<div class='alert alert-warning' role='alert' style='padding: 6px 10px 6px 10px;'><i class='fas fa-exclamation-triangle'></i> Completa todos los campos</div>")
			} else {
				$.post("<?=base_url('Login/registro')?>", {usuario:usuario, pass:pass, nombre:nombre, apellidos:apellidos, email:email}, function(data){
					if (data=="true") {
						location.assign("<?=base_url()?>"+"./inicio/");
					} else {
						$(".error_user").html("<div class='alert alert-warning' role='alert' style='padding: 6px 10px 6px 10px;'><i class='fas fa-exclamation-triangle'></i> Error, compruebe los datos</div>")
					}
				})
			}
		})
	})


</script>

<style type="text/css">

	.boton_registrar {
	    width: 70%;
    	padding: 7px 10px;
	    display: block;
	    border: 1px solid #ccc;
	    box-sizing: border-box;
	    background-color: #818182;
	    color: white;
	}

</style>

<div class="cuerpo" style="padding: 5px;">
	<span><a href="<?=base_url()?>./inicio/"><i class="fas fa-chevron-circle-left"></i> Incio</a> > <b class="tipo_pagina">Inicio de sesión</b> </span>
</div>
<div style="border-bottom: 1px solid #c0c1c2"></div>


<div style="margin: auto;width: 50%">
	<div class="row" style="margin-bottom: 40px;">
		<div class="col-sm-12 col-md-6 login">
			<div>
				<h3 style="margin: 35px 0px;">INICIAR SESIÓN</h3>

				<div class="error_log" style="text-align: center;"></div>

			    <label>Usuario</label>
			    <input type="text" placeholder="Introduce usuario" class="log_usuario boton"><br>

			    <label>Contraseña</label>
			    <input type="password" placeholder="Introduce contraseña" class="log_password boton"><br>

			    <span style="display: -webkit-inline-box;">
			      <input type="checkbox" checked="checked" name="recuerdame" class="boton" style="width: 28px;"><label style="margin-top: -6px;">Recuérdame</label>
			    </span>
			    <button class="boton btn-primary btn log">Inicia sesión</button>
			</div>
		</div>


		<div class="col-sm-12 col-md-6 registro" style="display: none">
			<div>
				<h3 style="margin: 35px 0px;">REGÍSTRATE</h3>

				<div class="error_user" style="text-align: center;"></div>

			    <label>Usuario</label>
			    <input type="text" placeholder="Introduce usuario" class="boton reg_usuario"><br>

			    <label>Contraseña</label>
			    <input type="password" placeholder="Introduce contraseña" class="boton reg_password"><br>

			    <label>Nombre</label>
			    <input type="text" placeholder="Introduce nombre" class="boton reg_nombre"><br>
   			    <input type="text" placeholder="Introduce apellidos" class="boton reg_apellidos"><br>

			    <label>Email</label>
			    <input type="email" placeholder="Introduce email" class="boton reg_email"><br>


				<p>Al crear una cuenta, usted acepta nuestros <a href="#" style="color:dodgerblue">Términos y Privacidad</a>.</p>

				<div class="clearfix">
					<button class="btn btn-primary cancelar" style="width: 45%">Cancelar</button>
					<button class="btn btn-primary registrarme" style="width: 45%">Registrarme</button>
				</div>
			</div>
		</div>




		<div class="col-sm-12 col-md-6">
			<h3 style="margin: 35px 0px;">CREAR UNA CUENTA</h3>
			<b>Crea tu cuenta:</b>
			<p>
				<i class="fas fa-check"></i>Una sola cuenta global con la que podrás acceder a todos los productos y servicios<br>
				<i class="fas fa-check"></i>Realiza tu pedido más rápido guardando tus datos de envío y tu forma de pago<br>
				<i class="fas fa-check"></i>Accede a tu historial de pedidos<br>
				<i class="fas fa-check"></i>Realiza el seguimiento de tus envíos<br>
				<i class="fas fa-check"></i>Crea y guarda tu lista de favoritos para no perderles la pista a los productos más deseados<br>
				<i class="fas fa-check"></i>Guarda tus propios diseños<br>
			</p>
		    <button class="boton_registrar btn-primary btn">Registrarse <span style="color: white !important;"><i class="fas fa-chevron-circle-right"></i></span></button>
		</div>
	</div>
</div>


<!-- #228ae6 -->