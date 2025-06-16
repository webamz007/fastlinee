<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'services', 'service_id', 'car_id');
    }

    public function routes()
    {
        return $this->hasManyThrough(Route::class, Car::class, 'services', 'car_id', 'id', 'route_id');
    }
}
