<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function owneraccount(User $user,$user1){

        return $user->id == $user1->id || $user->hasRole('administrador');
    }
}
