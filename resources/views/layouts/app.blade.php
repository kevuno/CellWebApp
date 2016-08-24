<!-- resources/views/layouts/app.blade.php -->
<!--This is the app template with normal white background -->

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
		<script type="text/javascript" src="{{URL::asset('assets/js/bootstrap.min.js')}}"></script>
		<script src="cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>

		<!--Datatables css-->
		<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">


<title>Manager de F2</title>
		<html lang="en">



</head>
<body>
@include("layouts.app_body")	
@yield('content')
</body>
   
</html>

		<!-- jQuery -->
        <script src="//code.jquery.com/jquery.js"></script>
        <!-- DataTables -->
        <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
        <!-- Bootstrap JavaScript -->
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>


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

