<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderParcelType extends Model
{
    protected $fillable = ['provider_id', 'provider_name', 'code', 'parcel_type', 'parcel_status'];
    use HasFactory;
}
