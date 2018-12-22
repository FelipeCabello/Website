<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$sexo = $this->input->get('sexo');

?>

<script type="text/javascript">
	$(document).ready(function() {

		Array.prototype.removeItem = function (a) {
			for (var i = 0; i < this.length; i++) {
				if (this[i] == a) {
					for (var i2 = i; i2 < this.length - 1; i2++) {
						this[i2] = this[i2 + 1];
					}
						this.length = this.length - 1;
					return;
				}
			}
		};


		$(".titulo_tipo").click(function(){
			if ( $(this).next(".cuerpo_tipo").css("display") == "none" ) {
				$(this).next(".cuerpo_tipo").toggle("fast");
				$(this).find(".flecha").html("<i class='fas fa-angle-right'></i>");

			} else {
				$(this).next(".cuerpo_tipo").toggle("fast");
				$(this).find(".flecha").html("<i class='fas fa-angle-down'></i>");
			};
		});

		$(".titulo_tipo").hover(function(){
			$(this).css("cursor","pointer");
			$(this).css({"background-color": "gray", "color":"white !important"});
			}, function() {
			$(this).css({"background-color": "#edeff0", "color":"white !important"});
		});

		$(".categoria_select").hover(function(){
			$(this).css("cursor","pointer");
			$(this).css({"background-color": "#edeff0", "color":"white !important"});
			}, function() {
			$(this).css("background-color", "white");
		});

		$(".color_select").hover(function(){
			$(this).css("cursor","pointer");
		});

    	$('.color').hover(function(){
    		$(this).css("cursor","pointer");
        	$(this).css("border", "2px solid #818182");
        }, function(){
        	$(this).css("cursor","pointer");
        	$(this).css("border", "2px solid #b6b6b6");
        });

    	$('.talla').hover(function(){
    		$(this).css("cursor","pointer");
        	$(this).css("border", "2px solid #818182");
        }, function(){
        	$(this).css("cursor","pointer");
        	$(this).css("border", "2px solid #b6b6b6");
        });











		var filtro_categoria = []; 
		$(".categoria_select").click(function(){
			if ($(this).attr('class') == "categoria_select marcada") {
				$(this).removeClass("marcada")
				filtro_categoria.removeItem($(this).text());
				cargar_articulo();
			} else {
				$(this).addClass("marcada")
				filtro_categoria[filtro_categoria.length] = $(this).text();
				cargar_articulo();
			};
		});


		var filtro_talla = []; 
		$(".talla_select").click(function(){
			if ($(this).attr('class') == "talla talla_select marcada") {
				$(this).removeClass("marcada")
				filtro_talla.removeItem($(this).text());
				cargar_articulo();

			} else {
				$(this).addClass("marcada")
				filtro_talla[filtro_talla.length] = $(this).text();
				cargar_articulo();
			};
		});

		var filtro_color = []; 
		$(".color_select").click(function(){
			if ($(this).attr('class') == "color color_select color_marcada") {
				$(this).removeClass("color_marcada")
				filtro_color.removeItem($(this).attr('color'));
				cargar_articulo();

			} else {
				$(this).addClass("color_marcada")
				filtro_color[filtro_color.length] = $(this).attr('color');
				cargar_articulo();
			};
		});

		var precio_min = '0';
		$(".precio_min").change(function(){
			precio_min = $(this).val();
			cargar_articulo();
			error_precio();
		});

		var precio_max = '100';
		$(".precio_max").change(function(){
			precio_max = $(this).val();
			cargar_articulo();
			error_precio();
		});

		function error_precio() {
			if ((precio_max-precio_min)<'0') {
				$('.error_precio').html("<div class='alert alert-danger precio_alert' role='alert'>Valores erróneo</div>");
			} else {
				$('.error_precio').html('')
			}
		}
		function cargar_articulo() {
			var sexo = "<?=$sexo?>"

			$(".cuerpo_articulos").html("<div style='text-align:center;font-size:50px;padding: 50;'> <i class='fas fa-spinner fa-pulse'></i> </div>")
			
			$.post("<?=base_url('Articulo/filtroTipo')?>", {tipo:filtro_categoria, talla:filtro_talla, color:filtro_color, sexo:sexo, p_min:precio_min, p_max:precio_max}, function(data){
				$(".cuerpo_articulos").html(data)
			})
		}

		cargar_articulo();






		$('.articulo').click(function(){
			alert('asdf');
		});





	});
</script>



