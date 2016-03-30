<?php

namespace App;

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    protected $table = 'role';
    protected $hidden ='id';
    protected $fillable = ['name','display_name','description'];

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
