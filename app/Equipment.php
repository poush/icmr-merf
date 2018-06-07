<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    protected $table = 'equipments';

    protected $fillable = [ 'category_id', 'name', 'manufacturer', 'model', 'quantity', 'extra', 'features', 'working', 'operation', 'description', 'is_working', 'health_problems', 'training_requirement', 'machine_rest', 'location', 'specs', 'institute_id', 'equipment_age', 'source_funding', 'state_art', 'not_working_since', 'purchase_date', 'latest_technology' ];

    protected $dates = [
        'not_working_since',
        'purchase_date',
        'created_at',
        'updated_at'
    ];

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

    public function institute()
    {
        return $this->belongsTo( Institute::class );
    }

    public function isCreatedByInstitute()
    {
        return $this->institute_id ? true : false;
    }
}
