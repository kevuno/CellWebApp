<!-- resources/views/transferencia/accept_list.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
	
	<div class="row">
		<div class="col-lg-12">
			<h2>Detalles de la transferencia</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-5">
			<div class="panel panel-primary">
				<div class="panel-body">
				    De: {{$bodega_origen}}
				</div>
			</div> 
		</div>
		<div class="col-lg-2">
			<center>
				<div  class="hidden-md hidden-lg">
					<i class="fa fa-arrow-down text-warning" style="font-size:60px;"></i>
				</div>
				<div class="visible-md visible-lg">
					<i class="fa fa-arrow-right text-warning" style="font-size:60px;"></i>
				</div>
			</center>
		</div>	

		
		<div class="col-lg-5">
			<div class="panel panel-primary">
				<div class="panel-body">
				    A: {{$bodega_destino}}
				</div>
			</div>
		</div>
	</div>		


	<div class="row">
		<table id="tabla" class="table table-striped">
				<thead>
					<th>Marca</th>
					<th>Modelo</th>
					<th>Cantidad</th>
					<th>Estatus</th>
					<th>Transferido por</th>
				</thead>
				<tbody>
					
						@foreach($transferencias  as $transferencia)
							<tr>
								<td>{{$transferencia->inventario->marca}}</td>
								<td>{{$transferencia->inventario->modelo}}</td>
								<td>{{$transferencia->cantidad}}</td>
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

<script type="text/javascript">	
	$(document).ready(function() {
		//Ordenar por la marca
    	$('#tabla').DataTable({"pageLength": 50,"aaSorting": [[1,'asc']]});

} );
</script>

@endsection
