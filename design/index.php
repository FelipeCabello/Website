<?php
	include '../barramenu.php';
?>


<style type="text/css">
	#img {
		text-align: center;
		margin: 0px auto;
		padding: 15px;
	}
	.logo {
		cursor:pointer; 
		cursor: hand;
		background: rgba(255,255,255,0);
		background: -moz-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,0.23) 65%, rgba(176,176,176,0.36) 100%);
		background: -webkit-gradient(left top, left bottom, color-stop(0%, rgba(255,255,255,0)), color-stop(65%, rgba(255,255,255,0.23)), color-stop(100%, rgba(176,176,176,0.36)));
		background: -webkit-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,0.23) 65%, rgba(176,176,176,0.36) 100%);
		background: -o-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,0.23) 65%, rgba(176,176,176,0.36) 100%);
		background: -ms-linear-gradient(top, rgba(255,255,255,0) 0%, rgba(255,255,255,0.23) 65%, rgba(176,176,176,0.36) 100%);
		background: linear-gradient(to bottom, rgba(255,255,255,0) 0%, rgba(255,255,255,0.23) 65%, rgba(176,176,176,0.36) 100%);
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#b0b0b0', GradientType=0 );
	}
	.ojo {
		font-size: 30px;
		margin: 10px;
		margin-top: 10px;
		position: absolute;
	}
	h4 {
		margin: 30px 0px;
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){

		$(".logo").hover(function(){
			$("#showimg").attr("src", "../img/logo2.png");
				}, function() {
			$("#showimg").attr("src", "../img/logo1.png");
		});
	});
</script>




<div style="background: #1a1a1a;">
	<div class="container" id="imga">
		<img src="../img/desing3.png" style="width: 100%;">
	</div>
</div>
<hr id="hr-normal">




<div class="container">
	<div style="padding: 60px 0px;">
		<div>
			<h1>Diseño gráfico</h1>
			<p style="color: gray;">¿Eres nuevo y necesitas crear tu marca?</p>
			<p>Un <b>logotipo</b> es el núcleo de la identidad corporativa, define y simboliza el carácter de una empresa u organización.</p>
		</div>
	</div>
	<hr id="hr">
</div>



<div class="container" style="padding: 60px 0px;">
	<h2>¿Cómo creé mi logotipo?</h2>
	<div class="row" style="padding: 20px 0px; margin: auto;">
		<div class="col-sm-12 col-lg-4 logo">
			<span><i class="far fa-eye ojo"></i></span>
			<center>
				<img src="../img/logo1.png" style="width: 100%;" id="showimg">
			</center>
		</div>
		<div class="col-sm-12 col-lg-4" style="padding: 10px; margin: auto;">
			<p>Utilizando una retícula conseguimos organizar y localizar todos esos elementos para que tengan unas proporciones y medidas proporcionales.</p>
			<p>En este caso hemos usado una retícula cuadrada. Nos ayudara a darle volumen a nuestro logotipo.</p>
			<p>Hemos usado formas simples, lo que ayuda a entender y memorizar el logotipo con mayor facilidad.</p>
		</div>
		<div class="col-sm-12 col-lg-4">
			<center>
				<img src="../img/logos.png" style="width: 100%;">
			</center>
		</div>
	</div>
</div>


<br>
<br>


<div class="container" style="padding: 0px;padding-top: 100px">
	<img src="../img/start.png" style="width: 100%">
</div>

<div class="container" style="background-color: #f7f1e3; padding-bottom: 100px">
	<div style="text-align: center; padding: 50px;">
		<h2>Colores utilizados</h2>
	</div>
	<div class="row" style="text-align: center;">
		<div class="col-sm-6 col-lg-3">
			<img src="../img/amarillo.png" style="width: 60%">
			<h4>Spiced Butternut</h4>
		</div>
		<div class="col-sm-6 col-lg-3">
			<img src="../img/moradoclaro.png" style="width: 60%">
			<h4>C64 Purple</h4>			
		</div>
		<div class="col-sm-6 col-lg-3">
			<img src="../img/moradooscuro.png" style="width: 60%">
			<h4>Lucky Point</h4>
		</div>
		<div class="col-sm-6 col-lg-3">
			<img src="../img/negro.png" style="width: 60%">
			<h4>Black 90%</h4>			
		</div>
	</div>


	<div style="text-align: center; padding: 100px 0px 50px 0px;">
		<h2>Tipos de fondos</h2>
	</div>
	<hr id="hr-normal">
	<div class="row" style="text-align: center;	">
		<div class="col-sm-12 col-lg-4" >
			<p style="padding-top: 20px;"><b>Negro</b></p>
			<img src="../img/logonegro.png" style="width: 100%; padding: 30px;">
		</div>
		<div class="col-sm-12 col-lg-4" style="background-color: #706fd3;">
			<p style="padding-top: 20px; color: white;"><b>Blanco</b></p>
			<img src="../img/logoblanco.png" style="width: 100%; padding: 30px;">
		</div>
		<div class="col-sm-12 col-lg-4">
			<p style="padding-top: 20px;"><b>A color</b></p>
			<img src="../img/logocolor.png" style="width: 100%; padding: 30px;">
		</div>
	</div>
	<hr id="hr-normal">
</div>

<div class="container" style="padding: 0px; padding-bottom: 150px;">
	<img src="../img/end.png" style="width: 100%">
</div>






<div style="background-color: #ffb142; color: #fff; padding: 20px 0px;">
	<div class="container">
		<div style="text-align: center; padding: 10px;">
			<h3>Tipografía</h3>
			<br>
			<h1>Montserrat</h1>
		</div>
		<div class="row">
			<div class="col-sm-12 col-lg-12" style=" text-align: center; font-size: 50px;">
				<p>
					A B C D E F G H I J K L M<br>
					N O P Q R S T V W X Y Z<br>
					a b c d e f g h i j k l m<br>
					n o p q r s t v w x y z<br>
					1 2 3 4 5 6 7 8 9 0
				</p>
			</div>
		</div>
	</div>
</div>


<br>
<br>


<div class="container">
	<div style="text-align: center; padding: 10px;">
		<h4>Mockups</h4>
	</div>
	<div class="row">
		<div class="col-sm-12 col-lg-12">
			<img src="../img/tarjetasvisita.png" style="width: 100%;">
		</div>
		<div class="col-sm-12 col-lg-12">
			<img src="../img/maciphone.png" style="width: 100%;">
		</div>
	</div>
</div>













<?php
	include '../finmenu.php';
?>



