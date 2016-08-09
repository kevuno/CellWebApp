<?php
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
