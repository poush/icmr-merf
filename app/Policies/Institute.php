<?php

namespace App\Policies;

use App\User;
use App\Institute;
use Illuminate\Auth\Access\HandlesAuthorization;

class Institute
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the institute.
     *
     * @param  \App\User  $user
     * @param  \App\Institute  $institute
     * @return mixed
     */
    public function view(User $user, Institute $institute)
    {
        switch ($user->role) {
            case 'super-admin':
                return true;
                break;
            case 'institute':
                return ( $user->institute_id == $institute->id) ? true : false;
            default:
                return false;
                break;
        }

        return false;
    }

    /**
     * Determine whether the user can create institutes.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return in_array($user->role, [ 'super-admin' ] );
    }

    /**
     * Determine whether the user can update the institute.
     *
     * @param  \App\User  $user
     * @param  \App\Institute  $institute
     * @return mixed
     */
    public function update(User $user, Institute $institute)
    {
        switch ($user->role) {
            case 'super-admin':
                return true;
                break;
            case 'institute':
                return ( $user->institute_id == $institute->id) ? true : false;
            default:
                return false;
                break;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the institute.
     *
     * @param  \App\User  $user
     * @param  \App\Institute  $institute
     * @return mixed
     */
    public function delete(User $user, Institute $institute)
    {
        return in_array($user->role, [ 'super-admin' ] );
    }
}
