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
									<table class="table">
											<thead>
												<th>Nombre</th>
												<th>Rol</th>
												<th>Acción</th>
											</thead>
									</table>
							</div>
						</div>
</div>
@endsection
