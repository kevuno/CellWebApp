<!-- resources/views/inventatio/editar.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<h2>Editar equipo</h2>
		</div>	
	</div>
	@include('include.form_errors')
	<div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" action="{{ url('inventario/editar/'.$inventario->id)}} "  method="post">
				{{ csrf_field() }}
				{{ method_field('PUT') }}
				<div class="form-group">
					<label for="imei" class="col-sm-2 control-label">IMEI</label>
					<div class="col-sm-10">
					 	<input type="number" class="form-control" value="{{ old('imei') ?  old('imei') : $inventario->imei }}" name="imei" id="imei" placeholder="imei" maxlength="10">
					</div>
				</div>

				<div class="form-group">
				    <label for="marca" class="col-sm-2 control-label">Marca</label>
				    <div class="col-sm-10">
				     	<input type="text" class="form-control" value="{{ old('marca') ?  old('marca') : $inventario->marca  }}" name="marca" id="marca" placeholder="marca">
				    </div>
				</div>
				<div class="form-group">
					<label for="modelo" class="col-sm-2 control-label">Modelo</label>
					<div class="col-sm-10">
					 	<input type="text" class="form-control" value="{{old('modelo') ?  old('modelo') :  $inventario->modelo  }}" name="modelo" id="modelo" placeholder="modelo">
					</div>
				</div>				
				<div class="form-group">
				    <label for="bodega" class="col-sm-2 control-label">Bodega</label>
				    <div class="col-sm-10">
				    	<input type="hidden" id="view_type" value="view_only">
				    	@include('include.bodegas_select')
				    </div>
				</div>
				<div class="form-group">
				    <label for="precio_min" class="col-sm-2 control-label">Precio mínimo</label>
				    <div class="col-sm-10">
				    	<input type="text" class="form-control" value="{{old('precio_min') ?  old('precio_min') : $inventario->precio_min }}" name="precio_min" id="precio_minimo" placeholder="precio mínimo">
				    </div>
				</div>
				<div class="form-group">
				    <label for="precio_max" class="col-sm-2 control-label">Precio máximo</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" value="{{ old('precio_max') ?  old('precio_max') : $inventario->precio_max  }}" name="precio_max" id="precio_maximo" placeholder="precio mínimo">
				    </div>
				</div>

				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Editar</button>
				    </div>
				</div>
		


			</form>
		</div>
	</div>
</div>
@endsection