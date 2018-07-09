<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Equipment;
use App\Category;
use App\EquipmentAvailability;
use App\Booking;
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
     * To delete/merge an equipment and its associated content into another equipment.
     * 
     * @param  int $id 
     * 
     * @return redirect()
     */
    public function destroy( Request $request, $equipmentToBeMerged )
    {
        if( ! auth()->user()->isSuperAdmin() )
        {
            return abort('401', 'Unauthorized Request');
        }

        if( trim( $request->equipment_id ) == $equipmentToBeMerged->id )
        {
            return redirect()->back()->withMessage( 'Equipment Id cannot be same to the Merged Equipment Id');
        }

        if( !$request->equipment_id || !( $equipment = Equipment::find( $request->equipment_id ) ) ) 
        {
            return redirect()->back()->withMessage( 'Equipment Id is empty or Equipment not exists for this ID');
        }

        $institutes = $equipmentToBeMerged->institutes()->select('id')->get();

        $institutes_array = [];

        foreach( $institutes as $ins => $institute)
        {
            $institutes_array[ $institute->id ] = [ 'lab' => $institute->pivot_lab ];
        }

        \DB::transaction( function() use( $institutes_array, $equipmentToBeMerged, $request ) {

            // Updae Equipment Institutes.
            $equipmentToBeMerged->institutes()->syncWithoutDetaching( $institutes_array );
            
            // Update Equipment Availability.
            EquipmentAvailability::where('equipment_id', $equipmentToBeMerged->id )->update( [ 'equipment_id' => $request->equipment_id ] );

            // Update Equipment Booking Table.
            Booking::where('equipment_id', $equipmentToBeMerged->id )->update( [ 'equipment_id' => $request->equipment_id ] );

            // Delete Equipment Record
            $equipmentToBeMerged->delete();

        });

        return redirect()->back()->withMessage( 'Equipment merged Successfully' );
    }
}
