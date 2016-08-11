<!-- resources/views/include/bodegas_select.blade.php -->

<select class="form-control" name="bodega" id="bodega_select">
	@foreach($bodegas as $bodega)
			<option value="{{$bodega->id}}" selected >
			{{$bodega->nombre}}
			</option>		
	@endforeach
</select>
