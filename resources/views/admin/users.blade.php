
<!-- resources/views/admin/users.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
						<div class="row">
								<div class="col-lg-6">
									<h2>Lista de Vendedores</h2>
								</div>
								<div class="col-lg-6">
									<h3>Agregar nuevo</h3>
									<!-- Display Validation Errors -->
									@include('common.errors')

									<!--Formulario de vendedores-->
									<form action="{{ url('vendedores') }}" method="POST" class="form-horizontal">
							            {{ csrf_field() }}

							            <!-- Nombre del vendedor -->
							            <div class="form-group">
							                <label for="task" class="col-sm-3 control-label">Nombre</label>
							                <div class="col-sm-6">
							                    <input type="text" name="nombre" id="nombre" class="form-control">
							                </div>
							            </div>
													<!--Set as active-->
																	<input type="hidden" name="activo" id="activo" value="true" class="form-control">

							            <!-- Add Task Button -->
							            <div class="form-group">
							                <div class="col-sm-offset-3 col-sm-6">
							                    <button type="submit" class="btn btn-default">
							                        <i class="fa fa-plus"></i> Agregar vendedor
							                    </button>
							                </div>
							            </div>
							        </form>
								</div>

						</div>
								<div class="col-lg-12">
										<h3>Lista actual</h3>
										<table class="table">
												<thead>
													<th>Nombre</th>
													<th>Rol</th>
													<th>Acción</th>
												</thead>
												@foreach ($users as $user)
														<tr>
															<td>{{$user->name}}</td>
															<td>{{$user->roles[0]->name}}</td>
															<td>
																<form action="{{ url('admin/manage/'.$user->id)}} " method="post">
																	{{ csrf_field() }}
																	{{ method_field('DELETE') }}
																	<button type="submit" class="btn btn-default">
																			<i class="fa fa-edit"></i> Editar
																	</button>
																</form>
															</td>
														</tr>


												@endforeach
										</table>
								</div>


						</div>
</div>
@endsection
