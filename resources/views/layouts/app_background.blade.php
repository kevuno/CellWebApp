<!-- resources/views/layouts/app_background.blade.php -->

<!--This is the app template with the image as a background -->

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

				<!--Datatables-->
				<link rel="stylesheet" href="cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

        <title>Manager de F2</title>
				<html lang="en">



    </head>

    <body style="background-image:url({{URL::asset('assets/img/f2_background.jpg')}}); background-size:100%;">
		@include("layouts.app_body")

		@yield('content')
    </body>
</html>

<!-- JavaScripts -->
<script type="text/javascript" src="{{URL::asset('assets/js/jquery.js')}}"></script>
<script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
<script src="cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
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

