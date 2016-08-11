
<!-- resources/views/tasks.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2>Menú</h2>
			<div class="col-lg-12">
				<div class="panel panel-default text-center">
			        <div class="panel-body">
			        		
			        	

						@role(["owner","admin","bodega"])
						<div class="row">
						<div class="col-md-12 col-sm-6" style="margin:10px;"><a href="{{ url('/inventario') }}"><button type="button" class="btn btn-primary">Inventario </button></a><br/></div>
						<div class="col-md-12 col-sm-6" style="margin:10px;"><a href="{{ url('/transferencias') }}"><button type="button" class="btn btn-danger"> Transferencias activas </button></a><br/></div>
						<div class="col-md-12 col-sm-6" style="margin:10px;"><a href="{{ url('/transferenciasCompletadas') }}"><button type="button" class="btn btn-danger"> Transferencias completadas </button></a><br/></div>
						@endrole

						@role(["owner","admin","garantia"])
						<div class="col-lg-12 col-sm-6" style="margin:10px;"><a href="{{ url('/garantias') }}"><button type="button" class="btn btn-warning"> Garantías </button></a><br/></div>
						@endrole

						@role(["owner","admin","vendedor"])
						<div class="col-lg-12 col-sm-6" style="margin:10px;"><a href="{{ url('/ventas') }}"><button type="button" class="btn btn-info"> Ventas </button></a><br/></div>
						@endrole
						</div>
			        </div>
    			</div>
			</div>
		</div>
	</div>
</div>
@endsection
