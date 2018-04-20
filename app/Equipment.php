<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';

    public function institutes()
    {
        return $this
            ->belongsToMany(Institute::class, 'institute_equipment')
            ->withPivot(['lab']);
    }

    public function availability()
    {
        return $this->hasMany(EquipmentAvailability::class);
    }
}
