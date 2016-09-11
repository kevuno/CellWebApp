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
Route::get('/permissions' ,  function () {


    //TODO create permissions and attach to roles


});

Route::auth();
Route::group(['middleware' => 'auth'], function (){
    /*
        Admin routes
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
        Route::get('/', 'InventarioCRUDController@index');
        Route::post('/', ['middleware' => ['role:admin|owner'], 'uses' => 'InventarioCRUDController@indexBodega']);
        //Route::get('/b/{bodega}', ['middleware' => ['role:admin|owner'], 'uses' => 'InventarioCRUDController@indexBodega']); //List of inventario from certain bodega
        
        Route::get('/agrupado', 'InventarioCRUDController@indexAgrupado');
        Route::post('/agrupado', ['middleware' => ['role:admin|owner'], 'uses' => 'InventarioCRUDController@indexAgrupadoBodega']); //List of inventario agrupado from certain bodega
        //Route::get('/agrupado/b/{bodega}', ['middleware' => ['role:admin|owner'], 'uses' => 'InventarioCRUDController@indexAgrupadoBodega']); //List of inventario agrupado from certain bodega
        
        //Create
            //1 by 1
            Route::get('/agregar', 'InventarioCRUDController@create'); //Add form        
            Route::post('/agregar', 'InventarioCRUDController@store'); //Post create

            //Usando archivo de .csv
            Route::get('/agregar_csv', 'InventarioCRUDController@create_csv'); //Add form        
            Route::post('/agregar_csv', 'InventarioCRUDController@store_csv'); //Post create

            //Usando codigo de barras/ multiples equipos del mismo modelo
            Route::get('/agregar_mult', 'InventarioCRUDController@create_mult'); //Add form        
            Route::post('/agregar_mult', 'InventarioCRUDController@store_mult'); //Post create

                //Vista de una tabla para usarla en add_mult.js
                Route::get('/agregar_mult_InfoAndInput', 'InventarioCRUDController@agregar_mult_InfoAndInput'); //Add form      
                Route::post('/agregar_mult_oneElement', 'InventarioCRUDController@store_mult_oneElement'); //Post create

        //Editar
        Route::get('/editar/{inventario}', 'InventarioCRUDController@edit'); //Post del acción por checkbox
        Route::put('/editar/{inventario}', 'InventarioCRUDController@update'); //Edit edit
    });
    /*
        Transferencia routes
    */

    Route::group(['prefix' => 'transferencia', 'middleware' => ['role:admin|owner|bodega']], function() {

        
        
        //Menu
        Route::get('/', 'TransferenciaCRUDController@menu');
        //Lista
        Route::get('/lista', 'TransferenciaCRUDController@index');


        Route::get('/agrupado', 'TransferenciaCRUDController@indexAgrupado');
        //Create
        Route::get('/agregar/{inventario}', 'TransferenciaCRUDController@create'); //Add form
        Route::post('/agregar/{inventario}', 'TransferenciaCRUDController@store'); //Post create
        
        
        //Update
        Route::get('/editar/{transferencia}', 'TransferenciaCRUDController@edit'); //Post del acción por checkbox
        Route::put('/editar/{transferencia}', 'TransferenciaCRUDController@update'); //Edit edit
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
