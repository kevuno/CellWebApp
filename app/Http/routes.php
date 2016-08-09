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

    Route::group(['prefix' => 'admin', 'middleware' => ['role:admin|owner']], function() {
        Route::get('/', 'AdminController@welcome');
        Route::get('/manage', 'AdminController@seeUsers');
    });
    Route::get('/home', 'HomeController@index');

    /*
        Menu
    */
    Route::get('/menu', function () {
        return view('menu');
    });






});
