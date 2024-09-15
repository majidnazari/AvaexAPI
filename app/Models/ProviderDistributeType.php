<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderDistributeType extends Model
{
    protected $fillable = ['provider_id', 'provider_name', 'code', 'distribute_type', 'parcel_status'];
    use HasFactory;
}
