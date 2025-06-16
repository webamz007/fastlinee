<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function getCarImageAttribute()
    {
        if ($this->attributes['car_image']) {
            return asset('storage/' . $this->attributes['car_image']);
        }

        // If no image is set, you might want to return a default image URL or null
        return asset('path/to/default/image.jpg');
    }

    public function category()
    {
        return $this->belongsTo(CarCategory::class, 'category_id');
    }

    public function routes()
    {
        return $this->belongsToMany(Route::class, 'services', 'car_id', 'route_id');
    }
}
