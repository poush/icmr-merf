<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Institute;
use App\Http\Requests\User\CreateRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $auth_user = auth()->user();

        // $this->authorize( 'index', User::class);

        if ( $auth_user->role == 'super-admin' ) {
            $users = $user->getUsersPaginated(20);
        } else {            
            $users = $user->getInstituteSpecificUsersPaginated( $auth_user->institute_id, 20 );
        }

        return view('admin.users.index', compact( 'users') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($institute_id = NULL )
    {        
        // $this->authorize( 'create', User::class);

        if( $institute_id ) {
            $institute  = Institute::findOrFail( $institute_id );
            $institutes = NULL;
        }
        else { 
            $institute  = NULL;
            $institutes = Institute::pluck('name', 'id');
        }

        $roles = config('mapping.roles', []);

        if( auth()->user()->role == 'institute')
        {
            $roles = collect($roles)->filter(function( $v, $k)
                     {
                        return in_array($k, [ 'institute', 'editor'] );
                     })->all();
        }

        return view('admin.users.create', compact( 'institutes', 'institute', 'roles') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request, User $user)
    {
        $login_user = auth()->user();

        // if( in_array( $login_user->role, [ 'super-admin', 'institute' ] ) ) {
        //     $request->setOffset('institute_id', $login_user->institute_id );
        // }
        
        $user = $user->createUser( $request->except( '_token') );

        return redirect()->route('admin.users.edit', $user->id )
                    ->withMessage('User Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view( 'admin.users.show', compact( 'users') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $institutes = Institute::pluck('name', 'id');

        $roles = config('mapping.roles', []);
        if( auth()->user()->role == 'institute')
        {
            $roles = collect($roles)->filter(function( $v, $k)
                     {
                        return in_array($k, [ 'institute', 'editor'] );
                     })->all();
        }

        return view( 'admin.users.edit', compact( 'user', 'institutes', 'roles') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->updateUser( $request->except('_method', '_token') );

        return redirect()->route('admin.users.edit', $user->id )
                    ->withMessage('User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

    }
}
