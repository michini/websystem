<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Filmador extends Model
{
    protected $table = 'filmadors';
    protected $hidden = 'id';
    protected $fillable = ['nombre','apellido','celular','direccion'];

    public function eventos(){
        return $this->belongsToMany('App\Evento');
    }
}
