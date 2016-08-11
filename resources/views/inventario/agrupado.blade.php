<!-- resources/views/inventatio/agrupado.blade.php -->


@extends('layouts.app')

@section('content')
<div class="container">
	
		<div class="row">
			<div class="col-lg-12">
				<h2>Inventario</h2>
			</div>		
	        <div class="col-sm-offset-4 col-sm-8">
	        	@role(["owner","admin"])
	        	<div class="col-lg-4">
	        		<form action="{{url('inventario/indexPost')}}">
	        			<input type="hidden" id="view_type" value="inventario/agrupado">
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
		        	<a href="{{url("inventario/")}}">
		                <button type="button" class="btn btn-default">
		                    <i class="fa fa-object-ungroup"></i> Ver 1 por 1
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
		<div class="row">
			<div class="col-lg-12">
					<h3>Lista actual</h3>
					<table class="table table-striped">
							<thead>
								<th>Cantidad</th>
								<th>Marca</th>											
								<th>Modelo</th>
								<th>Estatus</th>
								<th>Bodega</th>
								<th>Precio Mínimo</th>
								<th>Precio Máximo</th>								
								<th>Acciones</th>
							</thead>
							<tbody>
								
									@foreach($inventarios  as $inventario)
										<tr class="checkbox_row">
	
											<td>{{$inventario->count}}</td>
											<td>{{$inventario->marca}}</td>
											<td>{{$inventario->modelo}}</td>
											<td>{{$inventario->estatus}}</td>
											<td>{{$inventario->bodega}}</td>
											<td>{{$inventario->precio_min}}</td>
											<td>{{$inventario->precio_max}}</td>												
											<td>
												<a href="{{url('inventario/editar/'.$inventario->id)}}"><button type="button" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></button>
												<a href="{{url('transferencia/add/'.$inventario->id)}}"><button type="button" class="btn btn-default btn-xs"><i class="fa fa-truck"></i></button>
												<a href="{{url('garantia/add/'.$inventario->id)}}"><button type="button" class="btn btn-default btn-xs"><i class="fa fa-medkit"></i></button>
											</td>														
										</tr>
									@endforeach
								</form>
							</tbody>
					</table>
			</div>
		</div>
</div>
@endsection