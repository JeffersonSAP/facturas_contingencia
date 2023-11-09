@extends('layout/plantilla')

@section("tituloPagina", "Factura")

@section('contenido')

    <h5 class="card-header">Editando factura - Agregando productos <p align="right"> @php echo session()->get('usuario'); @endphp</h5>

<div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if ($mensaje = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $mensaje }}
                    </div>
                @endif

                
            </div>
        </div>
        <p class="card-text">
         
        <form action="{{ route('facturas.update', $facturas->id) }}" method="POST">
                @csrf
                @method("PUT")
                
            <div class="row">
                <div class="card-body w-25">
                    <label for="">Punto de venta</label>
                    <input type="text" name="punto_de_venta" class="form-control"readonly="readonly" required value="{{$facturas->punto_de_venta}}">
                    <label for="">Nombre Cliente</label>
                    <input type="text" name="nombre" class="form-control" required value="{{$facturas->nombre}}">
                    <label for="">Nit</label>
                    <input type="text" name="nit" class="form-control" required value="{{$facturas->nit}}">
                </div>   
                <div class="card-body w-25">
                    <label for="">Direccion</label>
                    <input type="text" name="direccion" class="form-control" required value="{{$facturas->direccion}}">
                    <label for="">Telefono</label>
                    <input type="text" name="telefono" class="form-control" value="{{$facturas->telefono}}">
                    <label for="">Correo</label>
                    <input type="text" name="correo" class="form-control" value="{{$facturas->correo}}">
                </div> 
                <div class="card-body w-25">
                    <label for="">Vendedor</label>
                    <input type="text" name="vendedor" class="form-control" required value="{{$facturas->vendedor}}">
                    <label for="">Fecha de factura </label>
                    <input type="date" name="fecha" class="form-control" required value="{{$facturas->fecha}}">
                
                    <label for="">Nota</label>
                    <input type="text" name="nota" class="form-control"value="{{$facturas->nota}}">
                    </div> <div class="card-body w-25">
                    <label for="">Aplicado </label>
                    <select  name="aplicado" class="form-control"><option hidden value={{$facturas->aplicado}}>{{$facturas->aplicado}}</option><option value='Si'>Si</option><option value='No'>No</option> </select>
                    </div>  
            </div>
                <a href="{{ route("facturas.index") }}" class="btn btn-info" >
                    <span class="fas fa-undo-alt"></span> Regresar
                </a>
                <button class="btn btn-warning">
                    <span class="fas fa-user-edit"></span> Actualizar Factura
                </button>
                <button class="btn btn-primary "name="imprimir"value="imprimir">
                    <span class="fas fa-user-plus"></span> Imprimir Factura
                </button>
                
        </form>
    
        </p>
        
    
</div>
<div class="container">
    
    <form action="{{ route('facturas.update_prod', $facturas->id) }}" method="POST" id="formDetalle">
      @csrf
        @method("PUT")

            <div class="row">
                <div class="card-body w-25">
                        <label for="">Producto</label>
                        <input type="text" name="codigo_producto" class="form-control" required id="codigoProducto">
                        <label for="">Cantidad</label>
                        <input type="number" name="cantidad" class="form-control" required id="impCant" ">
                        <label for="">Serie</label>
                        <input type="text" name="serie" class="form-control" >
                        <button class="btn btn-primary"name="agre_prod"value="guarda_producto">
                    <span class="fas fa-user-plus"></span> Agregar Producto
                </button>
           
                </div> 
         
                <div class="card-body w-25">
                        <label for="">Nombre</label>
                        <input type="text" name="nombre_producto" required class="form-control">
                        <label for="">Nota</label>
                        <input type="text" name="nota" class="form-control"  >
                </div> 
                <div class="card-body w-25">
                <label for="">Precio Unitario</label>
                        <input type="number" step="0.01" name="precio_unitario" class="form-control" required id="impPUnit">
                        <label for="">Total</label>
                        <input type="number" step="0.01" name="total" class="form-control" required id="imputPrecioTotal"> 
                      <label for=""></label>
                        <input type="hidden" name="id_factura" class="form-control"value="{{$facturas->id}}">
                   
                </div> 
            </div> 
                                </form>
    </from>
</div>
    <div class="table table-responsive">     
    
                <table class="table table-sm table-bordered">
                    <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Serie</th>
                    <th>Cantidad</th>
                    <th>Precio Unitario</th>
                    <th>Total</th>
                    <th>Nota</th>
                    <th>Eliminar</th>
                    </thead>
                    <tbody>
                       
                    @foreach ($detalle_prod as $item2)
                        <tr>
                            <td>{{ $item2->codigo_producto }}</td>
                            <td>{{ $item2->Nombre_producto }}</td>
                            <td>{{ $item2->serie }}</td>
                            <td>{{ $item2->cantidad }}</td>
                            <td>{{ $item2->precio_unitario }}</td>
                            <td>{{ $item2->total }}</td>
                            
                            <td>{{ $item2->nota }}</td>
                            <td>
                            <form action="{{ route('facturas.eliminaDet', $item2->id) }}" method="GET">
                                    <button class="btn btn-danger btn-sm">
                                        <span class="fas fa-times"></span>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endforeach
                    </tbody>
                    <script type="text/javascript" src="{{ asset('/js/factura.js')}}"></script>
                </table>
                <hr>
                
            </div>
            @endsection


