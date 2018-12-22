<script type="text/javascript">
	$(document).ready(function(){

		$(".redes").hover(function(){
			var color = $(this).attr("fondo");
			$(this).css("color", color);
				}, function() {
			$(this).css("color","white");
		});
	});
</script>

<div id="fin">
	<div class="container">
		<div class="row" style="text-align: center; padding: 5px">
			<div class="col-6" style="margin-top: 5px;">
				<a href="/camarlengo/aviso-legal/">
					Aviso legal |
					CopyRight |
					Política de cookies
				</a>
			</div>
			<div class="col-6">
				<div>
					<a href="https://twitter.com/soyCaillou" class="redes" fondo="#1da1f2" target="_blank" title="Twitter">
						<i class="fab fa-twitter iconos" fondo="red"></i>
					</a>
					<a href="https://www.facebook.com/FelipeccPilas" class="redes" fondo="#3d5a98" target="_blank" title="Facebook">
						<i class="fab fa-facebook iconos"></i>
					</a>
					<a href="https://www.instagram.com/felipe0997/" class="redes" fondo="#e2335d" title="Instagram">
						<i class="fab fa-instagram iconos"></i>
					</a>
					<a href="tel:665382792" class="redes" fondo="#00bf2e" target="_blank" title="Whatsapp">
						<i class="fab fa-whatsapp iconos"></i>
					</a>
					<a href="mailto:felipecc0997@gmail.com" class="redes" fondo="#e0574b" title="Correo">
						<i class="fas fa-envelope iconos"></i>
					</a>
				</div>
			</div>
		</div>
	</div>
</div>