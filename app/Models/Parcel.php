<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    use HasFactory;

    protected $fillable = ['package_type', 'weight', 'width', 'length', 'height', 'parcel_value', 'is_breakable', 'is_liquids', 'description'];
    
}
