<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contrato extends Model
{
    protected $table = 'contratos';
    protected $hidden = 'id';
    protected $fillable = ['fecha','evento_id','user_id','cliente_id'];

    public function cliente(){
        return $this->belongsTo('App\Cliente');
    }

    public function evento(){
        return $this->belongsTo('App\Evento');
    }

    public function pagos(){
        return $this->hasMany('App\Pago');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function getFechaFormatAttribute(){
        return date('l jS F Y',strtotime($this->fecha));
    }

}
