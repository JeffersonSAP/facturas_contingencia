@extends('layout/plantilla')

@section("tituloPagina", "Crear un nuevo registro")

@section('contenido')
<div class="card">
    <h5 class="card-header">Creando Factura  <p align="right"> @php echo session()->get('usuario'); echo date('d-m-'); @endphp</h5>
    <div class="card-body">
        <p class="card-text">
            <form action="{{ route('facturas.store') }}" method="POST">
                @csrf
                <label for="">Punto de venta</label>
                <input type="text" name="punto_de_venta" class="form-control" readonly="readonly" value="{{session()->get('pdv')}}" required>
                <label for="">Nombre Cliente</label>
                <input type="text" name="nombre" class="form-control" value="Consumidor Final" required>
                <label for="">Nit</label>
                <input type="text" name="nit" class="form-control" value="CF" required>
                <label for="">Direccion</label>
                <input type="text" name="direccion" class="form-control" value="Ciudad" required>
                <label for="">Telefono</label>
                <input type="text" name="telefono" class="form-control">
                <label for="">Correo</label>
                <input type="text" name="correo" class="form-control">
                <label for="">Vendedor</label>
                <input type="text" name="vendedor" class="form-control" required>
                <label for="">Fecha de factura </label>
                <input type="date" name="fecha"  class="form-control"value="{{date('Y-m-d');}}">
                <label for="">Nota</label>
                <input type="text" name="nota" class="form-control">
                <br>
                <a href="{{ route("facturas.index") }}" class="btn btn-info" >
                    <span class="fas fa-undo-alt"></span> Regresar
                </a>
                <button class="btn btn-primary">
                    <span class="fas fa-user-plus"></span> Crear Factura
                </button>
                <button class="btn btn-primary" name="prod"value="agregar_producto">
                    <span class="fas fa-user-plus"></span> Crear Factura y Agregar productos
                </button>
                
            </form>
        </p>
        
        </div>
</div><div></div>
@endsection


