<!-- resources/views/inventatio/agrupado.blade.php -->


@extends('layouts.app')

@section('content')
<div class="container">
	
		<div class="row">
			<div class="col-lg-12">
				<h2>Inventario</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-lg-4">				
				@include('include.form_success')
			</div>			
	        <div class=" col-sm-12">
	        	@role(["owner","admin"])
	        	<div class="col-lg-2">
	        		<!-- Javascript for the select found in views/layouts/app.blade.php-->
	        		<form>
	        			<!-- name atribute of select will be the url of the ajax for the select -->
	        			<select class="form-control" name="inventario/" id="bodega_select">
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
	        	<div class="col-lg-2">
		        	<a href="{{url("inventario/imei")}}">
		                <button type="button" class="btn btn-default center-block">
		                     <i class="fa fa-check"></i> Imeis verificados
		                </button>
		            </a>
	        	</div>
	        	<div class="col-lg-2">
		        	<a href="{{url("inventario/agregar_mult")}}">
		                <button type="button" class="btn btn-default center-block">
		                    <i class="fa fa-plus"></i> Agregar equipos
		                </button>
		            </a>
	        	</div>
	        	<div class="col-lg-2">
		        	<a href="{{url("inventario/agregar_mult_imei")}}">
		                <button type="button" class="btn btn-default center-block">
		                    <i class="fa fa-plus"></i> Agregar con imei	
		                </button>
		            </a>
	        	</div>	        	
	        	<div class="col-lg-2">
		        	<a href="{{url("inventario/agregar_csv")}}">
		                <button type="button" class="btn btn-default center-block">
		                    <i class="fa fa-plus"></i> Agregar con .csv 
		                </button>
		            </a>
	        	</div>	        		        	
	        	<div class="col-lg-2">
		        	<a href="{{url("inventario/agregar")}}">
		                <button type="button" class="btn btn-default center-block">
		                    <i class="fa fa-plus"></i> Agregar 1 equipo con imei
		                </button>
		            </a>
	        	</div>	        	         
	        </div>
		</div>
		@include("inventario.agrupado_content")
		
</div>
@endsection