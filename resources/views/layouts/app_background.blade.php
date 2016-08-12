<!-- resources/views/layouts/app_background.blade.php -->

<!DOCTYPE html>
<html lang="en">
	  <head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<!-- CSS And JavaScript -->
					<!-- Fonts -->
				    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
					<!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
					<link rel="stylesheet" href="{{URL::asset('assets/css/flatly/bootstrap.min.css')}}">
				<!--Test scripts-->
				<style type="css">
					.btn-margin{
						margin: 5px,10px,10px,5px;
					}
				</style>
				<!-- JavaScripts -->
				<script type="text/javascript" src="{{URL::asset('assets/js/jquery.js')}}"></script>

        <title>Manager de F2</title>
				<html lang="en">



    </head>

    <body style="background-image:url({{URL::asset('assets/img/f2_background.jpg')}}); background-size:100%;">
			<nav class="navbar navbar-inverse navbar-static-top">
					<div class="container">
							<div class="navbar-header">

									<!-- Collapsed Hamburger -->
									<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
											<span class="sr-only">Toggle Navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
									</button>

									<!-- Branding Image -->
									<div class="logo_container">
										<a class="navbar-brand" style="padding:5px;" href="{{ url('/') }}">
												<img src="{{URL::asset('assets/img/logo-1.png')}}" alt="Manager F2" style="max-width:100%; max-height:100%;">
										</a>
									</div>
							</div>

							<div class="collapse navbar-collapse" id="app-navbar-collapse">
									<!-- Left Side Of Navbar -->
									<ul class="nav navbar-nav">
											<li><a href="{{ url('/home') }}">Inicio</a></li>
											<li><a href="{{ url('/menu') }}">Menu</a></li>

												@role(["owner","admin","bodega"])
												<li><a href="{{ url('/inventario/agrupado') }}">Inventario</a></li>
												<li><a href="{{ url('/transferencia') }}">Transferencias</a></li>
												@endrole

												@role(["owner","admin","garantia"])
												<li><a href="{{ url('/garantias') }}">Garantías</a></li>
												@endrole

												@role(["owner","admin","vendedor"])
												<li><a href="{{ url('/ventas') }}">Ventas</a></li>
												@endrole

												@role(["owner","admin","vendedor","bodega","garantia"])
												<li><a href="{{ url('/inventario') }}">Catálogo</a></li>
												@endrole												



									</ul>

									<!-- Right Side Of Navbar -->
									<ul class="nav navbar-nav navbar-right">
											<!-- Authentication Links -->
											@if (Auth::guest())
													<li><a href="{{ url('/login') }}">Login</a></li>
													 <li><a href="{{ url('/register') }}">Register</a></li>
											@else
													<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
																	{{ Auth::user()->name }} <span class="caret"></span>
															</a>

															<ul class="dropdown-menu" role="menu">
																	<li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
															</ul>
													</li>
											@endif
									</ul>
							</div>
					</div>
			</nav>

			@yield('content')
    </body>
</html>

<!-- JavaScripts -->
<script type="text/javascript" src="{{URL::asset('assets/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
<!-- CDNS
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
-->
<script type="text/javascript">

	//Toggle checkbox when clicking on a row that has a checkbox
	$('.checkbox_row').click(function(event){
		if(event.target.type !== 'checkbox'){
			var $checkbox = $(this).find(':checkbox');
			$checkbox.trigger('click')
		}
	});

	//Load page with the info from the option selected
    $('#bodega_select').change(function() {
    	var view_type= $('#view_type').val(); //Hidden input to know where the form comes from
    	if(view_type != "view_only"){
	    	var bodega = $(this).find(':selected').val();
	    	if(bodega == "all"){
	    		window.location.replace("/"+ view_type+"/");	
	    	}else{
	    		window.location.replace("/"+ view_type+"/b/"+bodega);	
	    	}    		
    	}


    	
    });
</script>

