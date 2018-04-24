<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role', 'mobile', 'institute_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getUsersPaginated( $page = 20 )
    {
        return $this->latest('created_at')->paginate( 20 ); 
    }

    public function getInstituteSpecificUsersPaginated( $institute_id, $page = 20 )
    {
        return $this->where('institute_id',  $institute_id )->latest('created_at')->paginate( 20 );
    }

    public function createUser($data)
    {
        $user_data = [

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt( $data['password']),
            'role'  => $data['role'],
            'institute_id' => in_array('institute_id', $data) ? $data['institute_id'] : NULL
        ];

        return static::create( $user_data );
    }

    public function updateUser($data)
    {
        if( ! $data['password'] ) {
            unset( $data['password'] );
        }
        return $this->update( $data );
    }
}
