@extends('layout/plantilla')

@section('tituloPagina', 'Facturas')

@section('contenido')

<div class="card">
    <h5 class="card-header">Facturas Contingencia</h5>
    @php //echo session()->get('pdv'); 
     @endphp
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                @if ($mensaje = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $mensaje }}
                    </div>
                @endif
            </div>
            @php 
//printf($detalle_prod);
@endphp
            <form  method="GET" >
        <h5 class="card-title text-center">Ingreso a sistema</h5>
        <p>
        @csrf
                <label for="">Punto de venta</label>
                <input type="text" name="punto_name" class="form-control" required>
</p> <p>
        <button class="btn btn-primary" name="acceder"value="env">
                    <span class="fas fa-plus"></span> Acceder
                </button>
      </p>
</from>
        <hr>
      </div>
</div>

@endsection 