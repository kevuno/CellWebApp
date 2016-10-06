<!-- resources/views/inventario/index_content.blade.php -->
<div id="table_content">
	<div class="row">
		<div class="col-lg-12">
			<h3>Lista actual</h3>
			<table id="tabla" class="table table-striped">
				<thead>
					<th>IMEI</th>
					<th>Marca</th>											
					<th>Modelo</th>
					<th>Estatus</th>
					<th>Bodega</th>
					<th>Fecha de adición</th>
					<th>Precio Mínimo</th>
					<th>Precio Máximo</th>
					<th>Acciones</th>
				</thead>
				<tbody>
					
						@foreach($inventarios  as $inventario)
							<tr class="checkbox_row">
								<!--<td><input type="checkbox" name="{{$inventario->id}}" value="{{$inventario->id}}"></td>-->
								<td>{{$inventario->imei}}</td>
								<td>{{$inventario->marca}}</td>
								<td>{{$inventario->modelo}}</td>
								<td>{{$inventario->estatus}}</td>
								<td>{{$inventario->bodega->nombre}}</td>
								<td>{{$inventario->fecha_ingreso}}</td>							
								<td>{{$inventario->precio_min}}</td>
								<td>{{$inventario->precio_max}}</td>
								<td>
									<!--TODO editar, transferir y agregar a garantia multiples equipos a la vez-->
									<a href="{{url('inventario/editar/'.$inventario->id)}}"><button type="button" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button>
									<a href="{{url('transferencia/agregar/'.$inventario->id)}}"><button type="button" class="btn btn-default btn-xs"><i class="fa fa-truck"></i></button>
									<a href="{{url('garantia/agregar/'.$inventario->id)}}"><button type="button" class="btn btn-default btn-xs"><i class="fa fa-medkit"></i></button>
								</td>													
							</tr>
						@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>

<script type="text/javascript">	
	$(document).ready(function() {
    	//Ordenar por la fecha de adicion
    	$('#tabla').DataTable({"pageLength": 50,"aaSorting": [[5,'desc']]});
} );
</script>

@role(["owner","admin"])
	<script type="text/javascript" src="{{URL::asset('assets/js/select_bodega.js')}}"></script>
@endrole