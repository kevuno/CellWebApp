<!-- resources/views/bodegas/bodegas_select.blade.php -->

<select class="form-control" name="bodega" id="bodega">
	@foreach($bodegas as $bodega)
		
			<option value="{{$bodega->id}}">
			{{$bodega->nombre}}
			</option>		
	@endforeach
</select>
