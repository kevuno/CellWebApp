<!-- views/include/form_errors_csv.blade.php-->
@if(Session::has('csv_error'))
	<div class="alert alert-dismissible alert-danger">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong> {{Session::get('csv_error')}}</strong>
	</div>
@endif