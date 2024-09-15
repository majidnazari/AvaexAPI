<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class provider extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_name', 'password', 'grant_type', 'api_key', 'base_url', 'token_url', 'base_token', 'access_token', 'refresh_token', 'expires_in', 'status'];

    protected $hidden = [];
}