<style type="text/css">
	.marcada {
		background-color: #9be6ff !important;
		color: black;
	}
	.color {
		width: 40;
		height: 40;
		float: left;
		margin: 5;
		border: 2px solid #b6b6b6;
	}

	.talla {
		width: 40;
		height: 30;
		float: left;
		margin: 5;
		border: 2px solid #b6b6b6;		
	}

	.color_marcada {
		width: 40;
		height: 40;
		float: left;
		margin: 5;
		border: 4px solid gray!important;
    	box-shadow: 0px 0px 5px 0px rgb(0, 191, 255);
	}

	.precio_alert {
		text-align: center;
	    padding: 5px;
	    font-size: 12;
	    margin-top: 5px;
	    margin-bottom: 0px;
	}

</style>


<div class="cuerpo" style="padding: 5px">
	<span><i class="fas fa-chevron-circle-left"></i> <a href="<?=base_url()?>./inicio/">Incio</a> > <a href="<?=base_url()?>./articulo/">Artículo</a> > <b><?=$sexo?></b> </span>
</div>
<div style="border-bottom: 1px solid #c0c1c2"></div>

<div class="cuerpo">






	<div class="filtro" onselectstart="return false">



		<div class="titulo_tipo">
			<div>CATEGORIA <span class="flecha"><i class='fas fa-angle-right'></i></span></div>
		</div>
		<div class="cuerpo_tipo" style="display: block">
			<?php for ($a=0; $a < count($datos["categoria"]); $a++):?>
				<div class="categoria_select" value="<?=$datos['categoria'][$a]?>"><?=$datos["categoria"][$a]?></div>
			<?php endfor;?>
		</div>
		



		<div class="titulo_tipo">
			<div>TALLA <span class="flecha"><i class='fas fa-angle-right'></i></span></div>
		</div>
		<div class="cuerpo_tipo cuerpo_tipo_talla" style="display: block;">
			<div class="col-md-12">
			    <div class="center-block centrado_sm" style="height: 80px">
			    	<div class="talla talla_select" style="text-align: center;">2XS</div>
					<div class="talla talla_select" style="text-align: center;">XS</div>
					<div class="talla talla_select" style="text-align: center;">S</div>
					<div class="talla talla_select" style="text-align: center;">M</div>
					<div class="talla talla_select" style="text-align: center;">L</div>
					<div class="talla talla_select" style="text-align: center;">XL</div>
					<div class="talla talla_select" style="text-align: center;">2XL</div>
					<div class="talla talla_select" style="text-align: center;">3XL</div>
			    </div>
			</div>
		</div>




		<div class="titulo_tipo">
		<div>COLOR <span class="flecha"><i class='fas fa-angle-right'></i></span></div>
		</div>
		<div class="cuerpo_tipo cuerpo_tipo_color" style="display: block;">
			<div class="col-md-12">
			    <div class="center-block centrado_sm" style="height: 100px">
			    	<div class="color color_select" style="background-color: #ffffff;" color="Blanco"></div>
					<div class="color color_select" style="background-color: #515151;" color="Negro"></div>
					<div class="color color_select" style="background-color: #006fd8;" color="Azul"></div>
					<div class="color color_select" style="background-color: #1fac31;" color="Verde"></div>
					<div class="color color_select" style="background-color: #f8325f;" color="Rojo"></div>
					<div class="color color_select" style="background-color: #ffb52d;" color="Naranja"></div>
					<div class="color color_select" style="background-color: #fabac6;" color="Rosa"></div>
					<div class="color color_select" style="background-color: #f0f024;" color="Amarillo"></div>
			    </div>
			</div>
		</div>




		<div class="titulo_tipo">
			<div>PRECIO <span class="flecha"><i class='fas fa-angle-right'></i></span></div>
		</div>
		<div class="cuerpo_tipo" style="display: block">
			<div class="row" style="padding: 5px 0px 5px 0px;">
				<div class="col-5" style="padding-right: 0px">
					<input type="number" class="form-control precio_min" name="precio_min" placeholder="Min." style="padding: 4px;">
				</div>
				<div class="col-2">
					<label style="padding-top: 4px;"> - </label>
				</div>
				<div class="col-5" style="padding-left: 0px">
					<input type="number" class="form-control precio_max" name="precio_max" placeholder="Max." style="padding: 4px;">
				</div>
				<div class="col-12 error_precio"></div>
			</div>
		</div>

		<div style="border-top: 1px solid #edeff0"></div>



	</div>


















	<div>
		<div class="cuerpo_articulos">	</div>
		
	</div>











</div>