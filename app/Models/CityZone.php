<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityZone extends Model
{
    protected $fillable = ['city_id', 'zone_id'];
    use HasFactory;
}
