//Load page with the info from the option selected
/***
Global clicked: Helper variable that will avoid executing the jQuery event multiple times. 
Every time the js loads, the clicked will be reseted to false.
***/
var clicked = false;
$('#bodega_select').change(function(e) {
	if (!clicked){
		e.preventDefault();
		clicked = true;

        var bodega_id = $(this).find(':selected').val();
        var url = $(this).attr('name');

		loadInfoFromBodega(bodega_id,url);

	}	
});

function loadInfoFromBodega(Bodegaid,url) {
    $.ajax({
        type: "POST",
        url: url,
        data: {'id': Bodegaid},
        success: function(data) {
        	console.log(data);
			$data = $(data); // the HTML content that controller has produced
            $('#table_content').hide().html($data).fadeIn();
        },
        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
        	$('body').hide().html(jqXHR.responseText).fadeIn();
	        console.log(JSON.stringify(jqXHR));
	        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
    	}
    });
}
