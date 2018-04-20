<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentAvailability extends Model
{
    protected $table = 'equipment_availability';

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }
}
