<!-- resources/views/inventatio/add_csv.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<h2>Agregar equipos usando archivo .csv</h2>
		</div>	
	</div>
	@include('include.form_errors')
	<div class="row">
		<div class="col-lg-12">
			<form class="form-horizontal" action="{{ url('inventario/agregar_csv')}} " enctype="multipart/form-data" method="post">
				{{ csrf_field() }}
				<div class="form-group">
					<label for="file" class="col-sm-2 control-label">Archivo</label>
					<div class="col-sm-10">
					 	<input type="file" class="form-control" value="{{ old('file') }}" name="file" id="file" placeholder="file">
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