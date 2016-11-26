
<!-- resources/views/transferencia/add_content.blade.php -->
<div id="table_content">
	<div class="col-lg-5">
	    A: 	      	
			<form>
				<select class="form-control" name="lista" id="bodega_select_hacia">
					@foreach($bodegas as $bodega)
						@if ($bodega->id != $bodega_selected->id)
						<option value="{{$bodega->id}}">				
							{{$bodega->nombre}}
						</option>		
						@endif	
					@endforeach
				</select>
			</form>
	</div>


	<div class="row">
		<div class="col-lg-12">
			<table class="table table-striped">
				<thead>
					<th>Marca</th>											
					<th>Modelo</th>
					<th>Cantidad</th>
				</thead>
				<tbody>					
					<tr id="line_1">						
						<td width="45%">
							<select class="form-control marcas_select" name="marcas" id="marcas_select_1">
								<option value="null">				
									Seleccione
								</option>
								@foreach($inventario_con_marcas as $item_con_marca)
									<option value="{{$item_con_marca->marca}}">				
										{{$item_con_marca->marca}}
									</option>	
								@endforeach
							</select>
						</td>
						<td width="45%">
							<select class="form-control modelos_select" name="modelos" id="modelos_select_1">

							</select>
						</td>
						<td width="10%">
							<select class="form-control cantidad_select" name="cantidad"  id="cantidad_select_1">

							</select>
						</td>																	
					</tr>
					</form>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">

			<form class="form-horizontal" action="{{ url('transferencia/agregar/')}} "  method="post">
				{{ csrf_field() }}


				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Transferir</button>
				    </div>
				</div>
				<div class="form-group" hidden>
				    <input name="$inventario_completo" type="hidden" value="{{$inventario_completo}}">
				</div>
		


			</form>
		</div>
	</div>
</div>


@include('layouts/temp/phptojs')
<script type="text/javascript" src="{{URL::asset('assets/js/add_transferencia.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/select_bodega.js')}}"></script>
