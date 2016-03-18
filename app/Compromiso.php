<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compromiso extends Model
{
    protected $table='compromisos';
    protected $hidden='id';
    protected $fillable = ['nombre','descripcion'];

    public function eventos(){
        return $this->hasMany('App\Evento');
    }
}
