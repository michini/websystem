<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = "clientes";
    protected $hidden = "id";
    protected $fillable = ['nombre','apellido','celular','direccion','familia'];

    public function getFullNameAttribute(){
        return $this->nombre . ' ' . $this->apellido;
    }

    public function contratos(){
        return $this->hasMany('App\Contrato');
    }

}
