@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="centering text-center error-container">
                <div class="text-center">
                    <h2 class="without-margin"><span class="text-danger"><big>Sobrecarga</big></span></h2>
                    <h4 class="text-danger">Servidor sobrecargado... Intente otra vez en unos minutos.</h4>
                    <h4 class="text-danger">404</h4>
                </div>
                <hr>
                <ul class="pager">
                    <li><a href="/menu">← Atrás</a></li>
                    <li><a href="/">Página principal</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
