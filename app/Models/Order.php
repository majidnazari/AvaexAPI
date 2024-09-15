<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id_creator', 'user_id_agent', 'provider_service_id', 'sender_address_id', 'recipient_address_id', 'register_date', 'order_kind', 'financial_status', 'is_COD', 'COD', 'payment_type', 'payment_way', 'order_status', 'description'];
    use HasFactory;
}
