@extends('layouts.app_background')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h4> Sesión iniciada</h4></div>

                <div class="panel-body">
                    <div class="row">
                    <div class="col-lg-6">
                        <h2> Hola {{Auth::user()->name}} </h2>
                        
                        <p>
                            <h4>TODO:</h4>
                            <br>
                            1.-Validar la primera fase de insertar multiples telefonos al inventario.
                            <br>
                            2.- hacer que el usuario pueda poner el nombre de la bodega en el archivo .csv y no el id

                            <br>
                            3.- Mejorar validacion de la bodega en el .csv 
    
                            -------
                        </p>
                        <a href="{{ url('/menu') }}"><button type="button" class="btn btn-default">Acceder al menú</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
