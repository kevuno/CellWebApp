<!-- resources/views/transferencias/accept_content.blade.php -->
<div id="table_content">
			<div class="row">
				<div class="col-lg-12">
					<h3>Lista de todas las transferencias</h3>
					<table id="tabla" class="table table-striped">
							<thead>
								<th>Transferencia grupo</th>
								<th>Fecha de solicitud</th>	
								<th>Bodega Origen</th>
								<th>Bodega Destino</th>
								<th>Estatus</th>
								<th>Transferido por</th>
								<th> Acciones </th>
							</thead>
							<tbody>
								
									@foreach($transferencias  as $transferencia)
										<tr>
											<td>{{$transferencia->transferencia_grupo}}</td>
											<td>{{$transferencia->fecha_solicitud}}</td>
											<td>{{$transferencia->bod_origen->nombre}}</td>
											<td>{{$transferencia->bod_destino->nombre}}</td>
											<td>{{$transferencia->estatus}}</td>
											<td>{{$transferencia->transferido_por}}</td>
											<td>
												<a href="{{url('transferencia/aceptar_detalles/'.$transferencia->transferencia_grupo)}}"><button type="button" class="btn btn-default btn-xs"><i class="fa fa-search"></i></button>
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
