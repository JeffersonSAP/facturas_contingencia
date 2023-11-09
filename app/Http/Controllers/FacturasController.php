<?php

namespace App\Http\Controllers;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Facturas;
use App\Models\Productos_vendidos;
use App\Models\punto_de_venta;
use Illuminate\Http\Request;

class FacturasController extends Controller
{
    public function index(Request $request)
    {
      //  echo $request;
        //echo session()->get('nota');
        $detalle_prod = punto_de_venta::where('correo','=',session()->get('pdv'));
        $admin='';
        $Busqueda=$request->get('Busqueda'); 
        session(['busq'=>$Busqueda]);  
        $Aplicado=$request->get('Aplicado');
        session(['apply'=>$Busqueda]);  
        $idb=$request->get('idb');
        session(['idb'=>$idb]);  
      if(session()->get('pdv')=='')
            {
                return redirect()->route("facturas.welcome")->with("success", "Se debe registrar");
            }
        if(session()->get('nota')=='admin')
        {
            $datos = Facturas::
            where(function($q){ 
                $q->where('nombre','like','%'.session()->get('busq').'%')
                ->orwhere('nit','like','%'. session()->get('busq') .'%')
                ->orwhere('direccion','like','%'. session()->get('busq') .'%')
                ->orwhere('telefono','like','%'. session()->get('busq') .'%')
                ->orwhere('vendedor','like','%'. session()->get('busq') .'%')
                ->orwhere('fecha','like','%'. session()->get('busq') .'%')
                ->orwhere('correo','like','%'. session()->get('busq') .'%');})
            ->where('Aplicado','like','%'.$Aplicado.'%')
            ->where('id','like','%'.$idb.'%')
            ->orderBy('id', 'desc')->paginate(30);
        }else
        {      $datos = Facturas::where('punto_de_venta','=',session()->get('pdv'))
            ->where(function($q){
                $q->where('nombre','like','%'.session()->get('busq').'%')
                ->orwhere('nit','like','%'. session()->get('busq') .'%')
                ->orwhere('direccion','like','%'. session()->get('busq') .'%')
                ->orwhere('telefono','like','%'. session()->get('busq') .'%')
                ->orwhere('vendedor','like','%'. session()->get('busq') .'%')
                ->orwhere('fecha','like','%'. session()->get('busq') .'%')
                ->orwhere('correo','like','%'. session()->get('busq') .'%');})
            ->where('Aplicado','like','%'.$Aplicado.'%')
            ->where('id','like','%'.$idb.'%')
            ->orderBy('id', 'desc')->paginate(30);
        }
        return view('inicio',compact('datos','Busqueda','Aplicado','detalle_prod','idb'));
  //return view('inicio');
    }

    public function create()
    { if(session()->get('pdv')=='')
        {
            return redirect()->route("facturas.welcome")->with("success", "Se debe registrar");
        }
        return view('agregar');
        //return "agregar";
    }

  public function store(Request $request)
    {//echo $request->prod;
    //sirve para guardar datos en la bd
    if(session()->get('pdv')=='')
    {
        return redirect()->route("facturas.welcome")->with("success", "Se debe registrar");
    }
    $facturas = new Facturas();
    $facturas->punto_de_venta = $request->post('punto_de_venta');
    $facturas->nombre = $request->post('nombre');
    $facturas->nit = $request->post('nit');
    $facturas->direccion = $request->post('direccion');
    $facturas->telefono = $request->post('telefono');
    $facturas->correo = $request->post('correo');
    $facturas->vendedor = $request->post('vendedor');
    $facturas->nota = $request->post('nota');
    $facturas->fecha = $request->post('fecha');
    $facturas->archivado =0;
    $facturas->aplicado ='No';
    //$id_grab=$facturas->save();
         $facturas->save();
               if($request->prod=='agregar_producto')
                {return redirect()->route("facturas.edit",$facturas->id)->with("success", "Agregado con exito!",);

                }else{
                    return redirect()->route("facturas.index")->with("success", "Agregado con exito!");
                }
   // return redirect()->route("facturas.index")->with("success", "Agregado con exito!");
    }

    public function show( $id)
    {        
     //funcion para marcar de aplicado como Si
        $facturas = Facturas::find($id);
       // dd($facturas);
        $facturas->aplicado ='Si';
        $facturas->save();

        return redirect()->route("facturas.index")->with("success", "Marcado como Aplicado con exito!");
    }

    public function edit( $id)
    {if(session()->get('pdv')=='')
        {
            return redirect()->route("facturas.welcome")->with("success", "Se debe registrar");
        }
        //este metodo nos sirve para traer los datos que se van a editar
        //y los coloca en un formulario
        //echo $id;
        $facturas = Facturas::find($id);
        $detalle_prod = Productos_vendidos::where('id_factura','=',$id)->orderBy('id', 'desc')->paginate(50);
        return view("actualizar" , compact('facturas'),compact('detalle_prod'));
        
    }

