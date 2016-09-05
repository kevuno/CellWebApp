<!-- resources/views/inventatio/agrupado.blade.php -->


@extends('layouts.app')

@section('content')
<div class="container">
	
		<div class="row">
			<div class="col-lg-12">
				<h2>Inventario Agrupado</h2>
			</div>
		</div>
		<div class="row">
	        <div class="col-sm-offset-4 col-sm-8">
	        	@role(["owner","admin"])
	        	<div class="col-lg-4">
	        		<form>
	        			<!-- name atribute of select will be the url of the ajax for the select -->
	        			<select class="form-control" name="agrupado" id="bodega_select">
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
	        	<div class="col-lg-3">
		        	<a href="{{url("inventario/")}}">
		                <button type="button" class="btn btn-default">
		                     <i class="fa fa-object-ungroup"></i> Ver 1 por 1
		                </button>
		            </a>
	        	</div>
	        	<div class="col-lg-3">
		        	<a href="{{url("inventario/agregar")}}">
		                <button type="button" class="btn btn-default">
		                    <i class="fa fa-plus"></i> Agregar equipos
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
	        </div>
		</div>


		@include("inventario.agrupado_content")
		
</div>
@endsection