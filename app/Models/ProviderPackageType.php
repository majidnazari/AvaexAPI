<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderPackageType extends Model
{
    protected $fillable = ['provider_id', 'provider_name', 'code', 'package_type', 'package_status'];
    use HasFactory;
}
