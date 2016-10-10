<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


use DB;

//Para el objeto de las validaciones
use Validator;

//Para las fechas
use Carbon;

//Para poder usar el objecto del usuario que esta logueado
use Auth;
//Para poder usar el objeto bodega
use App\Bodega;
//Para poder usar el objeto del inventario
use App\Inventario;
//Para poder usar el objeto del inventario con imei
use App\InventarioImei;


//Para poder mostrar cierta inforamcion dependiendo del rol
use App\Role;


//para poder usar el datatables
use Datatables;



class InventarioCRUDController extends Controller
{

    /**
        *READ
    **/


    /** Tabla de inventario con imei verificados **/
    
    public function indexImei(){
        if(Auth::user()->hasRole(["owner","admin"])){
            //Mostrar todas los datos si el usuario es admin o owner
            $inventarios = InventarioImei::all();
        }else{
            $inventarios = InventarioImei::where('bodega_id','=',Auth::user()->bodega->id)->orderBy('updated_at','desc')->get();
        }
    	

        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }

        return view("inventario.imei", ['inventarios' => $inventarios,'bodegas'=>$bodegas,'bodega_selected'=> "all"]);
    }

    /** Tabla de inventario con imei verificados con una bodega especificada**/
    /* Accesible only by role: Admin, Owner */
    public function indexImeiBodega(Request $request){
        /**
        *  Request $request: Informacion del id de la bodega de la cual se obtendra el inventario.
        *  Si $request ->id es = "all", la sql sera obtener la info de todas las bodegas.
        **/

        $bodega_id = $request->id;

        
        if($bodega_id == "all"){
            //Inventario de todas las bodegas
            $inventarios = InventarioImei::all();            
        }else{
            //Inventario de una bodega en especifico
            $inventarios = InventarioImei::where('bodega_id','=',$bodega_id)->orderBy('created_at','desc')->get();
        }
        

        //Pasar la lista de bodegas
        $bodegas = Bodega::orderBy('nombre','asc')->get();


        //Responder solo si el request es json
        if ($request->ajax()) {
            return   view("inventario.imei_content", ['inventarios' => $inventarios,'bodegas'=>$bodegas,'bodega_selected'=>$bodega_id]);
        }
        return "Error, la seleccion de bodega solo se puede hacer por medio de json";
    }   

    /** Tabla de inventario**/
    public function indexAgrupado(){
        if(Auth::user()->hasRole(["owner","admin"])){
            //Mostrar todas los datos si el usuario es admin o owner
            $inventarios = Inventario::all();
        }else{
            $inventarios = Inventario::where('bodega_id','=',Auth::user()->bodega->id)->orderBy('updated_at','desc')->get();
        }
        

        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }

        return view("inventario.agrupado", ['inventarios' => $inventarios,'bodegas'=>$bodegas,'bodega_selected'=> "all"]);
    }

    /** Tabla de inventario con una bodega especificada**/
    /* Accesible only by role: Admin, Owner */
    public function indexAgrupadoBodega(Request $request){

        $bodega_id = $request->id; #id passed through ajax call in select_bodega.js

        
        if($bodega_id == "all"){
            //Inventario de todas las bodegas
            $inventarios = Inventario::all();            
        }else{
            //Inventario de una bodega en especifico
            $inventarios = Inventario::where('bodega_id','=',$bodega_id)->get();
        }
        
        
        //Pasar la lista de bodegas
        $bodegas = Bodega::orderBy('nombre','asc')->get();            

        //Responder solo si el request es json
        if ($request->ajax()) {
            return   view("inventario.agrupado_content", ['inventarios' => $inventarios,'bodegas'=>$bodegas,'bodega_selected'=>$bodega_id]);
        }
        return "Error, la seleccion de bodega solo se puede hacer por medio de json";
    }




    /**
        *CREATE
    **/



    //Form to store 1 element with verified imei
    public function create(){

        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }
        return view("inventario.add",['bodegas'=>$bodegas]);
    }

    //POST of the form to store 1 element with verified imei
    public function store(Request $request){
    	// Validate

        $validator = Validator::make($request->all(), [
            'imei' => 'required|digits:10|unique:inventario_imeis',
            'marca' => 'required',
            'modelo' => 'required',
            'precio_min' => 'required',
            'precio_max' => 'required|greater_equal_than_field:precio_min',
        ],["greater_equal_than_field" => "El precio máximo debe ser mayor o igual al precio mínimo"]);
        if ($validator->fails()) {
            return redirect('inventario/agregar_uno')
                        ->withErrors($validator)
                        ->withInput();
        }

        //Create object

        $inventarioImei = new InventarioImei($request->all());       
        $inventarioImei -> estatus = "I"; //en inventario
        $inventarioImei -> fecha_ingreso = Carbon\Carbon::now();
        $inventarioImei -> ingresado_por = Auth::user()->name;
        $inventarioImei -> save();

        // Response

        //Inventario::create($request->all());
        return redirect('/inventario/imei')
                        ->with('success','Elemento fue agregado al inventario satisfactoriamente');
    }

    //Form for create using csv file
    public function create_csv(){

        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }
        return view("inventario.add_csv",['bodegas'=>$bodegas]);
    }

    //POST Store a new inventario using a csv file
    public function store_csv(Request $request){
        // Validate file type
        $validator = Validator::make($request->all(), [
            'file' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('inventario/agregar_csv')
                        ->withErrors($validator)
                        ->withInput();
        }
        if($request->file('file')->getClientMimeType() != "application/vnd.ms-excel"){
            return redirect('inventario/agregar_csv')
                        ->withErrors(['Archivo no es de tipo csv']);
        }



        // Get file field from html form
        $file = $request->file('file');
        // Open file read-only (hence the "r")
        $handle = fopen($file, "r");
        // Variable to ignore the headers and then later store them in an array
        $header = true;
        $headers = [];
        //Line counter
        $line_count = 1;
        while ($csvLine = fgetcsv($handle, 1000, ",")) {

            if($header){
                //If this is the first row, do not read the line, instead save this line as headers.
                $header = false;
                $headers = $csvLine;
            }else{

                
                $fields_query = []; //Query array
                //Go through each element of the headers and modify the keys so that they can used later on when quering for the object.

                foreach ($headers as $key => $header_atr) {
                    //Chage the key in the csvLine array from numbers to actual names
                    $csvLine[$header_atr] = $csvLine[$key];
                    unset($csvLine[$key]);

                    if($header_atr != "cantidad"){
                        $fields_query[$header_atr] = $csvLine[$header_atr]; 
                    }                    
                }
                //Save the bodega into the query since it was not in the headers of the csv file.
                $fields_query["bodega_id"] = $request->bodega_id;
                //Create object
                $inventario = Inventario::firstOrNew($fields_query);

                //Validate values of object
                $validator = Validator::make($csvLine, [
                        'marca' => 'required',
                        'modelo' => 'required',
                        'precio_min' => 'required',
                        'precio_max' => 'required|greater_equal_than_field:precio_min',
                        'cantidad' => 'required|integer|min:0',
                ],["greater_equal_than_field" => "El precio máximo debe ser mayor o igual al precio mínimo"]);
                if ($validator->fails()) {
                    return redirect('inventario/agregar_csv')
                                ->withErrors($validator)
                                ->with('csv_error',"Error en equipo en linea  ".$line_count)
                                ->withInput();
                }

                //Add atributes and save
                $inventario -> cantidad += $csvLine["cantidad"];

                $inventario -> estatus = "I"; //en inventario
                $inventario -> fecha_ingreso = Carbon\Carbon::now();
                $inventario -> ingresado_por = Auth::user()->name;
                $inventario -> save();
                echo $inventario."<br>";
                $line_count++;

            }
        }
  
        // Response
        return redirect('/inventario')
                        ->with('success','Elementos fue agregados al inventario satisfactoriamente');
    }

    //Form for create using multiple elements (codebar scanner)
    public function create_mult(){

        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }
        return view("inventario.add_mult",['bodegas'=>$bodegas]);
    }

    //POST of the form for storing a new inventario using AJAX with the codebar scanner / multiple fast insertions
    public function store_mult(Request $request){

        // Validate
        $validator = Validator::make($request->all(), [
            'marca' => 'required',
            'modelo' => 'required',
            'precio_min' => 'required',
            'precio_max' => 'required|greater_equal_than_field:precio_min',
            'cantidad' => 'required|integer|min:0',
        ],["greater_equal_than_field" => "El precio máximo debe ser mayor o igual al precio mínimo"]);
        if ($validator->fails()) {
            return redirect('inventario/agregar_mult')
                        ->withErrors($validator)
                        ->withInput();
        }

        //If it doesnt exist then just create it and adds the quantity
        $inventario = Inventario::firstOrNew($request->except('cantidad'));

        //Add the amount into the actual amount of such element in the inventory.
        $inventario -> cantidad += $request->cantidad;
        //Other fields
        $inventario -> estatus = "I"; //en inventario
        $inventario -> fecha_ingreso = Carbon\Carbon::now();
        $inventario -> ingresado_por = Auth::user()->name;
        $inventario -> save();
        return redirect('/inventario')
                        ->with('success','Elementos agregados al inventario satisfactoriamente');
    }


    //Form for create using multiple elements (codebar scanner)
    public function create_mult_imei(){

        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }
        return view("inventario.add_mult_imei",['bodegas'=>$bodegas]);
    }


    //Return table view with the information of the form, a button and the dynamic table
    public function agregar_mult_info_imeiAndInput(){

        return view("inventario.add_mult_info_imeiAndInput");
    }


    //POST of the form for storing a new inventario using AJAX with the codebar scanner / multiple fast insertions
    public function store_mult_oneElement(Request $request){

        // Validate

        $validator = Validator::make($request->all(), [
            'imei' => 'required|digits:10|unique:inventario_imeis',
            'marca' => 'required',
            'modelo' => 'required',
            'precio_min' => 'required',
            'precio_max' => 'required|greater_equal_than_field:precio_min',
        ],["greater_equal_than_field" => "El precio máximo debe ser mayor o igual al precio mínimo"]);
        if ($validator->fails()) {
            return ["error"=>True, "id"=> $request->imei, "errorData" => $validator->messages()->toJson()];
        }
 
        //Create object 

        $inventarioImei = new InventarioImei($request->all());       
        $inventarioImei -> estatus = "I"; //en inventario
        $inventarioImei -> fecha_ingreso = Carbon\Carbon::now();
        $inventarioImei -> ingresado_por = Auth::user()->name;
        $inventarioImei -> save();

        // Response

        //Inventario::create($request->all());
        return $inventarioImei;
    }




    /**
        *UPDATE   
    **/

    //Form for editing
    public function edit(Inventario $inventario){

        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }
        return view("inventario.editar",['bodegas'=>$bodegas,'inventario'=>$inventario]);
    }

    //Upadte the especified inventario
    public function update($id,Request $request){

        echo $id;
        // Validate
        //TODO: Change to Form Request validation

        $validator = Validator::make($request->all(), [
            'imei' => 'required|digits:10|unique:inventarios,imei,'.$id,
            'marca' => 'required',
            'modelo' => 'required',
            'precio_min' => 'required',
            'precio_max' => 'required|greater_equal_than_field:precio_min',
        ],["greater_equal_than_field" => "El precio máximo debe ser mayor o igual al precio mínimo"]);
        if ($validator->fails()) {
            return redirect('inventario/editar/'.$id)
                        ->withErrors($validator)
                        ->withInput();
        }

        //Create object
        $inventario = Inventario::find($id);
        $inventario -> imei = $request -> input('imei');
        $inventario -> marca = $request -> marca;
        $inventario -> modelo = $request -> modelo;
        $inventario -> estatus = "I"; //en inventario
        $inventario -> bodega_id = $request -> bodega;
        $inventario -> fecha_ingreso = Carbon\Carbon::now();
        $inventario -> ingresado_por = Auth::user()->name;
        $inventario -> precio_min = $request -> precio_min;
        $inventario -> precio_max = $request -> precio_max;
        $inventario -> save();

        // Response

        //Inventario::create($request->all());
        return redirect('/inventario')
                        ->with('success','Elemento del inventario fue actualizado satisfactoriamente');
    }

    //Return the bodega object from the id
    public function bodegaIdToName(Request $request){
        return Bodega::find($request->id);
    }



}
