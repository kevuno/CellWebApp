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
                            4.- Modificar Transferencias solo suman o restan.


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
