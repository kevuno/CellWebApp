<!-- resources/views/transferencias/index_content.blade.php -->
<div id="table_content">
			<div class="row">
				<div class="col-lg-12">
					<h3>Lista de todas las transferencias</h3>
					<table id="tabla" class="table table-striped">
							<thead>
								<th>Transferencia grupo</th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Cantidad</th>
								<th>Fecha de solicitud</th>
								<th>Fecha de llegada</th>
								<th>Bodega Origen</th>
								<th>Bodega Destino</th>
								<th>Estatus</th>
								<th>Transferido por</th>
								<th> Acciones </th>
							</thead>
							<tbody>
								
									@foreach($transferencias  as $transferencia)
										<tr class="checkbox_row">
											<td>{{$transferencia->transferencia_grupo}}</td>
											<td>{{$transferencia->inventario->marca}}</td>
											<td>{{$transferencia->inventario->modelo}}</td>
											<td>{{$transferencia->cantidad}}</td>
											<td>{{$transferencia->fecha_solicitud}}</td>
											<td>{{$transferencia->fecha_llegada}}</td>
											<td>{{$transferencia->bod_origen->nombre}}</td>
											<td>{{$transferencia->bod_destino->nombre}}</td>
											<td>{{$transferencia->estatus}}</td>
											<td>{{$transferencia->transferido_por}}</td>
											<td>
												<!--TODO editar, transferir y agregar a garantia multiples equipos a la vez-->
											</td>													
										</tr>
									@endforeach
								</form>
							</tbody>
					</table>
				</div>
			</div>
		</div>
<script type="text/javascript">	
	$(document).ready(function() {
		//Ordenar por la marca
    	$('#tabla').DataTable({"pageLength": 50,"aaSorting": [[1,'asc']]});

} );
</script>


@role(["owner","admin"])
	<script type="text/javascript" src="{{URL::asset('assets/js/select_bodega.js')}}"></script>
@endrole
