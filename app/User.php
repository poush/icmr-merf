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
        $user = $this;

        if( $name = trim( request( 'name') ) ) {
            $user = $this->where('name', 'like', '%'.$name.'%');
        }

        if( $institute_name = trim( request( 'institute_name') ) ) {
            $user = $user->whereHas('institute', function( $q ) use( $institute_name ) {
                $q->where('name', 'like', '%'.$institute_name.'%');
            });
        }
        return $user->latest('created_at')->paginate( 20 ); 
    }

    public function getInstituteSpecificUsersPaginated( $institute_id, $page = 20 )
    {
        $user = $this;
        if( $name = trim( request( 'name') ) ) {
            $user = $this->where('name', 'like', '%'.$name.'%');
        }

        return $user->where('institute_id',  $institute_id )->latest('created_at')->paginate( 20 );
    }

    public function createUser($data)
    {
        $user_data = [

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt( $data['password']),
            'role'  => $data['role'],
            'institute_id' => isset($data['institute_id'] ) ? (int) $data['institute_id'] : auth()->user()->institute_id,
            'mobile'    => $data['mobile']
        ];

        return static::create( $user_data );
    }

    public function updateUser($data)
    {
        if( ! $data['password'] ) {
            unset( $data['password'] );
        } else {
            $data['password'] = bcrypt( $data['password'] );
        }
        return $this->update( $data );
    }

    public function isSuperAdmin()
    {
        return ( $this->role == 'super-admin' ) ? true : false;
    }

    public function isInstituteAdmin()
    {
        return ( $this->role == 'institute') ? true : false;
    }

    public function isInstituteEditor()
    {
        return ( $this->role == 'editor') ? true : false;
    }

    public function isNormalUser()
    {
        return ( $this->role == 'user' ) ? true : false;
    }

    public function institute()
    {
        return $this->belongsTo( Institute::class );
    }
}
