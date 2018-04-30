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
}
