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

//Para poder mostrar cierta inforamcion dependiendo del rol
use App\Role;



class InventarioCRUDController extends Controller
{
    //Pagina inicio del inventario con los elementos uno por uno
    //Read
    public function index(){
        if(Auth::user()->hasRole(["owner","admin"])){
            //Mostrar todas los datos si el usuario es admin o owner
            $inventarios = Inventario::orderBy('created_at','desc')
                            ->get();
        }else if(Auth::user()->hasRole(["bodega"])){
            //Mostrar solo los datos de la bodega del usuario si el usuario es bodega.
            //$inventarios = Inventario::orderBy('created_at', 'asc')->get();
            $inventarios = Inventario::where('bodega_id','=',Auth::user()->bodega->id)
                            ->orderBy('created_at','desc')
                            ->get();
        }
    	

        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }

        return view("inventario.index", ['inventarios' => $inventarios,'bodegas'=>$bodegas,'bodega_selected'=> "null"]);
    }

    //Pagina inicio del inventario con los elementos uno por uno especificando una bodega.
    //Solo los admins pueden ver una bodega en especifico
    //Read
    public function indexBodega($bodega){


        //Mostrar solo los datos de la bodega que se paso
        $inventarios = Inventario::where('bodega_id','=',$bodega)->orderBy('created_at','desc')->get();  
        
        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }

        return view("inventario.index", ['inventarios' => $inventarios,'bodegas'=>$bodegas,'bodega_selected'=>$bodega]);
    }


    //Pagina inicio del inventario con los elementos agrupados
    //Read
    //TODO
    public function indexAgrupado(){
        $inventarios = DB::table('inventarios')
                     ->select(DB::raw('*,count(id) as count'))
                     ->groupBy('marca')
                     ->groupBy('modelo')
                     ->get();
        //Asignar el nombre de la bodega a los resultados puesto que no son objectos del inventario sino un array de objectos de la tabla.
        foreach ($inventarios as $inventario) {
            //Encontrar el objeto en la base de datos con el id que tiene el array del inventario, sacar el nombre y asignarlo como bodega al $inventario.
            $inventario->bodega = Bodega::find($inventario->bodega_id)->nombre;
        }
        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }

        return view("inventario.agrupado", ['inventarios' => $inventarios,'bodegas'=>$bodegas,'bodega_selected'=> "null"]);
    }



    //For for create
    public function agregar(){

        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }
        return view("inventario.add",['bodegas'=>$bodegas]);
    }



    //Create
    public function agregarPost(Request $request){
    	// Validate
    	//TODO: Change to Form Request validation

        $validator = Validator::make($request->all(), [
            'imei' => 'required|digits:10|unique:inventarios',
            'marca' => 'required',
            'modelo' => 'required',
            'precio_minimo' => 'required',
            'precio_maximo' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('inventario/agregar')
                        ->withErrors($validator)
                        ->withInput();
        }

        //Create object
        echo $request -> imei;
        $inventario = new Inventario;        
        $inventario -> imei = $request -> imei;
        $inventario -> marca = $request -> marca;
        $inventario -> modelo = $request -> modelo;
        $inventario -> estatus = "I"; //en inventario
        $inventario -> bodega_id = $request -> bodega;
        $inventario -> fecha_ingreso = Carbon\Carbon::now();
        $inventario -> ingresado_por = Auth::user()->name;
        $inventario -> precio_min = $request -> precio_minimo;
        $inventario -> precio_max = $request -> precio_maximo;
        $inventario -> save();

        // Response

        //Inventario::create($request->all());
        return redirect('/inventario')
                        ->with('success','Item created successfully');
    }

}
