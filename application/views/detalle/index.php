<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$id = $datos["detalle"][0]['id'];

?>

<script type="text/javascript">
	$(document).ready(function() {

		$("#add").click(function(){
			var talla = $("#talla").val();
			var cantidad = $("#cantidad").val();
			var id = <?=$id?>;

			if (talla=='') {
				$(".alerta").html("<div style='color:red; '><i class='fas fa-exclamation-triangle'></i> Elige tu talla</di>");
			} else {
				$(".alerta").html("Elige tu talla")
				add_articulo(id, cantidad, talla);
			}
		});

		function add_articulo(id, cantidad, talla) {
			$.post("<?=base_url('Detalle/addArticulo')?>", {id:id, talla:talla, cantidad:cantidad}, function(data){

				if (data=="true") {
					location.assign("<?=base_url()?>./cesta/");
				} else {
					$(".msj_sesion").html("Debe iniciar sesión.");
				}

			})
		}

	});
</script>

<style type="text/css">
	.marcar {
    	box-shadow: 0px 0px 5px 0px rgb(0, 191, 255);
		border: 1px solid #00BFFF;
	}
</style>

<div class="cuerpo" style="padding: 5px;">
	<span><i class="fas fa-chevron-circle-left"></i> <a href="<?=base_url()?>./inicio/">Incio</a> > <a href="<?=base_url()?>./articulo/">Artículo</a> > <a href="<?=base_url()?>./articulo?sexo=<?=$datos['detalle'][0]['sexo']?>"><?=$datos["detalle"][0]['sexo']?></a> > <b><?=$datos["detalle"][0]['nombre_largo']?></b> </span>
</div>
<div style="border-bottom: 1px solid #c0c1c2"></div>
<div class="cuerpo_detalle row">

	<div class="col-12 col-md-7" style="text-align: center;">
		<img src="<?=base_url()?>./img/<?=$datos['detalle'][0]['imagen']?>" style="" class="img_detalle" >
	</div>

	<div class="col-12 col-md-5">
		<div class="detalle">
			<h2><?=$datos["detalle"][0]['nombre']?></h2>
			<h4><?=$datos["detalle"][0]['nombre_largo']?></h4>
			<h4 style="color: gray"><?=$datos["detalle"][0]['precio_venta']?> €</h4>
			<hr>
			<div class="row">
				<div class="col-6">
					<span class="alerta">Elige tu talla</span>
					<select class="form-control form-control-sm" id="talla">
						<option></option>
							<?php foreach ($datos["talla"][0] as $key => $value):?>
								<?php if ($value!='0' && $key!='id_articulo'):?>
									<option><?=$key?></option>
								<?php endif; ?>
							<?php endforeach; ?>
					</select>
				</div>
				<div class="col-6">			
					<span>Cantidad</span>
					<select class="form-control form-control-sm" id="cantidad">
						<option>1</option>
						<option>2</option>
						<option>3</option>
						<option>4</option>
						<option>5</option>
					</select>
				</div>
			</div>
			<hr>


			<?php if (count($datos["color"])>0):?>
			<span>Elige color</span>
			<div class="row">
				<div class="col">
					<?php for ($i=0; $i < count($datos["color"]); $i++) : ?>
						<?php foreach ($datos["color"][$i] as $key => $value):?>
							<?php if ($key=='imagen'):?>
								<a href="<?=base_url()?>./detalle?id=<?=$datos["color"][$i]['id']?>">
									<img src="<?=base_url()?>./img/<?=$value?>" class="<?php if($datos["color"][$i]['id']==$id){echo 'marcar';}?>" style="width: 60px; float:left;margin: 5px">
								</a>
							<?php endif; ?>
						<?php endforeach; ?>
					<?php endfor;?>
				</div>
			</div>
			<?php endif; ?>

			<div style="text-align: center;">
				<div class="msj_sesion" style="margin-bottom: 10px;color: red"></div>
				<button class="btn btn-secondary" id="add">Añadir al carrito</button>
			</div>
		</div>
	</div>
</div>

