<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserComission extends Model
{
    protected $fillable = ['user_id_creator', 'user_id', 'comission_id', 'order_id', 'status'];
    use HasFactory;
}
