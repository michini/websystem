<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{
    protected $table = 'permission';
    protected $hidden ='id';
    protected $fillable = ['name','display_name','description'];
}
