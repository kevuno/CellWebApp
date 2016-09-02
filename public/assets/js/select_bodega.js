//Load page with the info from the option selected
/***
Global clicked: Helper variable that will avoid executing the jQuery event multiple times. 
Every time the js loads, the clicked will be reseted to false.
***/
var clicked = false;
$('#bodega_select').change(function(e) {
	if (!clicked){
		console.log("EXECUTED");
		e.preventDefault();
		clicked = true;
		loadInfoFromBodega($(this).find(':selected').val());

	}	
});

function loadInfoFromBodega(Bodegaid) {
    $.ajax({
        type: "POST",
        url: 'inventario/',
        data: {'id': Bodegaid},
        success: function(data) {
        	console.log(data);
			$data = $(data); // the HTML content that controller has produced
            $('#table_content').hide().html($data).fadeIn();
        },
        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        	$('body').hide().html(jqXHR.responseText).fadeIn();
	        console.log(JSON.stringify(jqXHR)[0]);
	        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    	}
    });
}
