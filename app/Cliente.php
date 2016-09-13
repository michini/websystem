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

    public function scopeNombre($query,$nombre){

        return $query->where('nombre','LIKE','%'.$nombre.'%');
    }

    public function getCreatedAttribute(){
        return date('d-m-Y',strtotime($this->created_at));
    }
}
