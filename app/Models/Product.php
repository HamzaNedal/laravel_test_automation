<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'category_id'];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeHigherPirce($query)
    {
        return $query->orderBy('price', 'desc');
    }

    public function setCategory($category)
    {
        if (!is_null($category->id)) {
            throw new \Exception();
        }
        $this->category()->associate($category)->save();
    }
}
