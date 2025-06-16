<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function cars()
    {
        return $this->belongsToMany(Car::class, 'services', 'route_id', 'car_id');
    }
}
