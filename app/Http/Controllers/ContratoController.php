<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Compromiso;
use App\Contrato;
use App\Pago;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Evento;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\View;
use Laracasts\Flash\Flash;

class ContratoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $contratos = Contrato::orderBy('id','DESC')->paginate(10);
        $pagos = Pago::all();

        return view('contratos.index',compact('contratos','pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $evento = Evento::all();
        $ultimo = $evento->last();
        $ultimo->paquete;
        $ultimo->compromiso;

        $data = array();
        $client = Cliente::all();
        foreach($client as $cliente){
            $data[]=$cliente->full_name;
        }
        $clientes1 = json_encode($data);

        return view('contratos.create',compact('ultimo','clientes1'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estado = $request->get('estado');
        $monto = $request->get('monto');

        $valor=0;
        $cliente = $request->input('cliente');
        $id_cliente = DB::select("select id from clientes WHERE concat(nombre, ' ' ,apellido) = ?",[$cliente]);
        foreach($id_cliente as $id){
            $valor = $id->id;
        }

        $contrato = new Contrato();
        $contrato->fecha = Carbon::now()->format('Y/m/d');
        $contrato->cliente_id = $valor;
        $contrato->evento_id = $request->get('id_evento');
        $contrato->user_id = Auth::user()->id;
        $contrato->save();

        $contract = Contrato::all();
        $ultimo_contrato = $contract->last();

        $pago = new Pago();
        $pago->monto = $monto;
        $pago->estado = $estado;
        $pago->contrato_id = $ultimo_contrato->id;
        $pago->save();

        Flash::success("Contrato creado correctamente");

        return redirect()->route('admin.contrato.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function contratoPdf(Request $request){
        $compromiso = Compromiso::all();
        $ultimo_evento = Evento::find($request->get('id_evento'));

        $compromisos = Compromiso::find($request->get('id_comp'));

        $ultimo_pago = Pago::find($request->get('id_pago'));

        $ultimo_contrato = Contrato::find($request->get('id_con'));

        $vista = View::make('contratos.contrato',compact('ultimo_evento','ultimo_contrato','compromisos','ultimo_pago','compromiso'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHtml($vista)->setPaper('a4');
        return $pdf->stream();
    }
}
