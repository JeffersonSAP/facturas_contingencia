@extends('layout/plantilla')

@section('tituloPagina', 'Crud con Laravel 8')

@section('contenido')

<div class="card">
    <h5 class="card-header">CRUD con laravel 8 y MySQL</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">   {{ print_r($datos); }}
                @if ($mensaje = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                     
                    </div>
                @endif

                
            </div>
        </div>
        <h5 class="card-title text-center">Listado de personas en el sistema</h5>
   
            </div>
        </p>
    </div>
</div>

@endsection 