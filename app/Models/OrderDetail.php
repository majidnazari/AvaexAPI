<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $fillable = ['order_id', 'parcel_id', 'registered_number', 'tracking_code', 'refrence_code', 'lading_code', 'barcode', 'parcel_status', 'insurance_provider_cost', 'tax_provider_cost', 'fee_provider_cost', 'unusual_provider_cost', 'extra_provider_cost', 'insurance_service_cost', 'fee_service_cost', 'tax_service_cost', 'collecting_service_cost', 'inplace_service_cost', 'fee_service_VIP', 'SMS_service_cost', 'print_service_cost', 'extra_service_cost', 'manager_commission', 'description'];
    use HasFactory;
}
