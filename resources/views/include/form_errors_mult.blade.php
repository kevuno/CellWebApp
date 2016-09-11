<!-- views/include/form_errors_mult.blade.php-->
@if(Session::has('mult_error'))
	<div class="alert alert-dismissible alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong> {{Session::get('mult_error')}}</strong>
	</div>
@endif