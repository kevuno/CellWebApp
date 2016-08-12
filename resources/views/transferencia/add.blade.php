<!-- resources/views/transferencia/add.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<h2>Crear transferencia</h2>
		</div>	
	</div>
	@include('include.form_errors')
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-6">
				<h3>Información del equipo</h3>
			</div>
			<table class="table table-striped">
				<thead>
					<th>IMEI</th>
					<th>Marca</th>											
					<th>Modelo</th>
					<th>Estatus</th>
					<th>Bodega</th>
					<th>Precio Mínimo</th>
					<th>Precio Máximo</th>
				</thead>
				<tbody>					
					<tr class="checkbox_row">
						<!--<td><input type="checkbox" name="{{$inventario->id}}" value="{{$inventario->id}}"></td>-->
						<td>{{$inventario->imei}}</td>
						<td>{{$inventario->marca}}</td>
						<td>{{$inventario->modelo}}</td>
						<td>{{$inventario->estatus}}</td>
						<td>{{$inventario->bodega->nombre}}</td>
						<td>{{$inventario->precio_min}}</td>
						<td>{{$inventario->precio_max}}</td>																		
					</tr>
					</form>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">

			<form class="form-horizontal" action="{{ url('transferencia/agregar/'.$inventario->id)}} "  method="post">
				{{ csrf_field() }}

				<div class="form-group">
				    <label for="bodega" class="col-sm-2 control-label">Bodega Destino</label>
				    <div class="col-sm-10">
				    	<input type="hidden" id="view_type" value="view_only">
				    	<select class="form-control" name="bodega_id" id="bodega_select">
							@foreach($bodegas as $bodega)
									@if($bodega != $inventario->bodega)
										<option value="{{$bodega->id}}" selected >
										{{$bodega->nombre}}
										</option>
									@endif
							@endforeach
						</select>

				    </div>
				</div>
				

				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Transferir</button>
				    </div>
				</div>
		


			</form>
		</div>
	</div>
</div>
@endsection