/**
Filename: add_transferencia.js

Description:
This js script will manage the events of selecting marcas, modelos and cantidad in the form in transferencias/agregar

**/
    //Count how many elements are available from the inventario and save it in a tuple-key dictionary [(marca,modelo)] 
    // ONLY done when page loded 
    console.log(inventario_completo);	   
    count_dict = {}; 
    for(var i=0; i<inventario_completo.length; i++){
    	marca_modelo = [inventario_completo[i].marca,inventario_completo[i].modelo];
    	count_dict[marca_modelo] = inventario_completo[i].cantidad;
    }



    //When a marca is selected, show the corresponding modelos of such marca
    $('body').on('change', '.marcas_select', function(event){
    	
    	//Filter the modelos where the marca is the one that was chosen
    	var modelos = inventario_completo.filter(function(val) {
		    return val.marca == event.target.value;
		});

    	console.log(modelos);
		//Obtain the id appended from the html id of the select ("marcas_select_3")  
		id = event.target.id.split("_")[2];

		//Fill the modelos select for the row where the marca was selected
		//Llenar el select de las marcas para la fila en que la marca fue seleccionada
		modelos_content = "";
		modelos_seen = []; //To keep track of duplicates
		for(var i=0; i<modelos.length; i++){
			if(!modelos_seen.includes(modelos[i].modelo)){
				modelos_content += "<option value="+modelos[i].modelo+">"+modelos[i].modelo+"</option>";
				modelos_seen+=[modelos[i].modelo];
			} 	

			
		}
		$('#modelos_select_'+id).html(modelos_content);
		

    });
    //When a modelo is selected, show the quantity select with option tags that range up to the quantity available
    // e.g. <option>1</option> <option>2</option> ... <option>n</option> where n is the maximum quantity available
    //This will also be triggered whenever a nmew marca is selected, because the first modelo is selected by default.
    $('body').on('change', '.modelos_select, .marcas_select', function(event){
		//Obtain the id appended from the html id of the select ("modelo_select_3")  
		id = event.target.id.split("_")[2];
		marca_modelo = [$("#marcas_select_"+id).val(),$("#modelos_select_"+id).val()];

		//Get the cantidad from the map
		cantidad = count_dict[marca_modelo];

		//Append the html of the quantities
		cantidad_content = "";
		cantidad_content += "<option value='0'>0</option>";//Add an option with 0 as quantity in case there is nothing available.
		for(var i=1; i<=cantidad; i++){
			cantidad_content += "<option value="+i+">"+i+"</option>";
			
		}
		$('#cantidad_select_'+id).html(cantidad_content);

    });	

    //When a cantidad is selected, a new row of the form will be created
    $('body').on('change', '.cantidad_select', function(event){

		//Obtain the id appended from the html id of the select ("cantidad_select_3")  
		id = event.target.id.split("_")[2];
		id_next = parseInt(id)+1; //The next row will be 1 more in id
		//Only if the new row has does not exist yet, create a new row
		if(!$("#line_"+id_next).length){

 			new_row_content = "<tr id='line_"+id_next+"'><td width='45%'><select class='form-control marcas_select' name='marcas' id='marcas_select_"+id_next+"'><option value='null'>Seleccione</option>";

 			//Append marcas from the inventario_con_marcas global variable passed from the php controller
 			inventario_con_marcas.forEach(function(item_con_marca){
 				new_row_content+="<option value='"+item_con_marca.marca+"'>"+item_con_marca.marca+"</option>";

 			});

 			//Append final html
 			new_row_content += "</td><td width='45%'><select class='form-control modelos_select' name='modelos' id='modelos_select_"+id_next+"'></select></td><td width='10%'><select  class='form-control cantidad_select' name='cantidad'  id='cantidad_select_"+id_next+"'></select></td></tr>";

		    $("#line_"+id).after(new_row_content);
		 
		}

    });	


