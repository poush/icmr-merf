<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $fillable = ['name', 'parent_id'];

    public function createCategory($data)
    {
        return static::create($data);
    }

    public function updateCategory($data)
    {
        return $this->update($data);
    }

    public function parent()
    {
    	return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
    	return $this->hasMany(Category::class, 'parent_id');
    }

    public function parentCategories()
    {
    	return static::where('parent_id', NULL)->get();
    }
}
