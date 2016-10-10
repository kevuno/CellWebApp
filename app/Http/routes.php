<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use App\Vendedor;
use App\User;
use App\Role;
use Illuminate\Http\Request;

Route::get('/' , ['middleware' => 'auth', function () {
    return redirect('/home');
}]);

Route::auth();
Route::group(['middleware' => 'auth'], function (){
    /*
        Admin routes
        TODO create permissions and attach to roles

    */
    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin|owner']], function() {
        Route::get('/', 'AdminController@index');
    });


    

    /*
        Inventario routes
    */

    Route::group(['prefix' => 'inventario', 'middleware' => ['role:admin|owner|bodega']], function() {

        /*
        Helper ajax routes
        */

        Route::post('/bodegaIdToName', 'InventarioCRUDController@bodegaIdToName');

        
        //Read
            //Main inventario agrupado
            Route::get('/', 'InventarioCRUDController@indexAgrupado');
            #Lista del inventario con una bodega seleccionada
            Route::post('/', ['middleware' => ['role:admin|owner'], 'uses' => 'InventarioCRUDController@indexAgrupadoBodega']);
            //Inventario de imeis verificados
            Route::get('/imei', 'InventarioCRUDController@indexImei');
            #Lista del inventario de imeis verificados con una bodega seleccionada
            Route::post('/imei', ['middleware' => ['role:admin|owner'], 'uses' => 'InventarioCRUDController@indexImeiBodega']);
            
        

        //Create
            //1 by 1
            Route::get('/agregar_uno', 'InventarioCRUDController@create'); //Add form        
            Route::post('/agregar_uno', 'InventarioCRUDController@store'); //Post create

            //Usando archivo de .csv
            Route::get('/agregar_csv', 'InventarioCRUDController@create_csv'); //Add form        
            Route::post('/agregar_csv', 'InventarioCRUDController@store_csv'); //Post create
            
            //Usando codigo de barras/ multiples equipos del mismo modelo
            Route::get('/agregar_mult', 'InventarioCRUDController@create_mult'); //Add form              
            Route::post('/agregar_mult', 'InventarioCRUDController@store_mult'); //Post create


            //Usando codigo de barras/ multiples equipos del mismo modelo con imei
            Route::get('/agregar_mult_imei', 'InventarioCRUDController@create_mult_imei'); //Add form    
                //Vista de una tabla para usarla en add_mult.js
                Route::get('/agregar_mult_imeiInfoAndInput', 'InventarioCRUDController@agregar_mult_info_imeiAndInput'); //Add form      
                Route::post('/agregar_mult_imeioneElement', 'InventarioCRUDController@store_mult_oneElement'); //Post create




        //Editar
        Route::get('/editar/{inventario}', 'InventarioCRUDController@edit'); //Edit form
        Route::put('/editar/{inventario}', 'InventarioCRUDController@update'); //Post edit
    });
    /*
        Transferencia routes
    */

    Route::group(['prefix' => 'transferencia', 'middleware' => ['role:admin|owner|bodega']], function() {

        
        
        //Menu
        Route::get('/', 'TransferenciaCRUDController@menu');

        //Lista
        Route::get('/lista', 'TransferenciaCRUDController@index');
        Route::post('/lista', ['middleware' => ['role:admin|owner'], 'uses' => 'TransferenciaCRUDController@indexBodega']);

        //Create
        Route::get('/agregar/{inventario}', 'TransferenciaCRUDController@create'); //Add form
        Route::post('/agregar/{inventario}', 'TransferenciaCRUDController@store'); //Post create
        
        //Aceptar Transferencia
        Route::get('/aceptar/', 'TransferenciaCRUDController@accept'); //Confirm form
        Route::post('/aceptar/', 'TransferenciaCRUDController@acceptStore'); //Post Confirm
        
        
        //Update
        Route::get('/editar/{transferencia}', 'TransferenciaCRUDController@edit'); //Edit form
        Route::put('/editar/{transferencia}', 'TransferenciaCRUDController@update'); //Post edit
    });

    Route::group(['prefix' => 'transferenciaCompletada', 'middleware' => ['role:admin|owner|bodega']], function() {
        //Read
        Route::get('/', 'TransferenciaCRUDController@completadas');
    });

    Route::get('/home', 'HomeController@index');

    /*
        Menu
    */
    Route::get('/menu', function () {
        return view('menu');
    });





});
