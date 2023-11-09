@extends('layout/plantilla')

@section('tituloPagina', 'Facturas')

@section('contenido')

<div class="card">
<h5 class="card-header"><h align="left">    Facturas Contingencia  <p align="right"> @php echo session()->get('usuario'); @endphp
<a href="{{ route("facturas.logout") }}" class="dropdown-item" >
                <span class="fas fa-user"></span> Salir
            </a>
</h5>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12">
                @if ($mensaje = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $mensaje }}
                    </div>
                @endif

                
            </div>
        </div>
        <h5 class="card-title text-center">Listado de Facturas Generadas</h5>
        <p>
        
    <form class="form-inline">
    <div class="container">  <div class="row"> 
            <div class="col-3">
                <a href="{{ route("facturas.create") }}" class="btn btn-primary">
                    <span class="fas fa-user-plus"></span> Agregar nueva factura
                </a>
            </div>  

            <div class="col-3">
                    <input class="form-control mr-sm-2" type="search" placeholder="Busqueda" aria-label="Busqueda" name='Busqueda' value="{{$Busqueda}}">
            </div>
            <div class="col-2">
                    <input class="form-control mr-sm-2" type="list" placeholder="Aplicado"name='Aplicado' value="{{$Aplicado}}" aria-label="Aplicado">
                    </div>
            <div class="col-1">
                    <input class="form-control mr-sm-2" type="list" placeholder="Id"name='idb' value="{{$idb}}" aria-label="idb" width=50%>
                    </div>
            <div class="col-2">
                    <button class="btn btn-outline-success my-2 my-sm-0 float-right" type="submit">Buscar</button>
        </div></div>
    </form>
      </p>
        @foreach ($detalle_prod as $item)
            <td>{{ $item->id }}</td>
            @endforeach
        <hr>
        <p class="card-text">
            <div class="table table-responsive">
                <table class="table table-sm table-bordered">
                    <thead>
                        <th>Punto de Venta</th>
                        <th>Cliente</th>
                        <th>Nit</th>
                        <th>Telefono</th>
                        <th>Correo</th>
                        <th>Fecha</th>
                        <th>Aplicado</th>
                        <th>Id</th>
                        <th>Detalle</th>
                        <th>Aplicado</th>
                        
                    </thead>
                    <tbody>  
                    @foreach ($datos as $item)
                        <tr>
                            <td>{{ $item->punto_de_venta }}</td>
                            <td>{{ $item->nombre }}</td>
                            <td>{{ $item->nit }}</td>
                            <td>{{ $item->telefono }}</td>
                            <td>{{ $item->correo }}</td>
                            <td>{{ $item->fecha }}</td>
                            <td>{{ $item->aplicado }}</td>
                            <td>{{ $item->id }}</td>
                            <td>
                                <form action="{{ route("facturas.edit", $item->id) }}" method="GET">
                                    <button  class="btn btn-outline-danger btn-sm">
                                        <span class="fad fa-tasks fa-lg" style="--fa-primary-color: #38d123; --fa-secondary-color: #0008ff;"></span>
                                    </button>
                                </form>
                            </td>
                            <td>
                            <form action="{{ route("facturas.show", $item->id) }}" method="GET">
                                    <button class="btn btn-outline-success btn-sm">
                                        <span class="fad fa-sign-in fa-lg" style="--fa-primary-color: #4d66cb; --fa-secondary-color: #89d624;"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <hr>
             </div>
    <div class="row">
                <div class="col-sm-12">
                    {{ $datos->links() }}
                </div>

            </div>
        </p>
    </div>
</div>
@endsection 