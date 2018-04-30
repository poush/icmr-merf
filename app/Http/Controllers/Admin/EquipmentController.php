<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Equipment;
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
        if( auth()->user()->role == 'super-admin')
        {
            $equipments = $equipment->paginate( 20 );

        } else {

            $equipments = auth()->user()->institute->equipments()->paginate( 20 );
        }

        return view('admin.equipments.index', compact( 'equipments') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipments.create');
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
        return view('admin.equipments.edit', compact( 'equipment') );
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
