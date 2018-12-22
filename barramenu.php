
<meta charset="utf-8">
<title>Felipe Cañada</title>
<link rel="shortcut icon" href="../img/ico.ico" />

<!-- bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<!-- font awesome -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<!-- font awesome -->
<script defer src="https://use.fontawesome.com/releases/v5.2.0/js/all.js" integrity="sha384-4oV5EgaV02iISL2ban6c/RmotsABqE4yZxZLcYMAdG7FAPsyHYAPpywE9PJo+Khy" crossorigin="anonymous"></script>
<!-- dialog -->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
<!-- font google -->
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<!-- dialog -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css" />

<link rel="stylesheet" type="text/css" href="../estilo.css">

<style type="text/css">
	#myBtn {
	    display: none; /* Hidden by default */
	    position: fixed; /* Fixed/sticky position */
	    bottom: 20px; /* Place the button at the bottom of the page */
	    right: 30px; /* Place the button 30px from the right */
	    z-index: 99; /* Make sure it does not overlap */
	    border: none; /* Remove borders */
	    outline: none; /* Remove outline */
	    background-color: #706fd3; /* Set a background color */
	    color: white; /* Text color */
	    cursor: pointer; /* Add a mouse pointer on hover */
	    padding: 15px; /* Some padding */
	    border-radius: 10px; /* Rounded corners */
	    font-size: 18px; /* Increase font size */
	}

	#myBtn:hover {
	    background-color: #555; /* Add a dark-grey background on hover */
	}
</style>


<script type="text/javascript">
	window.onscroll = function() {scrollFunction()};

	function scrollFunction() {
	    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
	        document.getElementById("myBtn").style.display = "block";
	    } else {
	        document.getElementById("myBtn").style.display = "none";
	    }
	}

	// When the user clicks on the button, scroll to the top of the document
	function topFunction() {
	    document.body.scrollTop = 0; // For Safari
	    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
	}
	$(document).ready(function(){
		$(".menu").hover(function() {
			$(this).css("background-color","#474787");
				}, function() {
			$(this).css("background-color","#222")
		});
	})
</script>

<div style="background-color: #222; position:fixed; top:0;width: 100%; z-index: 1;">
	<hr style="background-color: #6d6acf; margin: 0px; height: 3px;">
	<div class="container">
		<div>
			<div id="menu">
				<a href="/camarlengo/inicio/"><img src="../img/logo.svg" id="imgmenu"></a>
				<ul>
					<a href="/camarlengo/inicio/"><li class="menu">Inicio</li></a>
					<a href="/camarlengo/design/"><li class="menu">Diseño</li></a>
					<a href="/camarlengo/contacto/"><li class="menu">Contacto</li></a>
				</ul>	
			</div>
		</div>
	</div>
</div>

<div style="height: 64px">
</div>


<button onclick="topFunction()" id="myBtn" title="Subir"><i class="fas fa-arrow-up"></i></button>
