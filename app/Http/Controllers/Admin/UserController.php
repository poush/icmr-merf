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

        if ( $auth_user->role == 'admin' ) {
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
    public function create()
    {
        $institutes = Institute::pluck('name', 'id');
        return view('admin.users.create', compact( 'institutes') );
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
        $user = $user->createUser( $request->except( '_token') );

        return redirect()->route('admin.users.edit', $user->id );
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

        return view( 'admin.users.edit', compact( 'user', 'institutes') );
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

        return redirect()->route('admin.users.edit', $user->id );
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
