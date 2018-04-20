<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    public function equipments()
    {
        return $this
            ->belongsToMany(Equipment::class, 'institute_equipment')
            ->withPivot(['lab']);
    }
}
