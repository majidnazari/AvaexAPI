<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_name',
        'password',
        'password',
        'grant_type',
        'apiKey',
        'base_url',
        'token_url',
        'base_token',
        'token',
        'refresh_token',
        'expire_date',
        'status'

    ];

    protected $hidden = [];
}
