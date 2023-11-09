<!DOCTYPE html>

<html lang="en">

<head>
	<meta charset="utf-8"/>

	<title>ticket</title>
</head>  <div class="alert alert-success" role="alert">
test
                    </div>
<FONT FACE="TIMES" SIZE=2>

<table style="width:100%" >
<tr> <br><td WIDTH="170" ALIGN='left'>{{$enc->nombre_odoo}}</td></tr>
<tr> <br><td WIDTH="170" ALIGN='left'> DESTECO, S.A.</td></tr>
<tr> <br><td WIDTH="170" ALIGN='left'> NIT: 86116339</td></tr>
<tr> <br><td WIDTH="180" ALIGN='left'> {{$enc->direccion}}</td></tr>
<br>
<tr> <br><td WIDTH="170" ALIGN='left'>NIT : {{ $facturas->nit }}</td></tr>
<tr> <br><td WIDTH="170" ALIGN='left'>Cliente : {{ $facturas->nombre }}</td></tr>
<tr> <br><td WIDTH="170" ALIGN='left'>Direccion : {{ $facturas->direccion }}</td></tr>
<tr> <br><td WIDTH="170" ALIGN='left'>Esto no es Una factura es un comprobante de compra</td></tr>
<tr> <br><td WIDTH="170" ALIGN='left'>Recibo de compra #: {{ $facturas->id }}</td></tr>
<br>

<tr> <br><td WIDTH="170" ALIGN='left'>Fecha : {{ $facturas->fecha }}</td></tr>
<tr> <br><td WIDTH="170" ALIGN='left'>Vendedor : {{ $facturas->vendedor }}</td></tr>

<br>
</table>

<table style="width:100%" >
                    <thead>
                        <th WIDTH="123">Producto</th>
                        <th WIDTH="10">Cant</th>
                        <th WIDTH="20" ALIGN='center'>Total</th>
                    </thead>
                    <tbody>
                    {{ $tot_gen=0;}}
                       @php // echo $facturas; <p>{{ $empresa }}</p>
                       @endphp
                    @foreach ($detalle_prod as $item2)
                        <tr>
                        <td WIDTH="90">{{ $item2->Nombre_producto}} {{ $item2->serie}}</td>
                        <td WIDTH="10" ALIGN='center'>{{ $item2->cantidad}}</td>
                        {{$tot=(float)$item2->total}}
                        <td WIDTH="20" ALIGN='right'> {{number_format($tot,2)}}</td>
                        {{ $tot_gen+=$tot;}}
                        </tr>
                    @endforeach
                   
                    </tbody>
                </table>
                <table style="width:130%" >

<tr></tr> <br><th ALIGN='right' WIDTH="100">Total   Q {{ number_format($tot_gen,2) }}</th>
<tr> <br><td WIDTH="170" ALIGN='left'>: {{ $facturas->nota }}</td></tr>
</table>
<table><br>
<tr> <br><td WIDTH="170" ALIGN='left'></td></tr>
</table>
</font>

</html>