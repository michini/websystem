<?php

namespace App\Http\Controllers;

use App\Evento;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos_proximo=Evento::where('fecha','>',Carbon::now()->format('Y-m-d'))->count();
        $eventos_pasado=Evento::where('fecha','<',Carbon::now()->format('Y-m-d'))->count();
        $eventos_hoy=Evento::where('fecha','=',Carbon::now()->format('Y-m-d'))->count();
        $eventos_total=Evento::all()->count();
        $eventos = Evento::select('lugar','id','fecha')
            ->where('fecha','>=',Carbon::now())
            ->orderBy('fecha')
            ->limit(6)
            ->get();

        return view('home',compact('eventos','eventos_hoy','eventos_proximo','eventos_pasado','eventos_total'));
    }
}
