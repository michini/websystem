<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';
    protected $hidden = 'id';
    protected $fillable = ['monto','estado','contrato_id'];

    public function contrato(){
        return $this->belongsTo('App\Contrato');
    }

}
