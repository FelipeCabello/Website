<meta charset="utf-8">
<title>Felipe Cañada</title>
<link rel="shortcut icon" href="img/ico.ico" />
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>


<style type="text/css">
	body {
		background: url(img/fondo.jpg) no-repeat center center fixed; 
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
	    cursor: hand;
	    cursor:pointer;
	}
	#logo {
		position: absolute;
	    top: 50%;
	    left: 50%;
	    width: 500px;
	    margin-left: -250px;
	    margin-top: -233px;
	}
</style>

<script type="text/javascript">
	$(document).ready(function(){
		$("body").on('click touchstart', function(){
			window.location = "/camarlengo/inicio/";
		});
		$("#fondo").click(function(){
			window.location = "/camarlengo/inicio/";
		})
	})
</script>

<div id="fondo" style="height: 100%; width: 100%;">
	<img src="img/inicio.png" alt="logo" id="logo">
</div>