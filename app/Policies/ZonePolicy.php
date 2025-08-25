<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Zone;

class ZonePolicy
{
    /**
     * Qualquer utilizador autenticado pode ver zonas da sua conta.
     */
    public function view(User $user, Zone $zone)
    {
        return $zone->user_id === $user->id || $user->role === 'admin' || $user->role === 'super_admin';
    }

    /**
     * Apenas admins ou super_admins podem gerir zonas.
     */
    public function manage(User $user, ?Zone $zone = null)
    {
        return in_array($user->role, ['admin', 'super_admin']);
    }
}
