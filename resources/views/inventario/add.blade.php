<!-- resources/views/inventatio/add.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<h2>Agregar equipos</h2>
		</div>						

	</div>
	<div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" action="{{ url('inventario/create')}} "  method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="imei" class="col-sm-2 control-label">IMEI</label>
					<div class="col-sm-10">
					 	<input type="text" class="form-control" name="imei" id="imei" placeholder="imei" maxlength="10">
					</div>
				</div>

				<div class="form-group">
				    <label for="marca" class="col-sm-2 control-label">Marca</label>
				    <div class="col-sm-10">
				     	<input type="text" class="form-control" name="marca" id="marca" placeholder="marca">
				    </div>
				</div>
				<div class="form-group">
					<label for="modelo" class="col-sm-2 control-label">Modelo</label>
					<div class="col-sm-10">
					 	<input type="text" class="form-control" name="modelo" id="modelo" placeholder="modelo">
					</div>
				</div>				
				<div class="form-group">
				    <label for="bodega" class="col-sm-2 control-label">Bodega</label>
				    <div class="col-sm-10">
				      @include('bodegas.bodegas_select')
				    </div>
				</div>
				<div class="form-group">
				    <label for="precio_minimo" class="col-sm-2 control-label">Precio minimo</label>
				    <div class="col-sm-10">
				    	<input type="number" class="form-control" name="precio_minimo" id="precio_minimo" placeholder="precio mínimo">
				    </div>
				</div>
				<div class="form-group">
				    <label for="precio_maximo" class="col-sm-2 control-label">Precio máximos</label>
				    <div class="col-sm-10">
				      <input type="number" class="form-control" name="precio_maximo" id="precio_maximo" placeholder="precio mínimo">
				    </div>
				</div>

				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Agregar</button>
				    </div>
				</div>
		


			</form>
		</div>
	</div>
</div>
@endsection