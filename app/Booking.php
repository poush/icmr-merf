<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
	protected $fillable = [ 'order_id', 'equipment_id', 'equipment_availabilty_id','equipment_availability_id', 'user_id', 'status' ];

    /**
     * Associated Equipments
     * 
     * @return Equipment::class
     */
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function equipmentAvailability()
    {
        return $this->belongsTo( EquipmentAvailability::class);
    }

    public function user()
    {
        return $this->belongsTo( User::class);
    }

}
