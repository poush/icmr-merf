<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentAvailability extends Model
{
    protected $table = 'equipment_availability';

    protected $fillable = [ 'institute_id', 'equipment_id', 'from', 'to', 'added_by', 'availability_type_id'];
    
    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function institute()
    {
    	return $this->belongsTo(Institute::class);
    }
}
