<?php

namespace App\Policies;

use App\User;
use App\Equipment;
use Illuminate\Auth\Access\HandlesAuthorization;

class Equipment
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the equipment.
     *
     * @param  \App\User  $user
     * @param  \App\Equipment  $equipment
     * @return mixed
     */
    public function view(User $user, Equipment $equipment)
    {
        return in_array($user->role, [ 'super-admin', 'institute', 'editor' ] );
    }

    /**
     * Determine whether the user can create equipment.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array($user->role, [ 'super-admin', 'institute', 'editor' ] ); 
    }

    /**
     * Determine whether the user can update the equipment.
     *
     * @param  \App\User  $user
     * @param  \App\Equipment  $equipment
     * @return mixed
     */
    public function update(User $user, Equipment $equipment)
    {
        return in_array($user->role, [ 'super-admin', 'institute', 'editor' ] );
    }

    /**
     * Determine whether the user can delete the equipment.
     *
     * @param  \App\User  $user
     * @param  \App\Equipment  $equipment
     * @return mixed
     */
    public function delete(User $user, Equipment $equipment)
    {
        return in_array($user->role, [ 'super-admin', 'institute' ] );
    }
}
