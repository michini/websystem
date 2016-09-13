<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    protected $table = 'paquetes';
    protected $hidden = 'id';
    protected $fillable = ['tipo','precio','descripcion'];

    public function eventos(){
        return $this->hasMany('App\Evento');
    }
}
