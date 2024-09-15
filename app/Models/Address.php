<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $fillable = ['user_id', 'city_id', 'title', 'postal_code', 'blv_name', 'street_name', 'building_no', 'floor', 'unit_number', 'unit_no', 'is_sender', 'first_name', 'last_name', 'mobile', 'phone', 'description'];
    use HasFactory;
}
