<!-- resources/views/inventario/imei.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
	
		<div class="row">
			<div class="col-lg-12">
				<h2>Inventario de Imeis verificados</h2>
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
	        			<select class="form-control" name="inventario" id="bodega_select">
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
		        	<a href="{{url("inventario")}}">
		                <button type="button" class="btn btn-default">
		                    <i class="fa fa-object-group"></i> Inventario Principal
		                </button>
		            </a>
	        	</div>
	        	<div class="col-lg-3">
		        	<a href="{{url("inventario/agregar_mult")}}">
		                <button type="button" class="btn btn-default">
		                    <i class="fa fa-plus"></i> Agregar multiples equipos
		                </button>
		            </a>
	        	</div>
	        	<div class="col-lg-3">
		        	<a href="{{url("inventario/agregar_csv")}}">
		                <button type="button" class="btn btn-default">
		                    <i class="fa fa-plus"></i> Agregar usando archivo .csv 
		                </button>
		            </a>
	        	</div>	        		        	
	        	<div class="col-lg-2">
		        	<a href="{{url("inventario/agregar")}}">
		                <button type="button" class="btn btn-default">
		                    <i class="fa fa-plus"></i> Agregar 1 equipo
		                </button>
		            </a>
	        	</div>

	        	                 
	        </div>
		</div>		
		@include("inventario.imei_content")


</div>


@endsection
