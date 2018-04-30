<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    protected $fillable = ['name', 'city', 'slug'];

    public function equipments()
    {
        return $this
            ->belongsToMany(Equipment::class, 'institute_equipment')
            ->withPivot(['lab']);
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function createInstitute($data)
    {
        $data['slug'] = str_slug($data['name']);

        return static::create($data);
    }

    public function updateInstitute($data)
    {
        return $this->update($data);
    }

    public function addEquipment( $data )
    {
        return $this->equipments()->syncWithoutDetaching( [ 
                                        $data['equipment_id'] => [ 'lab' => $data['lab' ] ] 
                                    ] );
    }

    public function updateEquipment( $data )
    {
        $update_equipment = $this->equipments()->syncWithoutDetaching( [ 
                                        $data['equipment_id'] => [ 'lab' => $data['lab' ] ] 
                                    ] );

        // Availability to be updated.
        foreach( $data['from_date_exist'] as $id => $from )
        {
            EquipmentAvailability::where( 'id', $id )->update([
                'from'      => date('Y-m-d H:i:s', strtotime( $from ) ),
                'to'      => date('Y-m-d H:i:s', strtotime( $data['to_date_exist'][ $id ] ) ),                
                'added_by'  => auth()->user()->id

            ]);
        }

        // Availability to be added.
        if( isset( $data['from'] ) && is_array( $data['from'] ) )
        {
            foreach( $data['from'] as $index => $from )
            {
                $this->equipmentAvailability()->create(  
                                                        [ 
                                                            'equipment_id' => $data['equipment_id'],
                                                            'from' => date('Y-m-d H:i:s', strtotime( $from )),
                                                            'to'      => date('Y-m-d H:i:s', strtotime( $data['to'][ $index ] ) ),                
                                                            'added_by'  => auth()->user()->id
                                                        ] );
            }
        }
    }

    public function equipmentAvailability()
    {
         return $this->hasMany(EquipmentAvailability::class);
    }
}
