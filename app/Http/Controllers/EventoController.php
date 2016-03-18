<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Compromiso;
use App\Evento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $eventos = Evento::lugar($request->get('lugar'))->orderBy('fecha','DESC')->paginate(16);
        return view('eventos.index')->with('eventos',$eventos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $filmadores = DB::table('filmadors')
            ->select('id','nombre')
            ->get();
        $paquetes = DB::table('paquetes')
            ->select('id','tipo')
            ->get();
        $compromisos = DB::table('compromisos')
            ->select('id','nombre')
            ->get();

        return view('eventos.create',compact('filmadores','paquetes','compromisos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all());
        if($request->get('compromiso') == 'other'){
            $newcomp=Compromiso::create([
                'nombre'=>$request->get('comp')
            ]);

            $evento = new Evento();
            $evento->lugar = $request->get('lugar');
            $evento->fecha = $request->get('fecha');
            $evento->hora = $request->get('hora');
            $evento->descripcion = $request->get('descripcion');
            $evento->estado = $request->get('estado');
            $evento->compromiso_id = $newcomp->id;
            $evento->paquete_id = $request->get('paquete');
            $evento->save();
            $evento->filmadores()->attach($request->get('filmadores'));

            return redirect()->route('admin.contrato.create');

        }else{
            $evento = new Evento();
            $evento->lugar = $request->get('lugar');
            $evento->fecha = $request->get('fecha');
            $evento->hora = $request->get('hora');
            $evento->descripcion = $request->get('descripcion');
            $evento->estado = $request->get('estado');
            $evento->compromiso_id = $request->get('compromiso');
            $evento->paquete_id = $request->get('paquete');
            $evento->save();
            $evento->filmadores()->attach($request->get('filmadores'));

            return redirect()->route('admin.contrato.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = array();
        $evento = Evento::findorFail($id);
        $filmadores = DB::table('filmadors')
            ->select('id','nombre')
            ->get();
        foreach($evento->contrato->pagos as $pago){
            $data[]=$pago->id;
        }

        return view('eventos.show',compact('evento','filmadores','data'));
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

    public function api(){

        $data = array();
        $id = Evento::all()->lists('id');
        $lugar = Evento::all()->lists('lugar');
        $fecha = Evento::all()->lists('fecha');
        $desc = Evento::all()->lists('descripcion');
        $count = count($id);

        for($i=0;$i<$count;$i++){
            $data[$i] = array(
                "title"=>$lugar[$i],
                "start"=>$fecha[$i],
                "description"=>$desc[$i],
                "url"=>"http://localhost/laravel/public/admin/evento/".$id[$i]
            );
        }

        return response()->json($data);
    }

    public function conFilmador(){

        $eventos = Evento::whereIn('id',function($query){
                $query->select('evento_id')
                ->from('evento_filmador');
        })->orderBy('fecha','DESC')->paginate(16);

        //$eventos = DB::select("select * from eventos WHERE id not in (SELECT evento_id from evento_filmador) ORDER BY id");
        return view('eventos.index',compact('eventos'));
    }

    public function sinFilmador(){

        $eventos = Evento::whereNotIn('id',function($query){
            $query->select('evento_id')
                ->from('evento_filmador');
        })->orderBy('fecha','DESC')->paginate(16);

        return view('eventos.index',compact('eventos'));
    }

    public function actualizarFilmador(Request $request){
        $evento = Evento::findOrFail($request->get('id'));
        $evento->filmadores()->attach($request->get('filmadores'));
        return redirect()->back();
    }

    public function clientes(Request $request){
        $valor=0;
        $cliente = $request->get('cliente');
        $id_cliente = DB::select("select id from clientes WHERE concat(nombre, ' ' ,apellido) LIKE ?",['%'.$cliente.'%']);
        foreach($id_cliente as $id){
            $valor = $id->id;
        }

        $eventos = DB::table('clientes')
            ->join('contratos','clientes.id','=','contratos.cliente_id')
            ->join('eventos','eventos.id','=','contratos.evento_id')
            ->select('cliente_id','clientes.nombre','eventos.lugar','eventos.id','eventos.fecha','eventos.hora','eventos.descripcion','eventos.estado')
            ->where('cliente_id',$valor)
            ->orderBy('eventos.fecha','ASC')
            ->paginate(5);

        return view('eventos.index',compact('eventos'));

    }

    public function eventoProximo(){
        $eventos=Evento::where('fecha','>',Carbon::now()->format('Y-m-d'))->paginate(16);
        return view('eventos.index',compact('eventos'));
    }

    public function eventoPasado(){
        $eventos=Evento::where('fecha','<',Carbon::now()->format('Y-m-d'))->paginate(16);
        return view('eventos.index',compact('eventos'));
    }

    public function eventoHoy(){
        $eventos=Evento::where('fecha','=',Carbon::now()->format('Y-m-d'))->paginate(16);
        return view('eventos.index',compact('eventos'));
    }
}
