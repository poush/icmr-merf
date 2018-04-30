<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';

    protected $fillable = [ 'name', 'manufacturer', 'model', 'quantity', 'extra', 'features', 'working', 'operation', 'description', 'is_working', 'health_problems', 'training_requirement', 'machine_rest', 'location', 'specs' ];

    public function institutes()
    {
        return $this
            ->belongsToMany(Institute::class, 'institute_equipment')
            ->withPivot(['lab']);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function availability()
    {
        return $this->hasMany(EquipmentAvailability::class);
    }

    public function createEquipment( $data )
    {
        return parent::create( $data );
    }

    public function updateEquipment( $data )
    {
        return $this->update( $data );
    }
}
