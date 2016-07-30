<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
	  <head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<!-- CSS And JavaScript -->
				<!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
	      <link href="{{ URL::to('css/bootstrap.min.css') }}" rel="stylesheet">
				<script type="text/javascript" src="{{ URL::to('js/bootstrap.js') }}"></script>
	      <!--JQUERY-->
	      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <title>ImportTel App</title>
				<html lang="en">



    </head>

    <body>
        <div class="container">
            <nav class="navbar navbar-default">
                <!-- Navbar Contents -->
								This is a navbar
            </nav>
        </div>

        @yield('content')
    </body>
</html>
