<!-- views/include/form_erros.blade.php-->
@if(count($errors) > 0)
	<div class="row">
		<div class="col-lg-6">	
		    <span class="help-block">
		    	<ul>
		    	@foreach ($errors->all() as $error)
		        	<li><strong>{{ $error }}</strong></li><br>
		        @endforeach
		    	</ul>
		    </span>	
		</div>
	</div>
@endif