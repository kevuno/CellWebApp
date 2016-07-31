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
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
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
  Mostrar un vendedor en especifico
*/
Route::get('/vendedores/{vendedor}', function (App\Vendedor $vendedor) {
    return $vendedor;
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

Route::auth();

Route::get('/home', 'HomeController@index');
