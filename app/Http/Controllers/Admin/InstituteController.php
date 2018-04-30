<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Institute;
use App\Http\Requests\Institute\CreateRequest;
use App\Http\Requests\Institute\UpdateRequest;

class InstituteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Institute $institute)
    {
        $institutes = $institute->paginate(20);

        return view('admin.institutes.index', compact( 'institutes') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.institutes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request, Institute $institute)
    {
        $institute = $institute->createInstitute( $request->except('_token') );

        return redirect()->route( 'admin.institutes.edit', $institute->id)
                    ->withMessage('Institute Created Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Institute $institute)
    {
        return view('admin.institutes.show', compact( 'institute') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Institute $institute)
    {
        return view('admin.institutes.edit', compact( 'institute') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Institute $institute)
    {
        $institute->updateInstitute( $request->except('_token', '_method') );

        return redirect()->route('admin.institutes.edit', $institute->id )
                    ->withMessage('Institute Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
