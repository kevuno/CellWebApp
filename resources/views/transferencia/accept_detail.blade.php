<!-- resources/views/transferencia/accept_list.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
	
	<div class="row">
		<div class="col-lg-12">
			<h2>Transferencias activas</h2>
		</div>
	</div>
	<div class="row">
		<table id="tabla" class="table table-striped">
				<thead>
					<th>Transferencia grupo</th>
					<th>Fecha de solicitud</th>	
					<th>Bodega Origen</th>
					<th>Bodega Destino</th>
					<th>Estatus</th>
					<th>Transferido por</th>
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
											
							</tr>
						@endforeach
					</form>
				</tbody>
		</table>	
	</div>
</div>
<div class="col-sm-offset-10 col-sm-2">
	<form class="form-horizontal" action="{{ url('transferencia/aceptar_detalles/'.$transferencia->transferencia_grupo)}} "  method="post">
  						<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Aceptar</button>
				    </div>
				</div>
</div>

@endsection
