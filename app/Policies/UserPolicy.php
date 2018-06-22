<?php

namespace App\Policies;

use App\User as UserModel;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function index( UserModel $user)
    {
        return in_array($user->role, [ 'super-admin', 'institute' ] );
    }
    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\UserModel  $user
     * @param  \App\UserModel  $model
     * @return mixed
     */
    public function view(UserModel $user, UserModel $model)
    {

        return in_array($user->role, [ 'super-admin', 'institute' ] );
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\UserModel  $user
     * @return mixed
     */
    public function create(UserModel $user, $model)
    {
        switch ( $user->role) {
            case 'super-admin':
                return true;
                break;
            case 'institute':
                return ( $institute_id && ( $user->institute_id == $institute_id ) ) ? true : false;
                break;
            default:
                return false;
                break;
        }

        return false;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\UserModel  $user
     * @param  \App\UserModel  $model
     * @return mixed
     */
    public function update(UserModel $user, UserModel $model)
    {
        return in_array($user->role, [ 'super-admin', 'institute' ] );
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\UserModel  $user
     * @param  \App\UserModel  $model
     * @return mixed
     */
    public function delete(UserModel $user, UserModel $model)
    {
        return in_array($user->role, [ 'super-admin', 'institute' ] );
    }
}
