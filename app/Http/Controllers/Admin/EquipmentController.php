<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Equipment;
use App\Category;
use App\Http\Requests\Equipment\CreateRequest;
use App\Http\Requests\Equipment\UpdateRequest;

class EquipmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Equipment $equipment)
    {
        if( auth()->user()->role != 'super-admin')
        {
            $equipment = auth()->user()->institute->equipments();
        }

        if( $name = trim( request( 'name') ) ) {
            $equipment = $equipment->where('name', 'like', '%'.$name.'%');
        }

        if( $institute_name = trim( request( 'institute_name') ) ) {
            $equipment = $equipment->whereHas('institute', function( $q ) use( $institute_name ) {
                $q->where('name', 'like', '%'.$institute_name.'%');
            });
        }

        $equipments = $equipment->with('institute')->paginate( 20 );

        return view('admin.equipments.index', compact( 'equipments') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck( 'name', 'id');
        return view('admin.equipments.create', compact( 'categories') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request, Equipment $equipment)
    {
        $equipment = $equipment->createEquipment( $request->except('_token') );

        return redirect()->route('admin.equipments.edit', $equipment->id)
                    ->withMessage('Equipment Created Successfully');
        ;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        return view('admin.equipments.show', compact( 'equipment') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        $categories = Category::pluck( 'name', 'id');

        return view('admin.equipments.edit', compact( 'equipment', 'categories') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, Equipment $equipment)
    {
        $equipment->updateEquipment( $request->except('_token', '_method') );

        return redirect()->route('admin.equipments.edit', $equipment->id )
                    ->withMessage('Equipment Updated Successfully');
        ;
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
