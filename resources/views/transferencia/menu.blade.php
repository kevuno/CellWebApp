<!-- resources/views/transferencia/menu.blade.php -->
@extends('layouts.app_background')
@section('content')
<div class="container" >
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="col-lg-12">
				<div class="panel panel-default text-center" style="background:none;border:none;">
			        <div class="panel-body">        			
						<div class="row">
							<div class="col-md-12 col-sm-6" style="margin:10px;"><a href="{{ url('/transferencia/agregar') }}"><button type="button" class="btn btn-primary" style=" width:250px; background-color:#FF85CB; border-color:#FF85CB;"> <i class="fa fa-plus"></i> Crear </button></a><br/></div>

							<div class="col-md-12 col-sm-6" style="margin:10px; "><a href="{{ url('/transferencia/pendientes') }}"><button type="button" class="btn btn-danger" style=" width:250px;  background-color:#cc33ff; border-color:#cc33ff;">  <i class="fa fa-check"> </i> Aceptar </button></a><br/></div>

							<div class="col-lg-12 col-sm-6" style="margin:10px;"><a href="{{ url('/transferencia/lista') }}"><button type="button" class="btn btn-warning" style=" width:250px;"> <i class="fa fa-search"> </i> Ver </button></a><br/></div>
						</div>
			        </div>
    			</div>
			</div>
		</div>
	</div>
</div>
@endsection
