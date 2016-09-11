<!-- resources/views/inventatio/add_mult.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<h2>Agregar multiples equipos</h2>
		</div>	
	</div>
	@include('include.form_errors')
	@include('include.form_errors_csv')
	<div class="row">
		<div class="col-lg-12">
			<div id="main_content">
				<form class="form-horizontal" id="submit_add_mult_info">
					{{ csrf_field() }}
					<div class="form-group">
					    <label for="marca" class="col-sm-2 control-label">Marca</label>
					    <div class="col-sm-10">
					     	<input type="text" class="form-control" value="{{ old('marca') }}" name="marca" id="marca" placeholder="marca">
					    </div>
					</div>
					<div class="form-group">
						<label for="modelo" class="col-sm-2 control-label">Modelo</label>
						<div class="col-sm-10">
						 	<input type="text" class="form-control" value="{{ old('modelo') }}" name="modelo" id="modelo" placeholder="modelo">
						</div>
					</div>				
					<div class="form-group">
					    <label for="bodega_id" class="col-sm-2 control-label">Bodega</label>
					    <div class="col-sm-10">
					    	<input type="hidden" id="view_type" value="view_only">
					    	@include('include.bodegas_select')
					    </div>
					</div>
					<div class="form-group">
					    <label for="precio_min" class="col-sm-2 control-label">Precio mínimo</label>
					    <div class="col-sm-10">
					    	<input type="number" class="form-control" value="{{ old('precio_min') }}" name="precio_min" id="precio_min" placeholder="precio mínimo">
					    </div>
					</div>
					<div class="form-group">
					    <label for="precio_max" class="col-sm-2 control-label">Precio máximo</label>
					    <div class="col-sm-10">
					      <input type="number" class="form-control" value="{{ old('precio_max') }}" name="precio_max" id="precio_max" placeholder="precio mínimo">
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
</div>


<script type="text/javascript" src="{{URL::asset('assets/js/add_mult.js')}}"></script>

@endsection