@extends('layouts.app_background')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><h4> Sesión iniciada</h4></div>

                <div class="panel-body">
                    <div class="row">
                    <div class="col-lg-10">
                        <h2> Hola {{Auth::user()->name}} </h2>
                        
                        <p>
                            <h4>TODO:</h4>
                            <br>

                            <h3>B.01:</h3>
                            <i class="fa fa-check"></i>1.- Modificar el backend al agregar 1 equipo, multiples, y con csv. Para que funcione sin imei.
                            
                            <br>
                            <i class="fa fa-check"></i>2.- hacer que el usuario pueda poner el nombre de la bodega en el archivo .csv y no el id

                            <br>
                            <i class="fa fa-check"></i>3.- Mejorar validacion de la bodega en el .csv 
                            <br>
                            <i class="fa fa-check"></i>4.- Vista de transferencias completadas
                            <br>
                            5.- Vista de transferencias por aceptar
                            <br>
                            5.- Poder seleccionar una cantidad de equipos para transferir
                            <br> 
                            5.- Poder agregar mas de un tipo de equipos en la misma transferencia                                                  
                            <br>
                            6.- Back end de aceptar transferencia
                            <br>
                            6.- Agregar middleware para editar objectos del inventario solo si son de la bodega del usuario
                            <br>
                            7.- Crear una leyenda de que significan cada estatus
                            <br>                            


                            <br>
                            <h3>B.02:</h3>
                                -Vista para agregar bodegas<br>
                                -Implementar garantias <br>
                                -Logs<br>
                                -Modifical informacion de usuario<br>
                                -Admin panel<br>




    
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
