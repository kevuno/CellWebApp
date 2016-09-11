/*  1. Obtain the info of marca,modelo,bodega,precio_min and precio_max from the form in add_mult.blade.php.
    2. Save them temporarly in an array
    3. Convert the form into a div displaying the information that the user inserted
    4. Display only a text input and a button to finalize insertions.
    5. Everytime an imei is scanned or typed in the input, validate the input using ajax
    6. Whenever there is an error display where was the error found (what imei it was and between was imeis was found)
    7. If there is not an error when the imei was scanned or typed, the information for that element will be displyed
      automaticaly in a table, using the response of ajax.
    8. When the user finished inserting imeis, the "Terminar" button will just bring him back to the inventario index view.



*/

$('#submit_add_mult_info').submit(function(e) {
    e.preventDefault();
    var marca = $('#marca').val();
    var modelo = $('#modelo').val();
    var bodega_id = $('#bodega_select').val();
    var precio_min = $('#precio_min').val();
    var precio_max = $('#precio_max').val();

    
    //Get the name of the bodega from the id selected. 
    
    $.ajax({
        type: "POST",
        url: "bodegaIdToName",
        data: {'id': bodega_id},
        success: function(data) {
            //Save data into an array, the third elelemnt will contain the name of the bodega and the last element will contain the id of the bodega.
            var form_info = [marca,modelo,data["nombre"],precio_min,precio_max,bodega_id];
            formIntoDiv("main_content",form_info);

            
        },

        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
            //Save data into an array instead of saving the name, it will save the id twice, at the third and last position.                        
            var form_info = [marca,modelo,bodega_id,precio_min,precio_max,bodega_id];
            formIntoDiv("main_content",form_info);
        }
    });



    

});


/**
 This function will transfor the form given into a table with information of the array passed and will insert an text
 input at the bottom
 **/
function formIntoDiv(formId,formInfoArray) {

    // Load the view that has the table with the info of the input and the text input for the imei
    $('#'+formId).load('agregar_mult_InfoAndInput', function() {
        var table_content = "";
        formInfoArray.forEach(function(entry) {
            table_content = table_content + "<td>"+entry+"</td>";
            console.log(entry);
        });
        $('#table_info_content').html(table_content);

        //Listen to the form that will submit one imei element
        $('#submit_imei').submit(function(e) {
            e.preventDefault();
            var imei = $('#imei').val();
            console.log(imei);
            saveAndValidateAjax(imei,formInfoArray);
        });
    });

    
}


/**
 This function will transfor the form given into a table with information of the array passed and will insert an text
 input at the bottom
 **/
function saveAndValidateAjax(imei,formInfoArray) {
    var marca = formInfoArray[0];
    var modelo = formInfoArray[1];
    var bodega_id = formInfoArray[formInfoArray.length-1];
    var precio_min = formInfoArray[3];
    var precio_max = formInfoArray[4];

    console.log(bodega_id);
    $.ajax({
        type: "POST",
        url: "agregar_mult_oneElement",
        data: {'imei': imei, 'marca': marca, 'modelo': modelo, 'bodega_id': bodega_id, 'precio_min': precio_min, 'precio_max': precio_max,},
        success: function(data) {
            console.log(data);
            
            /**If the insertion fails validation then the 'error' key will be present. If there is an error,
            *parse the message and show it by prepending it to the "AjaxResponse" div.

            *If not error, append the Inventario object as a response into the table.**/
            if("error" in data){
                
                //data["errorData"] has the information of the validation error in a json format
                // but it is a string, so we convert it into a json object.
                var erroDataJson =jQuery.parseJSON(data["errorData"]);
                //data["id"] has the id of the imei that failed the validation.

                $('#AjaxResponse').hide().prepend("Error en equipo con imei = "+data["id"]+"<br \>"+"<span class='label label-warning'>"+erroDataJson["imei"]+"</span><br> ").fadeIn();
                
            }else{
                /**Append the response inventario object into an html tr, instead of displaying the bodega_id from the
                 * response, display the bodega name from the formInfoArray.
                 */
                var tr = "<tr><td>"+data["imei"]+"</td><td>"+data["marca"]+"</td><td>"+data["modelo"]+"</td><td>"+formInfoArray[1]+"</td><td>"+data["precio_min"]+"</td><td>"+data["precio_max"]+"</td></tr>";
                $('#table_body_content').prepend(tr);
            }   
            //$('#AjaxResponse').hide().html($data).fadeIn();

        },
        error: function(jqXHR, textStatus, errorThrown) { // What to do if we fail
            $('body').hide().html(jqXHR.responseText).fadeIn();
            console.log(JSON.stringify(jqXHR));
            console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
        }
    });
    
}



