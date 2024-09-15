<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['province_id', 'fa_name', 'en_name', 'post_code', 'tipax_code', 'mahex_code', 'chapar_code', 'shop_id'];
    use HasFactory;
}
