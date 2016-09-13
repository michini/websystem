<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;

class ReporteController extends Controller
{
    public function index(){
        $meses = [['Enero',5],['Febrero',7],['Marzo',8],['Abril',20],['Mayo',12],['Junio',16],['Julio',25],['Agosto',30],['Septiembre',17],['Octubre',12],['Noviembre',8],['Diciembre',8]];
        $contratos = DB::table('contratos')
            ->select('fecha')
            ->where('fecha',Carbon::now()->format('m'))
            ->get();
        return view('reportes.chart',compact('meses'));
    }
}
