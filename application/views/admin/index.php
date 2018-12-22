<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if ($this->session->privilegio!="root")
	header('Location:'.base_url()."./login/");
?>




<!-- ENLACES PARA LA PODER HACER USO DE LA LIBRERIA DATATABLE -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>


<script type="text/javascript">
	

	$(document).ready(function () {
		

		function obtener_tabla_articulos() {
			$.post('<?=base_url()?>Admin/obtener_tabla_articulos', {}, function(data){
				data = JSON.parse(data);
				var content = " "
				for(i=0; i< data.length; i++){
					content += "<tr>";
				    content += "<td style='text-align: center;background-color: #edeef0;'><img src='<?=base_url('./img/')?>"+data[i].imagen+"' style='width: 60;height: 60;'></td>";
				    content += "<td>"+data[i].nombre+"</td>";
				    content += "<td>"+data[i].nombre_largo+"</td>";
				    content += "<td>"+data[i].precio_compra+" €</td>";
				    content += "<td>"+data[i].precio_venta+" €</td>";
				    content += "<td>"+data[i].sexo+"</td>";
				    content += "<td>"+data[i].categoria+"</td>";
				    content += "<td>"+data[i].color+"</td>";
				    content += "<td style='text-align: center;'> \
				    <button data='"+data[i].id+"' class='btn btn-default bt btn_editar' style='margin-right: 5px;'>Editar</button> \
				    <button data='"+data[i].id+"' class='btn btn-default bt btn_borrar' style='margin-right: 5px;'>Eliminar</button> </td>";
				    content += "</tr>";
				}


				$('#cuerpo_tabla').html('')
				$('#cuerpo_tabla').append(content);

				$(".btn_editar").click(function(){
					var id = $(this).attr("data")
					obtener_datos(id)
					$("#dialog_formulario").dialog("open");
				});

				$(".btn_borrar").click(function(){
					var id = $(this).attr("data")
					borrar_datos(id)
				});


			    $('#table_id').DataTable({});
			})
		}


		function obtener_datos(id){
			$.post('<?=base_url()?>Admin/obtener_datos', {id:id}, function(data){
				data = JSON.parse(data);
				for (i in data[0]) {
					$("[name="+i+"]").val(data[0][i])
				}
			});
		}

		function borrar_datos(id){
			$.post('<?=base_url()?>Admin/borrar_datos', {id:id}, function(data){
				location.reload();
			});
		}

		obtener_tabla_articulos();



		$( ".btn_crear" ).on( "click", function() {
			$("#dialog_formulario").dialog("open");
		});

		$(".btn_cerrar").on("click", function(){
			$("#dialog_formulario").dialog("close");
		});

		$("#dialog_formulario").dialog({
			autoOpen: false,
			width: 700
		})

	});

</script>

<div class="cuerpo" style="padding: 30px 0px">

	<label style="font-size: 30px; margin-bottom: 30px">Artículos</label>
	<button style="float: right;" class="btn btn-success btn_crear">Crear</button>

	<table id="table_id" class="display" style="width: 100%">
	    <thead>
	        <tr>
	        	<th>Foto</th>
	            <th>Nombre</th>
	            <th>Definición</th>
	            <th>Precio compra</th>
	            <th>Precio venta</th>
	            <th>Sexo</th>
	            <th>Categoria</th>
	            <th>Color</th>
	            <th>Acciones</th>
	        </tr>
	    </thead>
	    <tbody id="cuerpo_tabla">

	    </tbody>
	</table>
</div>






<div id="dialog_formulario">
	<form enctype="multipart/form-data" action="insert" method="POST" name="form_img">
		<input class="id" name="id" type="hidden" class="form-control" value="">

		<div style="padding: 15px">
			<label style="font-size: 30px; margin-bottom: 30px">Panel artículo</label>
			<div class="form-group row">
				<label class="col-3 col-form-label" for="nombre">Nombre</label>  
				<div class="col-9">
					<input id="nombre" name="nombre" type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-3 col-form-label" for="nombre_largo">Definición</label>  
				<div class="col-9">
					<input id="nombre_largo" name="nombre_largo" type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-3 col-form-label" for="precio_compra">Precio compra</label>  
				<div class="col-9">
					<input id="precio_compra" name="precio_compra" type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-3 col-form-label" for="precio_venta">Precio venta</label>  
				<div class="col-9">
					<input id="precio_venta" name="precio_venta" type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-3 col-form-label" for="sexo">Sexo</label>  
				<div class="col-9">
					<select id="sexo" name="sexo" class="form-control">
						<option></option>
						<option value="Hombre">Hombre</option>
						<option value="Mujer">Mujer</option>
						<option value="Nino">Niño</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-3 col-form-label" for="categoria">Categoria</label>  
				<div class="col-9">
					<input id="categoria" name="categoria" type="text" class="form-control">
				</div>
			</div>
			<div class="form-group row">
				<label class="col-3 col-form-label" for="color">Color</label>  
				<div class="col-9">
					<select id="color" name="color" class="form-control">
						<option></option>
						<option>Blanco</option>
						<option>Negro</option>
						<option>Azul</option>
						<option>Verde</option>
						<option>Rojo</option>
						<option>Naranja</option>
						<option>Rosa</option>
						<option>Amarillo</option>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-3 col-form-label" for="img">Imagen</label>  
				<div class="col-9">
					<input name="fichero_usuario" type="file" style="width: 100%" />
				</div>
			</div>
			<div class="form-group row">
				<label class="col-3 col-form-label" for="talla">Talla / Cantidad</label>  
				<div class="col-9">
					<div class="row">
						<div class="col-3">
							<label>2XS</label> <input style="width: 50px;float: right;" type="number" name="2XS" id="2XS">
						</div>
						<div class="col-3">
							<label>XS</label> <input style="width: 50px;float: right;" type="number" name="XS" id="XS">
						</div>
						<div class="col-3">
							<label>S</label> <input style="width: 50px;float: right;" type="number" name="S" id="S">
						</div>
						<div class="col-3">
							<label>M</label> <input style="width: 50px;float: right;" type="number" name="M" id="M">
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<label>L</label> <input style="width: 50px;float: right;" type="number" name="L" id="L">
						</div>
						<div class="col-3">
							<label>XL</label> <input style="width: 50px;float: right;" type="number" name="XL" id="XL">
						</div>
						<div class="col-3">
							<label>2XL</label> <input style="width: 50px;float: right;" type="number" name="2XL" id="2XL">
						</div>
						<div class="col-3">
							<label>3XL</label> <input style="width: 50px;float: right;" type="number" name="3XL" id="3XL">
						</div>
					</div>					
				</div>
			</div>









			<div style="text-align: center;padding-top: 10px">
				<input type="submit" value="Enviar fichero" class="btn btn-info" style="margin-right: 10px" />
				
			</div>
		</form>
	</div>
</div>


<style type="text/css">
	.bt {
		font-size: 12px;
		color: white;
		background-color: #2b2b2b;
	}

	input {
	    font-size: 1rem;
	    line-height: 1.5;
	    color: #495057;
	    background-color: #fff;
	    background-clip: padding-box;
	    border: 1px solid #ced4da;
	    border-radius: .25rem;
	}
</style>