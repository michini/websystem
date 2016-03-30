<?php

namespace App\Http\Controllers;

use App\Pago;
use Illuminate\Http\Request;
use App\Compromiso;
use App\Contrato;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pagos = Pago::all();
        return view('pagos.index',compact('pagos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $contrato = Contrato::all();
        $ultimo_contrato = $contrato->last();
        return view('pagos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pago = Pago::find($id);
        return view('pagos.edit',compact('pago'));
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
        $pago = Pago::findOrFail($id);
        $sumado = $pago->monto + $request->get('monto');
        $v=Validator::make($request->all(),[
            'estado'=>'required',
            'monto'=>'required'
        ]);
        if($v->fails()){
            return redirect()->back()->withErrors($v->errors());
        }
        $pago->monto = $sumado;
        $pago->estado = $request->get('estado');
        $pago->save();

        return redirect()->route('admin.evento.show',$pago->contrato->evento->id);
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
}