    public function update(Request $request, $id)
    {if(session()->get('pdv')=='')
        {
            return redirect()->route("facturas.welcome")->with("success", "Se debe registrar");
        }
        //este metodo actualiza los datos en la bd
        if($request->imprimir=='imprimir')
        {
                            /*   $facturas_en = Facturas::where('id','=',$id);
                                $detalle_prod = Productos_vendidos::where('id_factura','=',$id)->orderBy('id', 'asc');
                            dd($facturas_en);
                                $pdf=Pdf::loadView('pdf.pdf',compact('facturas_en'));
                            //   $pdf=Pdf::setPaper(array(0,0,1180,600))->loadView('pdf.pdf',['factura'=>$facturas_en,'detalle'=>$detalle_prod]);
                                //Pdf::setOption(['dpi' => 150, 'defaultFont' => 'arial']);
                                return $pdf->stream();
                                //return $pdf->download();
                                return redirect()->route("facturas.edit",$id)->with("success", "Ticket Impreso", $pdf->download());*/
                            // $enc = punto_de_venta::where('correo','=',session()->get('pdv'));
            $enc = punto_de_venta::where('correo',session()->get('pdv'))->first();

            $facturas = Facturas::find($id);
            $detalle_prod = Productos_vendidos::where('id_factura','=',$id)->orderBy('id', 'asc')->paginate(500);
            $pdf=Pdf::setPaper(array(25,-15,238,600))->loadView('pdf.pdf',['facturas'=>$facturas,'detalle_prod'=>$detalle_prod,'enc'=>$enc]);
           // dd($enc);
      return $pdf->download();
           // return view("actualizar" , compact('facturas'),compact('detalle_prod'));
        }else{
                $facturas = Facturas::find($id);
                $facturas->punto_de_venta = $request->post('punto_de_venta');
                $facturas->nombre = $request->post('nombre');
                $facturas->nit = $request->post('nit');
                $facturas->direccion = $request->post('direccion');
                $facturas->telefono = $request->post('telefono');
                $facturas->correo = $request->post('correo');
                $facturas->vendedor = $request->post('vendedor');
                $facturas->nota = $request->post('nota');
                $facturas->fecha = $request->post('fecha');
                $facturas->aplicado = $request->post('aplicado');
                                $facturas->save();

        return redirect()->route("facturas.index")->with("success", "Actualizado con exito!");}
    }
    public function update_prod(Request $request, $id)
    {if(session()->get('pdv')=='')
        {
            return redirect()->route("facturas.welcome")->with("success", "Se debe registrar");
        }
     //   echo $request;
        //este metodo actualiza los datos en la bd
        $producto = new Productos_vendidos();
        $producto->id_factura = $request->post('id_factura');
        $producto->codigo_producto = $request->post('codigo_producto');
        $producto->cantidad = $request->post('cantidad');
        $producto->serie = $request->post('serie');
        $producto->nombre_producto = $request->post('nombre_producto');
        $producto->precio_unitario = $request->post('precio_unitario');
        $producto->total = $request->post('total');
        $producto->nota = $request->post('nota');
         $producto->save();

                        if($request->agre_prod=='guarda_producto')
                        {return redirect()->route("facturas.edit",$request->post('id_factura'))->with("success", "Agregado con exito!",);
                        
                        }else{
                            return redirect()->route("facturas.index")->with("success", "Agregado con exito!");
                        }
                    //return redirect()->route("facturas.edit",$facturas->id)->with("success", "Agregado con exito!",);
   //  return redirect()->route("facturas.edit")->with("success", "Actualizado con exito!");
    }
    public function eliminaDet($id)
    {if(session()->get('pdv')=='')
        {
            return redirect()->route("facturas.welcome")->with("success", "Se debe registrar");
        }
      $producto=  Productos_vendidos::find($id);
      $fc_original=$producto->id_factura;
      //dd($producto->id_factura);
      $producto->delete();

   return redirect()->route("facturas.edit",$fc_original)->with("success", "Eliminado con exito!",);
        //$request->post('id_factura');
//        return view('inicio');  //
    }
    public function destroy(Facturas $facturas)
    {
        //
        return view('inicio');  //
    }
    public function logout(Request $request)
    {
         session(['pdv'=>null]);  
        return redirect()->route("facturas.welcome")->with("success", "Sesion cerrada correctamente");

    }
    public function welcome(Request $request)
    {
        $punto=$request->GET('punto_name');
         $detalle_prod = punto_de_venta::where('correo',$punto)->first();
         if($request->acceder=='env')
         {     
        if ($detalle_prod == null)
        {
            session(['pdv'=>null]);  
            return redirect()->route("facturas.welcome")->with("success", "Acceso incorrecto");
        }
        else{//dd($detalle_prod->nombre_odoo);
            session(['pdv'=>$punto]); 
            session(['usuario'=>$detalle_prod->nombre_odoo]);
            session(['nota'=>$detalle_prod->nota]);
            session(['busq'=>'']);  
            session(['apply'=>'']);  
            return redirect()->route("facturas.index")->with("success", "Acceso Exitoso!");
        }
     }    return view('welcome');       
    }
}
