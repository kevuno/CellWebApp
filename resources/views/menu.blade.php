
<!-- resources/views/tasks.blade.php -->

@extends('layouts.app_background')
@section('content')
<div class="container" >
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="col-lg-12">
				<div class="panel panel-default text-center" style="background:none;border:none;">
			        <div class="panel-body">
			        		
			        	

						@role(["owner","admin","bodega"])
						<div class="row">
						<div class="col-md-12 col-sm-6" style="margin:10px;"><a href="{{ url('/inventario') }}"><button type="button" class="btn btn-primary" style=" width:250px; background-color:#FF85CB; border-color:#FF85CB;"> <i class="fa fa-list fa-2"></i> Inventario </button></a><br/></div>
						<div class="col-md-12 col-sm-6" style="margin:10px; "><a href="{{ url('/transferencia') }}"><button type="button" class="btn btn-danger" style=" width:250px;  background-color:#cc33ff; border-color:#cc33ff;">  <i class="fa fa-truck fa-2"> </i> Transferencias </button></a><br/></div>
						@endrole

						@role(["owner","admin","garantia"])
						<div class="col-lg-12 col-sm-6" style="margin:10px;"><a href="{{ url('/garantias') }}"><button type="button" class="btn btn-warning" style=" width:250px;"> <i class="fa fa-medkit"> </i> Garantías </button></a><br/></div>
						@endrole

						@role(["owner","admin","vendedor"])
						<div class="col-lg-12 col-sm-6" style="margin:10px;"><a href="{{ url('/ventas') }}"><button type="button" class="btn btn-info" style=" width:250px;"> <i class="fa fa-exchange"> </i> Ventas </button></a><br/></div>
						@endrole
						</div>

						@role(["owner","admin","vendedor","bodega","garantia"])
						<div class="col-lg-12 col-sm-6" style="margin:10px;"><a href="{{ url('/ventas') }}"><button type="button" class="btn btn-danger" style=" width:250px;"> <i class="fa fa-book"> </i> Catálogo </button></a><br/></div>
						@endrole
			        </div>
    			</div>
			</div>
		</div>
	</div>
</div>
@endsection

