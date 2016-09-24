<!-- resources/views/layouts/app_body.blade.php -->
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
								<li><a href="{{ url('/inventario') }}">Inventario</a></li>
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
