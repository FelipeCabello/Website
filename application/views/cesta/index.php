<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/*echo "<pre>";
var_dump($datos['pre']);
echo "</pre>";*/
?>
<script type="text/javascript">

	$(document).ready(function() {

		$(".delete").click(function() {
			var id = $(this).attr("data-id");
			var talla = $(this).attr("data-talla");
			$.post("<?=base_url('Cesta/borrarArt')?>", {id:id, talla:talla}, function(data){
				location.reload()
			})
		})

		$(".imagen").hover(function() {
			$(this).find(".cajon").show()
			}, function() {
			$(this).find(".cajon").hide()
		})

		$(".btn_pagar").click(function() {
			location.assign("<?=base_url('pago')?>");

		})
		
	})

</script>

<div class="cuerpo_sm">


	<div class="row" >

		<div class="col-md-8">

			<div style="padding: 10px 0px;"><span style="font-size: 30px;">Tu cesta </span> (<?=count($datos['art']);?>) ARTÍCULO(S)</div>

			<?php if (count($datos['art'])=='0') :?>
				<div class='alert alert-danger precio_alert' role='alert'>Tu cesta está vacía</div>
			<?php endif ;?>


			
			<?php for ($i=0; $i < count($datos['art']); $i++) :?>
				<div class="row div_articulo" style="border: 1px solid #f1f1f1; margin: 10px;">
					<div class="imagen col-md-3" style="background: #edeff0; text-align: center;">
						<a href="<?=base_url()?>./detalle?id=<?=$datos['art'][$i]['id']?>">
							<img src="<?=base_url()?>./img/<?=$datos['art'][$i]['imagen']?>" style="width: 120px">
						</a>
						<div class="cajon">Pincha aquí</div>
					</div>
					<div class="col-sm-12 col-md-9">
						<div class="row">						
							<div class="col-6 col-md-6">
								<h4><?=$datos['art'][$i]['nombre']?></h4>
								<p>Sexo: <?=$datos['art'][$i]['sexo']?></p>
								<p>Color: <?=$datos['art'][$i]['color']?></p>
								<p>Talla: <?=$datos['art'][$i]['talla']?></p>
							</div>
							<div class="col-6 col-md-6">
								<div style="text-align: right;">
									<p><?=$datos['art'][$i]['precio_venta']?> €</p>
									<p>Cantidad: <?=$datos['art'][$i]['cantidad']?></p>
									<button data-id="<?=$datos['art'][$i]['id']?>" data-talla="<?=$datos['art'][$i]['talla']?>" class="delete btn btn-secondary"><i class="fas fa-times"></i></button>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endfor ;?>
			<div style="text-align: center;margin-top: 20px;">
				<i class="icono fas fa-truck-moving"></i> Entrega gratuita <i class="icono fas fa-history"></i> 100 días de devolución gratuita <i class="icono fas fa-unlock"></i> Pago seguro
			</div>

		</div>



		<div class="col-md-4">
			<div class="div_precio" style="padding: 20px">
				<h5>Total productos: <?=$datos['pre']['cantidad'];?></h5>
				<div style="text-align: right;">
					<?php for ($i=0; $i < count($datos['art']); $i++) :?>
						<p><?=$datos['art'][$i]['cantidad']?> x <?=$datos['art'][$i]['precio_venta']?> €</p>
					<?php endfor ;?>
				</div>
				<hr>
				<h4>Total: <?=round($datos['pre']['total'],2)?> €</h4>
				<p style="font-size: 12px;">{ IVA INCLUIDO <?=round($datos['pre']['total']-$datos['pre']['total']/(1.21),2)?> € }</p>
				<hr>
				<div style="text-align: center;">
					<button style="margin-bottom: 10px;" class="btn btn-secondary btn_pagar">PAGAR</button>
				</div>

			</div>

		</div>

	</div>
</div>


<style type="text/css">
	p {
		margin: 0px;
	}

	.div_articulo {
		box-shadow: 0px 0px 5px 1px rgba(0,0,0,0.3);

	}

	.btn_pagar {
		background-color: #2b2b2b;
	    margin-bottom: 10px;
	    color: white;
	}

	.cajon {
		display: none;
	    height: 40px;
	    position: relative;
	    background-color: #ced4dac9;
	    margin-top: -40px;
	    text-align: center;
	}

	.icono {
		margin-left: 15px;
	}

</style>