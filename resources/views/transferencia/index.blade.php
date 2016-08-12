<!-- resources/views/transferencia/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
	
		<div class="row">
			<div class="col-lg-12">
				<h2>Transferencias activas</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">				
				@include('include.form_success')
			</div>			
	        <div class="col-sm-offset-4 col-sm-8">
	        	@role(["owner","admin"])
	        	<div class="col-lg-4">
	        		<!-- Javascript for the select found in views/layouts/app.blade.php-->
	        		<form>
	        			<input type="hidden" id="view_type" value="inventario">
	        			<select class="form-control" name="bodega" id="bodega_select">
    						<option value="all">
								Todas
							</option>
							@foreach($bodegas as $bodega)
								@if ($bodega->id == $bodega_selected)
								<option value="{{$bodega->id}}" selected >				
									{{$bodega->nombre}}
								</option>		
								@else
								<option value="{{$bodega->id}}" >
									{{$bodega->nombre}}
								</option>		
								@endif
							@endforeach
						</select>
	        		</form>
	        	</div>
	        	@endrole
	        	<div class="col-lg-3">
		        	<a href="{{url("inventario/agrupado")}}">
		                <button type="button" class="btn btn-default">
		                    <i class="fa fa-object-group"></i> Ver agrupados
		                </button>
		            </a>
	        	</div>
	        	<div class="col-lg-3">
		        	<a href="{{url("inventario/agregar")}}">
		                <button type="button" class="btn btn-default">
		                    <i class="fa fa-plus"></i> Agregar equipos
		                </button>
		            </a>
	        	</div>
            
	        </div>
		</div>
		@role(["owner","admin"])
		<div class="row">
			<div class="col-lg-12">
				<h3>Lista de todas las transferencias</h3>
				<table class="table table-striped">
						<thead>
							<th>Bodega Origen</th>
							<th>Bodega Destino</th>
							<th>Estatus</th>
							<th>Transferido por</th>
							<th> Acciones </th>
						</thead>
						<tbody>
							
								@foreach($transferencias  as $transferencia)
									<tr class="checkbox_row">
										
										<td>{{$transferencia->bodega_origen->nombre}}</td>
										<td>{{$transferencia->bodega_destino->nombre}}</td>
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
		@endrole
		@role(["bodega"])
		<div class="row">			 
        	<div class="col-lg-12">
				<h3>Transferencias para bodega {{Auth::user()->bodega->nombre}}</h3>
        	</div>
			<div class="col-lg-12">
				<table class="table table-striped">
					<thead>
						<th>Bodega Origen</th>
						<th>Estatus</th>
						<th>Transferido por</th>
						<th> Acciones </th>
					</thead>
					<tbody>
						
							@foreach($transferencias  as $transferencia)
								<tr class="checkbox_row">									
									<td>{{$transferencia->bodega_destino->nombre}}</td>
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
	    <div class="row">			 
        	<div class="col-lg-12">
				<h3>Transferencias desde bodega {{Auth::user()->bodega->nombre}}</h3>
        	</div>
        	<div class="col-lg-12">
        		<table class="table table-striped">
					<thead>
						<th>Bodega Origen</th>
						<th>Estatus</th>
						<th>Transferido por</th>
						<th> Acciones </th>
					</thead>
					<tbody>						
						@foreach($transferencias_desde  as $transferencia)
							<tr class="checkbox_row">
							<td>
								{{$transferencia}}
							</td>							
								<td>{{$transferencia->estatus}}</td>
								<td>{{$transferencia->transferido_por}}</td>
								<td>
									<!--TODO editar, transferir y agregar a garantia multiples equipos a la vez-->
								</td>													
							</tr>
						@endforeach
					</tbody>
				</table>

        	</div>
	    </div>
	    @endrole
</div>
@endsection