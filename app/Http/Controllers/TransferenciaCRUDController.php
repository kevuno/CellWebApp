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

//Para pasar las variables de php a javascript
use JavaScript;

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

    /** Form for create new transferencia (with no marca selected yet) **/
    public function createEmpty(){


        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            //Select all bodegas
            $bodegas = Bodega::orderBy('nombre','asc')->get();
            //Select the first one by default
            $bodega_selected = Bodega::orderBy('nombre','asc')->first();
            //Select all the inventory of the first bodega (by default) so that add_transferencia.js gets encharged of showing the marcas and modelos

            $inventario_completo = Inventario::where('bodega_id','=',$bodega_selected->id)->get();
            //Pasar la lista de marcas (la lista de modelos cargarga usando ajax solo si se ha seleccionado una marca)
            $inventario_con_marcas = Inventario::where('bodega_id','=',$bodega_selected->id)->groupBy('marca')->get();
        }else{
            //Select all bodegas
            $bodegas = Bodega::orderBy('nombre','asc')->get();
            //Select the bodega of the user
            $bodega_selected = Auth::user()->bodega;
            //Pasamos todo el inventario para que add_transferencia.js se encargue de mostrar las marcas y modelos que sean correspondientes
            $inventario_completo = Inventario::where('bodega_id','=',Auth::user()->bodega->id)->get();
            //Pasar la lista de marcas (la lista de modelos cargarga usando ajax solo si se ha seleccionado una marca)
            $inventario_con_marcas = Inventario::where('bodega_id','=',Auth::user()->bodega->id)->groupBy('marca')->get();
        }
        


        JavaScript::put([
            'inventario_completo' => $inventario_completo,
            'inventario_con_marcas' => $inventario_con_marcas
        ]);

        
        return view("transferencia.add",['bodegas'=>$bodegas,
                                         'bodega_selected'=> $bodega_selected, 
                                         'inventario_con_marcas' => $inventario_con_marcas,
                                         'inventario_completo' => $inventario_completo
                                         ]);
    }


    /** Form for create new transferencia with a bodega selected**/
    /*Only available for admins and owner*/
    public function createBodegaSelected(Request $request){

        $bodega_id = $request->id; #id passed through ajax call in select_bodega.js
        
        //Pasar la lista de bodegas
        $bodegas = Bodega::orderBy('nombre','asc')->get();
        //Obtain the bodega from the id that was selected
        $bodega_selected = Bodega::find($bodega_id);
        //Pasamos todo el inventario para que add_transferencia.js se encargue de mostrar las marcas y modelos que sean correspondientes
        $inventario_completo = Inventario::where('bodega_id','=',$bodega_id)->get();
       
        //Pasar la lista de marcas (la lista de modelos cargarga usando ajax solo si se ha seleccionado una marca)
        $inventario_con_marcas = Inventario::groupBy('marca')->where('bodega_id','=',$bodega_id)->get();

        JavaScript::put([
            'inventario_completo' => $inventario_completo,
            'inventario_con_marcas' => $inventario_con_marcas
        ]);

        //Responder solo si el request es json
        if ($request->ajax()) {
            return view("transferencia.add_content", ['bodegas'=>$bodegas,
                                         'bodega_selected'=> $bodega_selected, 
                                         'inventario_con_marcas' => $inventario_con_marcas,
                                         'inventario_completo' => $inventario_completo
                                         ]);

        }
        return "Error, la seleccion de bodega para hacer una transferencia solo se puede hacer por medio de ajax";


    }    

    

    /** Form for create new transferencia (after selecting a marca from the form, or from the list of inventarios) **/
    /**TODO**/
    public function createSelected(Inventario $inventario){

        //Pasar la lista de bodegas
        $bodegas = Bodega::orderBy('nombre','asc')->get();
        //Pasar la lista de bodegas
        if(Auth::user()->hasRole(["owner","admin"])){
            $bodegas = Bodega::orderBy('nombre','asc')->get();
            $bodega_selected = "all";
        }else{
            $bodegas[] = Auth::user()->bodega;
            $bodega_selected = Auth::user()->bodega;
        }
        //Pasar la lista de marcas (la lista de modelos cargarga usando ajax solo si se ha seleccionado una marca)
        $marcas = Inventario::groupBy('marca')->get();

        
        return view("transferencia.add",['bodegas'=>$bodegas,
                                         'inventario'=>$inventario,
                                         'bodega_selected'=> $bodega_selected, 
                                         'marcas' => $marcas]);
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

    /**Pagina inicio de las transferencias  pasadas**/
    
    public function completedList(){
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
            $bodega_selected = "all";
        }else{
            $bodegas[] = Auth::user()->bodega;
            $bodega_selected = Auth::user()->bodega;
        }
        return view("transferencia.index", ['transferencias' => $transferencias,'bodegas'=>$bodegas,'bodega_selected'=> $bodega_selected]);
    }




    /**
        *ACCEPT
    **/    

    /**View of list of pending transferencias**/

    public function acceptList(){
        //Obtener lista de transferencias
        if(Auth::user()->hasRole(["owner","admin"])){
            //Mostrar todas los datos si el usuario es admin o owner
            $transferencias = Transferencia::where('estatus','=',"T")->groupBy('transferencia_grupo')
                                                                     ->get();
        }else{
            $transferencias = Transferencia::where('estatus','=',"T")
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
            $bodega_selected = "all";         
        }else{
            $bodegas[] = Auth::user()->bodega;                        
            $bodega_selected = Auth::user()->bodega;
        }

        return view("transferencia.accept_list", ['transferencias' => $transferencias,'bodegas'=>$bodegas,'bodega_selected'=> $bodega_selected]);

    }
    /**Pagina inicio de las transferencias especificando una bodega. **/
    /* Accesible only by role: Admin, Owner */
    
    public function acceptListBodega(Request $request){

        $bodega_id = $request->id; #id passed through ajax call in select_bodega.js
        if($bodega_id == "all"){
            //Transferencias de todas las bodegas
            $transferencias = Transferencia::orderBy('updated_at','desc')
                                            ->where('estatus','=',"T")
                                            ->groupBy('transferencia_grupo')
                                            ->get();   
        }else{
            //Transferencias de una bodega en especifico
            $transferencias = Transferencia::where('estatus','=',"T")
                                                    ->where(function($query) use ($bodega_id) {
                                                        $query->where('bodega_origen','=',$bodega_id)
                                                        ->orWhere('bodega_destino','=',$bodega_id);
                                                        })
                                                    ->orderBy('updated_at','desc')
                                                    ->groupBy('transferencia_grupo')
                                                    ->get();
        }

        //Pasar la lista de bodegas
        $bodegas = Bodega::orderBy('nombre','asc')->get();

        //Responder solo si el request es json
        if ($request->ajax()) {
            return view("transferencia.accept_list_content", ['transferencias' => $transferencias,
                                                        'bodegas'=>$bodegas,
                                                        'bodega_selected'=>$bodega_id]);
        }
        return "Error, la seleccion de bodega solo se puede hacer por medio de json";
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
