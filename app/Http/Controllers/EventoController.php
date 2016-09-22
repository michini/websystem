<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Compromiso;
use App\Evento;
use App\Filmador;
use App\Paquete;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Gate;
use Laracasts\Flash\Flash;

class EventoController extends Controller
{
    public function index(Request $request)
    {
        $eventos = Evento::lugar($request->get('lugar'))->orderBy('fecha','DESC')->paginate(16);
        return view('eventos.index',compact('eventos'));
    }

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

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        $paquetes = Paquete::select('tipo','id')->get();
        $compromisos = Compromiso::select('nombre','id')->get();
        $filmadores = Filmador::select('id','nombre')->get();
        return view('eventos.edit',compact('evento','paquetes','compromisos','filmadores'));
    }

    public function update(Request $request, $id)
    {
        $evento = Evento::findOrFail($id);
        $this->authorize('owner',$evento);
        $evento->paquete_id = $request->get('paquete');
        $evento->compromiso_id = $request->get('compromiso');
        $evento->filmadores()->detach();
        $evento->filmadores()->attach($request->get('filmadores'));
        $evento->update($request->all());
        Flash::success("Actualizacion correcta");
        return redirect()->route('admin.evento.show',$evento->id);
    }

    public function destroy($id)
    {
        if(\Entrust::hasRole('administrador')){
            $evento = Evento::findOrFail($id);
            $evento->delete();
        }
        else{
            abort(403);
        }
        return redirect()->route('admin.evento.index');
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
                "url"=>"http://localhost/proyectos/laravel/public/admin/evento/".$id[$i]
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

    public function filter(Request $request,$name){
        $eventos = Evento::where('compromiso_id',$request->get('id'))->paginate(16);

        return view('eventos.index',compact('eventos'));
    }

}
