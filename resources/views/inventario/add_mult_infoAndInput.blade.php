<table id="first_form_table" class="table table-striped">
	<thead>
		<th>Marca</th>											
		<th>Modelo</th>
		<th>Bodega</th>
		<th>Precio Mínimo</th>
		<th>Precio Máximo</th>
	</thead>
	<tbody>
		<tr id="table_info_content">
			
		</tr>	
	</tbody>
</table>
<form class="form-horizontal" id="submit_imei">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="imei" class="col-sm-2 control-label">IMEI</label>
		<div class="col-sm-10">
		 	<input type="number" class="form-control" value="{{ old('imei') }}" name="imei" id="imei" placeholder="imei" max="9999999999">
		</div>
	</div>

	<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      <button type="submit" class="btn btn-default">Agregar</button>
	    </div>
	</div>
</form>
<div id="AjaxResponse">
</div>
<br>
<h4> Equipos registrados </h4>



<table id="dynamic_table_from_input" class="table table-striped">
	<thead>
		<th>Imei</th>	
		<th>Marca</th>											
		<th>Modelo</th>
		<th>Bodega</th>
		<th>Precio Mínimo</th>
		<th>Precio Máximo</th>
	</thead>
	<tbody id="table_body_content">
	</tbody>
</table>
<br>
<br>
<div class="col-sm-offset-10 col-sm-2">
  <a href="{{url('inventario/agrupado')}}"><button class="btn btn-default">TERMINAR</button></a>
</div>