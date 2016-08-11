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
        Route::get('/', 'InventarioCRUDController@index');
        Route::get('/b/{bodega}', ['middleware' => ['role:admin|owner'], 'uses' => 'InventarioCRUDController@indexBodega']); //List of inventario from certain bodeg
        Route::get('/agrupado', 'InventarioCRUDController@indexAgrupado');

        Route::get('/agregar', 'InventarioCRUDController@agregar'); //Add form

        Route::post('/agregar', 'InventarioCRUDController@agregarPost'); //Post create
        Route::post('/indexPost', 'InventarioCRUDController@agregar'); //Post del acción por checkbox
        Route::post('/editar', 'InventarioCRUDController@agregar'); //Edit edit
    });
    /*
        Transferencia routes
    */

    Route::group(['prefix' => 'transferencias', 'middleware' => ['role:admin|owner|bodega']], function() {
        Route::get('/', 'InventarioCRUDController@index');
        Route::get('/agrupado', 'InventarioCRUDController@indexAgrupado');
        Route::get('/agregar', 'InventarioCRUDController@agregar'); //Add form
        Route::post('/agregarPost', 'InventarioCRUDController@agregarPost'); //Post create
        Route::post('/indexPost', 'InventarioCRUDController@agregar'); //Post del acción por checkbox
        Route::post('/editar', 'InventarioCRUDController@agregar'); //Edit edit
    });


    Route::get('/home', 'HomeController@index');

    /*
        Menu
    */
    Route::get('/menu', function () {
        return view('menu');
    });





});
