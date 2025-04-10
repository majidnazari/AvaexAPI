<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParcelDetail extends Model
{
    use HasFactory;

    protected $fillable = ['parcel_id', 'name', 'count', 'description'];
}
