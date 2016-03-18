<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Evento extends Model
{
    protected $table = 'eventos';
    protected $hidden = 'id';
    protected $fillable = ['lugar','hora','fecha','estado','descripcion','paquete_id','compromiso_id'];

    public function filmadores(){
        return $this->belongsToMany('App\Filmador');
    }

    public function paquete(){
        return $this->belongsTo('App\Paquete');
    }

    public function compromiso(){
        return $this->belongsTo('App\Compromiso');
    }

    public function contrato(){
        return $this->hasOne('App\Contrato');
    }

    public function getFechaFormatAttribute(){
        return date('l jS F Y',strtotime($this->fecha));
    }

    public function scopeLugar($query, $lugar){
        $query->where('lugar','LIKE','%'.$lugar.'%');
    }


}
