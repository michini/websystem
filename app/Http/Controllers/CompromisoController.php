<?php

namespace App\Http\Controllers;

use App\Compromiso;
use Illuminate\Http\Request;
use App\Http\Requests\CompromisoRequest;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;

class CompromisoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compromisos  = Compromiso::all();
        return view('compromisos.index',compact('compromisos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compromisos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $msg = [
            'nombre.required'=>'El campo nombre es obligatorio',
            'descripcion.required'=>'El campo descripcion es obligatorio',
            'nombre.unique'=>'Este nombre de evento ya existe'
        ];

        $v = Validator::make($request->all(),[
            'nombre'=>'required|unique:compromisos',
            'descripcion'=>'required'
        ],$msg);

        if ($v->fails()){
            return response()->json(['errors'=>$v->errors()]);
        }

        $compromiso = new Compromiso();
        $compromiso->nombre = $request->get('nombre');
        $compromiso->descripcion = $request->get('descripcion');
        $compromiso->save();

        return response()->json(['mensaje'=>'Compromiso '. $compromiso->nombre .' creado..!!']);

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
        //
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
}
