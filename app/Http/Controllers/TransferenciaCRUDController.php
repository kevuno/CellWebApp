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



    /** POST of the form for storing a new transferencia **/
    public function store(Inventario $inventario, Request $request){
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
            $transferencias = Transferencia::where('estatus','=',"T")->get();
        }else{
            $transferencias = Transferencia::where('estatus','=',"T")
                                                    ->where(function($query) {
                                                        $query->where('bodega_origen','=',Auth::user()->bodega->id)
                                                        ->orWhere('bodega_destino','=',Auth::user()->bodega->id);
                                                        })                                                    
                                                    ->orderBy('updated_at','desc')
                                                    ->get();

        }         

        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }
        return view("transferencia.index", ['transferencias' => $transferencias,'bodegas'=>$bodegas,'bodega_selected'=> "all"]);
    }


    /**Pagina inicio de las transferencias especificando una bodega. **/
    /* Accesible only by role: Admin, Owner */
    
    public function indexBodega(Request $request){

        $bodega_id = $request->id; #id passed through ajax call in select_bodega.js
        
        if($bodega_id == "all"){
            //Transferencias de todas las bodegas
            $transferencias = Transferencia::orderBy('updated_at','desc')->get();   
        }else{
            //Transferencias de una bodega en especifico
            $transferencias = Transferencia::where('bodega_origen','=',$bodega_id)
                                                    ->orWhere('bodega_destino','=',$bodega_id)
                                                    ->orderBy('updated_at','desc')
                                                    ->get();
        }

        //Pasar la lista de bodegas
        $bodegas = Bodega::orderBy('nombre','asc')->get();

        //Responder solo si el request es json
        if ($request->ajax()) {
            return view("transferencia.index_content", ['transferencias' => $transferencias,'bodegas'=>$bodegas,'bodega_selected'=>$bodega_id]);
        }
        return "Error, la seleccion de bodega solo se puede hacer por medio de json";
    }


    /**
        *ACCEPT
    **/    

    /**View of list of pending transferencias**/

    public function accept_list(){
        //Obtener lista de transferencias
        if(Auth::user()->hasRole(["owner","admin"])){
            //Mostrar todas los datos si el usuario es admin o owner
            $transferencias = Transferencia::where('estatus','=',"A")->groupBy('transferencia_grupo')
                                                                     ->get();
        }else{
            $transferencias = Transferencia::where('estatus','=',"A")
                                                    ->where(function($query) {
                                                        $query->where('bodega_origen','=',Auth::user()->bodega->id)
                                                        ->orWhere('bodega_destino','=',Auth::user()->bodega->id);
                                                        })
                                                    ->groupBy('transferencia_grupo')                                                    
                                                    ->orderBy('updated_at','desc')
                                                    ->get();
        }        

        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();            
        }else{
            $bodegas[] = Auth::user()->bodega;
        }

        return view("transferencia.accept_list", ['transferencias' => $transferencias,'bodegas'=>$bodegas,'bodega_selected'=> "all"]);

    }


    /**View of list of pending transferencias**/

    public function accept_detail(Transferencia $transferencia, Request $request){
        // In order to obtain the info of the whole group of the transferencia, we pass only 1 element of the transferencia.
        // From that 1 element we can get the group_id, which will be used to obtain all the elements of the group.

        $transferencia_grupo = $transferencia->transferencia_grupo;
        $bodega_origen = $transferencia->bod_origen->nombre;
        $bodega_destino = $transferencia->bod_destino->nombre;

        //Obtener lista de transferencias
            //Mostrar todas los datos si el usuario es admin o owner
        $transferencias = Transferencia::where('transferencia_grupo','=',$transferencia_grupo)->get();

        return view("transferencia.accept_detail", ['transferencias' => $transferencias,
                                                     'bodega_origen' => $bodega_origen,
                                                    'bodega_destino' => $bodega_destino ]);

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
