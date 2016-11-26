<!-- resources/views/transferencia/add.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-6">
			<h2>Crear transferencia</h2>
		</div>	
	</div>
	@include('include.form_errors')

	<div class="row">
		<div class="col-lg-5">
		    De: @role(["owner","admin"])		        	
	        		<form>
	        			<select class="form-control" name="agregar" id="bodega_select">
							@foreach($bodegas as $bodega)
								@if ($bodega->id == $bodega_selected->id)
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
				@endrole

				@role("bodega")
				<div class="panel panel-default">
				  <div class="panel-body">
				    {{$bodega_selected->nombre}}
				  </div>
				</div>
				@endrole
		</div>
		<div class="col-lg-2">
			<center>
				<div  class="hidden-md hidden-lg">
					<i class="fa fa-arrow-down text-success" style="font-size:60px;"></i>
				</div>
				<div class="visible-md visible-lg">
					<i class="fa fa-arrow-right text-success" style="font-size:60px;"></i>
				</div>
			</center>
		</div>		
	
	@include("transferencia.add_content")

</div>
@endsection
