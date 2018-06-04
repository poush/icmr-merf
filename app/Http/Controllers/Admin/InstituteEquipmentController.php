<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Equipment;
use App\Category;
use App\Http\Requests\Equipment\CreateRequest;
use App\Http\Requests\Equipment\UpdateRequest;
use App\Http\Requests\Equipment\AddEquipmentRequest;
use App\Http\Requests\Equipment\UpdateEquipmentAvailabilityRequest;


class InstituteEquipmentController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipments = Equipment::select('name', 'manufacturer', 'model', 'id')->get();

        return view('admin.institutes.equipments.create', compact( 'equipments' ) );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddEquipmentRequest $request )
    {
        
        $equipment = Equipment::where('name', trim( $request->equipment_name ) )
                            ->where('manufacturer', trim( $request->equipment_manufacturer) )
                            ->where('model', trim( $request->equipment_model) )
                            ->first();

        $institute = auth()->user()->institute;

        if( $equipment)
        {
            $institute->addEquipment( $request->except('_token') + [ 'equipment_id' => $equipment->id ] );

            $message = 'Equipment Added Successfully';
        
        } else {

            $equipment = new Equipment;
            $equipment->name = $request->equipment_name;
            $equipment->manufacturer = $request->equipment_manufacturer;
            $equipment->model = $request->equipment_model;
            $equipment->institute_id = $institute->id ;

            $equipment->save();

            $institute->addEquipment( $request->except('_token') + [ 'equipment_id' => $equipment->id ] );

            $message = 'Equipment Created Successfully, Please update more information';
        }

        return redirect()->route('admin.institute-equipments.edit', $equipment->id )
                    ->withMessage($message);
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

        $equipments = Equipment::select('name', 'manufacturer', 'model', 'id')->get();

        $equipmentAvailability = $institute->equipmentAvailability()->where('equipment_id', $id)->get();

        $categories = Category::pluck( 'name', 'id');

        return view('admin.institutes.equipments.edit', compact( 'equipment', 'equipments', 'equipmentAvailability', 'categories' ) );
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
        $equipment = Equipment::findOrFail( $id );

        $institute = auth()->user()->institute;

        if( $equipment->institute_id == $institute->id )
        {
            $equipment->updateEquipment( $request->except( '_token', '_method') );
        }

        $institute->updateEquipment( $request->except('_token', '_method') + ['equipment_id' => $id ] );

        return redirect()->route('admin.institute-equipments.edit', $id )
                    ->withMessage('Institute Equipment Updated Successfully');
    }


    public function list(Request $request)
    {
        $equipments = Equipment::query();

        if( $request->name )
        {
            $equipments->where('name', 'like', request('name').'%');
        }
        
        if( $request->manufacturer )
        {
            $equipments->where('manufacturer', 'like', request('manufacturer').'%');
        }       
        
        if( $request->model_no )
        {
                
            $equipments->where('model', 'like', request('model_no').'%');
        }

        $equipments = $equipments->select([ 'id', 'name','model','manufacturer' ])->take(15)->get();

        return $equipments->toArray();
    }
}