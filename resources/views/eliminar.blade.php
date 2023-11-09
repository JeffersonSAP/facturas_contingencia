@extends('layout/plantilla')

@section("tituloPagina", "Archivando")

@section('contenido')
<div class="card">
    <h5 class="card-header">Archivar factura!</h5>
    <div class="card-body">
        
        <p class="card-text">
            <div class="alert alert-danger" role="alert">
                Estas seguro de archivar este registro!!!

                <table class="table table-sm table-hover table-bordered" style="background-color: white">
                    <thead>
                        <th>Punto de Venta</th>
                        <th>Cliente</th>
                        <th>Nit</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $datos->paterno }}</td>
                            <td>{{ $datos->materno }}</td>
                            <td>{{ $datos->nombre }}</td>
                            <td>{{ $datos->fecha_nacimiento }}</td> 
                        </tr>
                    </tbody>
                </table>
                <hr>
                <form action="{{ route('facturas.index', $datos->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <a href="{{ route("facturas.index") }}" class="btn btn-info" >
                        <span class="fas fa-undo-alt"></span> Regresar
                    </a>
                    <button class="btn btn-danger">
                        <span class="fas fa-user-times"></span> Archivar 
                    </button>
                </form>
            </div>
        </p>
        
    </div>
</div>
@endsection


