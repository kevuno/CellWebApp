<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;


//Para las fechas
use Carbon;

//Para poder usar el objecto del usuario que esta logueado
use Auth;
//Para poder usar el objeto bodega
use App\Bodega;
//Para poder usar el objeto del inventario
use App\Inventario;



class InventarioCRUDController extends Controller
{
    //Pagina inicio del inventario
    //Read
    public function index(){

    	//$users = User::orderBy('created_at', 'asc')->get();

        //return view("admin.users",['users' => $users]);

        return view("inventario.index");
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
    public function create(Request $request){
    	// Validate
    	//TODO: Change to Form Request validation
        $this->validate($request, [
            'imei' => 'bail|required|digits:10',
            'marca' => 'required',
            'modelo' => 'required',
        ]);
        //Create object
        
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
