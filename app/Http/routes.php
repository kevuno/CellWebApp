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
        
        //Read
        Route::get('/', 'InventarioCRUDController@index');
        Route::get('/b/{bodega}', ['middleware' => ['role:admin|owner'], 'uses' => 'InventarioCRUDController@indexBodega']); //List of inventario from certain bodega
        Route::get('/agrupado', 'InventarioCRUDController@indexAgrupado');
        Route::get('/agrupado/b/{bodega}', ['middleware' => ['role:admin|owner'], 'uses' => 'InventarioCRUDController@indexAgrupadoBodega']); //List of inventario agrupado from certain bodega
        //Create
        Route::get('/agregar', 'InventarioCRUDController@create'); //Add form        
        Route::post('/agregar', 'InventarioCRUDController@store'); //Post create

        //Editar
        Route::get('/editar/{inventario}', 'InventarioCRUDController@edit'); //Post del acción por checkbox
        Route::put('/editar/{inventario}', 'InventarioCRUDController@update'); //Edit edit
    });
    /*
        Transferencia routes
    */

    Route::group(['prefix' => 'transferencia', 'middleware' => ['role:admin|owner|bodega']], function() {
        //Read
        Route::get('/', 'TransferenciaCRUDController@index');
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
