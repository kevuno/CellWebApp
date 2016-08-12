<!-- resources/views/include/bodegas_select.blade.php -->
<!--TODO select the bodega that belongs to the user or belongs to the item in case it was being edited-->
<select class="form-control" name="bodega_id" id="bodega_select">
	@foreach($bodegas as $bodega)
			<option value="{{$bodega->id}}" selected >
			{{$bodega->nombre}}
			</option>		
	@endforeach
</select>
