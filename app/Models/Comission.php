<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comission extends Model
{
    protected $fillable = ['user_id_creator', 'user_id', 'group_id', 'service_id', 'name', 'condition_count', 'comission_type', 'amount', 'max_range', 'status', 'priority', 'expire_date'];
    use HasFactory;
}
