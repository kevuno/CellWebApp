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
    //return view('/home');
}]);
Route::get('/permissions' ,  function () {


    //TODO create permissions and attach to roles


});

Route::auth();

Route::group(['middleware' => 'auth'], function (){


    Route::get('/home', 'HomeController@index');

    /*
      Mostrar un vendedor en especifico
    */


    Route::get('/vendedores/{vendedor}', function (Vendedor $vendedor) {
        echo $vendedor;
    });
    /*
      Mostrar la lista de vendedores
    */
    Route::get('/vendedores', function () {
        $vendedores = Vendedor::orderBy('created_at', 'asc')->get();
        return view('vendedores',[
          'vendedores' => $vendedores
        ]);
    });
    /*
      Agregar un vendedor
    */
    Route::post('/vendedores', function(Request $request){
        //
        $validator = Validator::make($request->all(), [
          'nombre' => 'required|max:200',
        ]);

        if ($validator->fails()) {
            return redirect('/vendedores')
                ->withInput()
                ->withErrors($validator);
        }
        $vendedor = new Vendedor;
        $vendedor -> nombre = $request -> nombre;
        $vendedor -> save();
        return redirect('/vendedores');


    });
    /*
      Eliminar un vendedor
    */
    Route::delete('/vendedores/{vendedor}', function(Vendedor $vendedor){
        $vendedor->delete();
        return redirect('/vendedores');

    });



});
