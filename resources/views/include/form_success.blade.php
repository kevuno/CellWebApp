<!-- views/include/form_success.blade.php-->
@if(Session::has('success'))
	<div class="alert alert-dismissible alert-info">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<strong> {{Session::get('success')}}</strong>
	</div>
@endif