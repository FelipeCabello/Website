<?php
	include '../barramenu.php';
?>

<style type="text/css">
	#img {
		text-align: center;
		margin: 0px auto;
		padding: 15px;
	}
	.formulario {
		width: 100%;
		min-height: 30px;
		margin-top: 40px;
		border: 0px;
		border-bottom: 1px solid #706fd3;
	}
	.formulario:focus {
		outline: 0px;
		border: 0px;
		border-bottom: 2px solid #706fd3;
	}
	.boton {
		color: #222;
	    background-color: #f5f5f5;
	    font-size: 17px;
	    padding: 10 40px;
	    border: 1px solid #706fd3;
	    border-radius: 0px;
        margin: 20 0 20 0;
        margin-left: -60px;
        left: 50%;
        position: absolute;
	}
	.marcado {
		color: white;
		background-color: #706fd3;
		border: 1px solid #706fd3;
	}
	.errorSpan {
		padding-top: 5px;
		color: #706fd3;
	}
	#politicas {
		margin-right: 7px;
	}
	.contacto {
		color: #706fd3;
	}
	.contacto:hover {
		color: #706fd3;
	}
	.ui-dialog-titlebar {
		display: none;
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){

		function formulario($_type) {
			if ($_type == "1") {
				$("#texto").css("height", "150px");
				$("#texto").html("  -- Estoy interesado en la Página Básica. --  \n ")
			} else if ($_type == "2") {
				$("#texto").css("height", "150px");
				$("#texto").html("  -- Estoy interesado en la Página Intermedia. --  \n ")
			} else if ($_type == "3") {
				$("#texto").css("height", "150px");
				$("#texto").html("  -- Estoy interesado en la Página Avanzada. --  \n ")
			}
		}

		<?php if (isset($_GET['type'])): ?>
			
			formulario(<?=$_GET['type']?>);
			
		<?php endif ?>


		$(".boton").click(function(){

			var politicas = document.getElementById("politicas");

		    var nombre = $("#nombre").val();
		    var email = $("#email").val();
		    var asunto = $("#asunto").val();
		    var texto = $("#texto").val();
			
		    if (nombre == null || nombre.length == 0 || /^\s+$/.test(nombre)) {
		    	$("#nombre").next().html("Completa este campo");
		    	return false;
		    } else {
		    	$("#nombre").next().html("");
		    }

		    if ( !(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email)) ) {
		    	$("#email").next().html("Completa este campo con un correo eletrónico");
		    	return false;
		    } else {
		    	$("#email").next().html("");
		    }

		    if (asunto == null || asunto.length == 0 || /^\s+$/.test(asunto)) {
		    	$("#asunto").next().html("Completa este campo");
		    	return false;
		    } else {
		    	$("#asunto").next().html("");
		    }

		    if (texto == null || texto.length == 0 || /^\s+$/.test(texto)) {
		    	$("#texto").next().html("Completa este campo");
		    	return false;
		    } else {
		    	$("#texto").next().html("");
		    }

			if (politicas.checked != true) {
				$("#politicas").next().next().html("Debes aceptar las condiciones de uso y privacidad");
		    	return false;
			};

			$("#politicas").prop("checked", false);

			$("#dialog").dialog();
			$.post("correo.php", {nombre:nombre, email:email, asunto:asunto, texto:texto}, function(data){
				if (data) {
					$("#dialog").dialog('close');
					alert("No se ha podido enviar el mensaje en este momento. Intentalo de nuevo más tarde.")
				} else {
					$("#dialog").dialog('close');
		        	alert("Mensaje enviado");
				}
		    });
		});

		$(".boton").hover(function(){
			$(this).addClass("marcado");
				}, function() {
			$(this).removeClass("marcado")
		});


	});
</script>


<div style="background: #1a1a1a;">
	<div class="container" id="imga">
		<img src="../img/contacto3.png" style="width: 100%;">
	</div>
</div>
<hr id="hr-normal">



<div class="container" style="margin-top: 60px;">
	<h1>Contacto</h1>
	<p>Enviame tus preguntas y las respondere entre las primera 24/48 horas.</p>
	<hr id="hr" style="margin-top: 60px">
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<input type="text" id="nombre" placeholder="Nombre" class="formulario">
			<span class="errorSpan"></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-12  col-lg-6">
			<input type="text" id="email" placeholder="Email" class="formulario">
			<span class="errorSpan"></span>
		</div>
		<div class="col-sm-12 col-md-12  col-lg-6">
			<input type="text" id="asunto" placeholder="Asunto" class="formulario">
			<span class="errorSpan"></span>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<textarea placeholder="Escribe aquí..." id="texto" style="width: 100%" class="formulario"></textarea>
			<span class="errorSpan"></span>
		</div>
	</div>
	<div class="row" style="margin-top: 20px;">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<input type="checkbox" name="políticas" id="politicas">
			<label style="margin: 0px;">Acepto las <a href="/camarlengo/aviso-legal/" class="contacto">condiciones de uso y privacidad</a></label>
			<p class="errorSpan"></p>
		</div>
	</div>
	<div class="row"  style="position: relative; height: 100px;">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<input type="button" value="Enviar" class="btn boton">
			<br>
			<br>
		</div>
	</div>
</div>

<div id="dialog" style="text-align: center; padding-top: 40px; display: none;">
	<i class="fa fa-spinner fa-pulse fa-fw" style="font-size: 60px;"></i>
	<p style="padding-top: 40px;">Enviando...</p>
</div>

<?php
	include '../finmenu.php';
?>

	