<!-- resources/views/transferencia/index.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
	
	<div class="row">
		<div class="col-lg-12">
			<h2>Transferencias completadas</h2>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-4">				
			@include('include.form_success')
		</div>			
        <div class="col-sm-offset-4 col-sm-8">
        	@role(["owner","admin"])
        	<div class="col-lg-4">
        		<!-- Javascript for the select found in views/layouts/app.blade.php-->
        		<form>
        			<select class="form-control" name="lista" id="bodega_select">
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
        
        </div>
	</div>		
	@include("transferencia.index_content")
</div>
@endsection
