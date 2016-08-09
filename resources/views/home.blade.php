@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <h2> Sesión iniciadas</h2>
                    <p>
                    <h3>Noticias:</h3>
                    <br>
                    -------
                    </p>
                    <a href="{{ url('/menu') }}"><button type="button" class="btn btn-default">Acceder al menú</button></a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
