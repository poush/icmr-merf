<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Equipment;
use App\Http\Requests\Equipment\CreateRequest;
use App\Http\Requests\Equipment\UpdateRequest;

class InstituteEquipmentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipments = Equipment::pluck('name', 'id');

        return view('admin.institutes.equipments.create', compact( 'equipments' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request )
    {
        
        $institute = auth()->user()->institute ;

        $institute->addEquipment( $request->except('_token') );

        return redirect()->route('admin.institute-equipments.edit', $request->equipment_id )
                    ->withMessage('Equipment Added Successfully');
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
        return view('admin.institutes.equipments.show', compact( 'equipment') );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institute = auth()->user()->institute;

        $equipment = $institute->equipments()->where('equipment_id', $id)->first();

        $equipments = Equipment::pluck( 'name', 'id');

        $equipmentAvailability = $institute->equipmentAvailability()->where('equipment_id', $id)->get();

        return view('admin.institutes.equipments.edit', compact( 'equipment', 'equipments', 'equipmentAvailability' ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        $institute = auth()->user()->institute;

        $institute->updateEquipment( $request->except('_token', '_method') + ['equipment_id' => $id ] );

        return redirect()->route('admin.institute-equipments.edit', $id )
                    ->withMessage('Institute Equipment Updated Successfully');
        ;
    }
}