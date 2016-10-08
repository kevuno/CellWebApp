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
//Para poder usar el objeto de las transferencias
use App\Transferencia;

//para poder usar el datatables
use Datatables;

class TransferenciaCRUDController extends Controller
{
    /**
        *MENU   
    **/

    /** Form for create **/
    public function menu(){
        
        return view("transferencia.menu");
    }


    
    /**
        *CREATE   
    **/

    /** Form for create **/
    public function create(Inventario $inventario){

        //Pasar la lista de bodegas
        $bodegas = Bodega::orderBy('nombre','asc')->get();    
        
        return view("transferencia.add",['bodegas'=>$bodegas,'inventario'=>$inventario]);
    }



    /** POST of the form for storing a new inventario **/
    public function store(Inventario $inventario, Request $request){
    	var_dump($inventario);
    	// Cambiar el estatus del inventario
    	$inventario -> estatus ="T";
    	$inventario -> save();
    	//Crear transferencia
        $transferencia = new Transferencia;
        $transferencia -> inventario_id = $inventario -> id;
        $transferencia -> estatus = "A"; //Enviado
        $transferencia -> fecha_solicitud = Carbon\Carbon::now();
        $transferencia -> bodega_origen = $inventario-> bodega->id;
        $transferencia -> bodega_destino = $request-> bodega_id;
        $transferencia -> transferido_por = Auth::user()->name;
        $transferencia -> save();

        return redirect('/inventario')
                        ->with('success','Transferencia creada satisfactoriamente');
    }

    /**
        *READ   
    **/

    /**Pagina inicio de las transferencias activas**/
    
    public function index(){
        //Obtener lista de transferencias
        if(Auth::user()->hasRole(["owner","admin"])){
            //Mostrar todas los datos si el usuario es admin o owner
            $transferencias = Transferencia::all();
        }else{
            $transferencias = Transferencia::where('bodega_origen','=',Auth::user()->bodega->id)
                                                    ->orWhere('bodega_destino','=',Auth::user()->bodega->id)
                                                    ->orderBy('updated_at','desc')
                                                    ->get();
        }        

        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }
        return view("transferencia.index", ['transferencias' => $transferencias,'bodegas'=>$bodegas,'bodega_selected'=> "null"]);
    }


    /**Pagina inicio de las transferencias especificando una bodega.
        Solo los admins pueden usar esta funcion**/
    
    public function indexBodega(){
        if(Auth::user()->hasRole(["owner","admin"])){
            //Mostrar todas los datos si el usuario es admin o owner
            $transferencias = Transferencia::orderBy('created_at','desc')
                            ->get();
        }else if(Auth::user()->hasRole(["bodega"])){
            //Mostrar solo los datos de la bodega del usuario si el usuario es bodega.
            //$inventarios = Inventario::orderBy('created_at', 'asc')->get();
            $transferencias = Inventario::where('bodega_origen','=',Auth::user()->bodega->id)
            				->orWhere('bodega_destino','=',Auth::user()->bodega->id)
                            ->orderBy('created_at','desc')
                            ->get();
        }
    	

        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }

        return view("inventario.index", ['transferencias' => $transferencias,'bodegas'=>$bodegas,'bodega_selected'=> "null"]);
    }


    /**
     * Process datatables ajax request.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function anyData()
    {
        return Datatables::of(Transferencia::query())->make(true);
    }



}
