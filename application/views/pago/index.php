<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>

<script type="text/javascript">
	
	$(document).ready(function() {
		
		$(".pagar").click(function() {
			var nombre = $("[name='nombre']").val()
			var apellidos = $("[name='apellidos']").val()
			var email = $("[name='email']").val()
			var direccion = $("[name='direccion']").val()
			var ciudad = $("[name='ciudad']").val()
			var card = $("[name='card']").val()
			var num_card = $("[name='num_card']").val()
			var fecha_card = $("[name='fecha_card']").val()
			var ano_card = $("[name='ano_card']").val()
			var cvv = $("[name='cvv']").val()

			if (nombre=="" || apellidos=="" || email=="" || direccion=="" || ciudad=="" || card=="" || num_card=="" || fecha_card=="" || fecha_card=="" || ano_card=="" || cvv=="") {
				alert("Rellene todos los campos")

			} else {
				$.post("<?=base_url('Pago/realizarPago')?>", {nombre:nombre, apellidos:apellidos, email:email, direccion:direccion, ciudad:ciudad, card:card, num_card:num_card, fecha_card:fecha_card, ano_card:ano_card, cvv:cvv}, function(data){
					//location.assign("<?=base_url('pago')?>");
					location.reload()
				})
			}

		})
	})


</script>


<div class="cuerpo_sm">
	<div class="row">

		<div class="col-md-9">
			<div class="row as">

				<div class="col-md-6">
	            	<h3 style="margin: 35px 0px;">Dirección de envio</h3>
		            <label>Nombre</label>
		            <input type="text" name="nombre" class="boton"><br>
		            <label>Apellidos</label>
		            <input type="text" name="apellidos" class="boton"><br>
		            <label>Email</label>
		            <input type="email" name="email" class="boton"><br>
		            <label>Dirección</label>
		            <input type="text" name="direccion" class="boton"><br>
		            <label>Ciudad</label>
		            <input type="text" name="ciudad" class="boton"><br>
				</div>

				<div class="col-md-6">
		            <h3 style="margin: 35px 0px;">Pago</h3>
		            <label>Tarjetas acceptadas</label>
		            <div style="font-size: 30px;margin: 6px 30px;">
		            	<i class="fab fa-cc-visa"></i> <i class="fab fa-cc-mastercard"></i> <i class="fab fa-cc-amex"></i>
		            </div>
		            <label>Nombre de la tarjeta</label>
		            <input type="text" name="card" placeholder="John More Doe" class="boton"><br>
		            <label>Número de la tarjeta de crédito</label>
		            <input type="text" name="num_card" placeholder="1111-2222-3333-4444" class="boton"><br>
		            <label>Mes exp</label>
					<select class="boton" style="margin-bottom: 20px" name="fecha_card">
						<option>Enero</option>
						<option>Febrero</option>
						<option>Marzo</option>
						<option>Abril</option>
						<option>Mayo</option>
						<option>Junio</option>
						<option>Julio</option>
						<option>Agosto</option>
						<option>Septiembre</option>
						<option>Octubre</option>
						<option>Noviembre</option>
						<option>Diciembre</option>
					</select>
		            <div style="width: 70%">
			            <div style="width: 50%;float: left;">
		                	<label>Año exp</label><br>
		                	<select class="boton" style="width: 100px;padding: 2px" name="ano_card">
								<option>2018</option>
								<option>2019</option>
								<option>2020</option>
								<option>2021</option>
								<option>2022</option>
								<option>2023</option>
								<option>2024</option>
								<option>2025</option>
								<option>2026</option>
								<option>2027</option>
								<option>2028</option>
								<option>2029</option>
							</select>
			            </div>
			            <div style="width: 50%;float: left;">
							<label>CVV</label><br>
		                	<input type="text" name="cvv" placeholder="352" style="width: 100px">
			            </div>
		            	
		            </div>
				</div>
			</div>
		</div>


		<div class="col-md-3" style="margin-top: 40px">
			<div class="div_precio" style="padding: 20px">
				<h5>Total productos: <?=$datos['pre']['cantidad'];?></h5>
				<div style="text-align: right;">
					<?php for ($i=0; $i < count($datos['art']); $i++) :?>
						<p><?=$datos['art'][$i]['cantidad']?> x <?=$datos['art'][$i]['precio_venta']?> €</p>
					<?php endfor ;?>
				</div>
				<hr>
				<h4>Total: <?=round($datos['pre']['total'],2)?> €</h4>
				<p style="font-size: 12px;">{ IVA INCLUIDO <?=round($datos['pre']['total']-$datos['pre']['total']/(1.21),2)?> €}</p>
				<hr>
			</div>
			<div style="text-align: center;margin-top: 40px;margin-bottom: 30px;"><button class="pagar btn btn_negro">Terminar el pago</button></div>

		</div>



	</div>
</div>


<style type="text/css">

	.btn_negro {
		background-color: #2b2b2b;
		color: white;
	}
	
</style>