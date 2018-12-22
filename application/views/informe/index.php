<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!$this->session->sesion && $this->session->privilegio!="root")
	header('Location:'.base_url()."./login/");
?>

<!-- ENLACES PARA LA PODER HACER USO DE LA LIBRERIA DATATABLE -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.css">  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>


<script type="text/javascript">
	$(document).ready(function() {

		function obtener_tabla_articulos(ini, fin) {
			$.post('<?=base_url()?>Informe/obtener_tabla_articulos', {ini:ini, fin:fin}, function(data){
				data = JSON.parse(data);

				var total_ve = 0;
				var total_co = 0;
				for (var i = 0; i < data.length; i++) {
					total_ve = total_ve + (parseInt(data[i]["precio_venta"]) * parseInt(data[i]["cantidad"]))
					total_co = total_co + (parseInt(data[i]["precio_compra"]) * parseInt(data[i]["cantidad"]))
				}



				$(".pre_ve").append(" ( "+total_ve+" € ) ")
				$(".pre_co").append(" ( "+total_co+" € ) ")

				var content = " "
				for(i=0; i< data.length; i++){
					content += "<tr>";
				    content += "<td>"+data[i].nombre+"</td>";
				    content += "<td>"+data[i].nombre_largo+"</td>";
				    content += "<td>"+data[i].precio_compra+"</td>";
				    content += "<td>"+data[i].precio_venta+"</td>";
				    content += "<td>"+data[i].cantidad+"</td>";
				    content += "<td>"+data[i].gestionado+"</td>";
				    content += "<td>"+data[i].CTS+"</td>";

				    content += "</tr>";
				}



				$('#cuerpo_tabla').html(' ')
				$('#cuerpo_tabla').append(content);
				
				$('#table_id').DataTable({
					retrieve: true,
				    paging: false
			    });
			})
		}


		$("#fecha_ini").change(function() {
			consulta_informe()
		})

		$("#fecha_fin").change(function() {
			consulta_informe()
		})

		function consulta_informe() {
			var ini = $("#fecha_ini").val()
			var fin = $("#fecha_fin").val()
			$('#cuerpo_tabla').html(' ')
			$('.tabla_informe').show();
			$(".pre_ve").html("Precio venta")
			$(".pre_co").html("Precio compra")
			obtener_tabla_articulos(ini, fin)
		}


	})
	
</script>


<div class="cuerpo" style="width: 70%; min-height: 500px; margin-bottom: 20px">
	

	<div class="filtro_informe row" style="margin-top: 20px">
		<div class="col-md-7">
				<label style="font-size: 30px; margin-bottom: 30px">Informe</label>
		</div>
		<div class="col-md-5">
			<div class="form-group row">
				<label class="col-md-2 col-form-label" for="fecha_ini">Intervalo: </label>
				<div class="col-md-5">
					<input id="fecha_ini" name="fecha_ini" type="date" class="form-control form-control-sm" value="0">
				</div>
				<div class="col-md-5">
					<input id="fecha_fin" name="fecha_fin" type="date" class="form-control form-control-sm" value="0">
				</div>
			</div>
		</div>
	</div>


	<div class="tabla_informe" style="display: none">
		<table id="table_id" class="display" style="width: 100%">
		    <thead>
		        <tr>
		        	<th>Nombre</th>
		            <th>Nombre largo</th>
		            <th class="pre_co">Precio compra</th>
		            <th class="pre_ve">Precio venta</th>
		            <th>Cantidad</th>
		            <th>Gestionado</th>
		            <th>Fecha</th>
		        </tr>
		    </thead>
		    <tbody id="cuerpo_tabla">

		    </tbody>
		</table>
	</div>
</div>
