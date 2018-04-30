<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name' ];

    public function createCategory($data)
    {
        return static::create($data);
    }

    public function updateCategory($data)
    {
        return $this->update($data);
    }
}
