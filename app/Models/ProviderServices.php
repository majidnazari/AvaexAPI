<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProviderServices extends Model
{
    protected $fillable = ['provider_id', 'provider_name', 'service_name', 'shipping_method', 'status'];
    use HasFactory;
}
