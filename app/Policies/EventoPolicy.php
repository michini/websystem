<?php

namespace App\Policies;

use App\Evento;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class EventoPolicy
{
    use HandlesAuthorization;

    public function owner(User $user,Evento $evento){
        return $user->id == $evento->contrato->user_id || $user->hasRole('administrador');
    }
}
