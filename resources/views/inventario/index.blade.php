<!-- resources/views/inventatio/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<h2>Inventario</h2>
							</div>
							
			                <div class="col-sm-offset-6 col-sm-6">
			                	<a href="{{url("inventario/agregar")}}">
				                    <button type="button" class="btn btn-default">
				                        <i class="fa fa-plus"></i> Agregar equipos
				                    </button>
			                    </a>
			                </div>
						</div>
						<div class="row">
							<div class="col-lg-12">
									<h3>Lista actual</h3>
									<table class="table table-striped">
											<thead>
												<th>Id</th>
												<th>IMEI</th>
												<th>Marca</th>
												<th>Modelo</th>
												<th>Bodega</th>
												<th>Precio Mínimo</th>
												<th>Precio Máximo</th>
											</thead>
											<tbody>
												@foreach($inventarios  as $inventario)
													<tr>
														<td>{{$inventario->id}}</td>
														<td>{{$inventario->imei}}</td>
														<td>{{$inventario->marca}}</td>
														<td>{{$inventario->modelo}}</td>
														<td>{{$inventario->bodega->nombre}}</td>
														<td>{{$inventario->precio_min}}</td>
														<td>{{$inventario->precio_max}}</td>													
													</tr>
												@endforeach
											</tbody>
									</table>
							</div>
						</div>
</div>
@endsection
