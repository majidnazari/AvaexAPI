<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Laravel\Passport\HasApiTokens;

use Spatie\Permission\Models\Permission;


use Log;

class User extends Authenticatable
{
    use HasFactory;
    use HasRoles;
    use HasApiTokens, Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

     protected $guard_name = 'api'; // Ensure this matches your guard
    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'national_code', 'national_company_code', 'mobile', 'phone', 'credit', 'status', 'user_type', 'email_verified_at', 'remember_token', 'avatar'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // public function permissions()
    // {

    //     return $this->morphToMany(
    //         \Spatie\Permission\Models\Permission::class,
    //         'model',
    //         'model_has_permissions', // The name of the table
    //         'model_id', // The foreign key of the model
    //         'permission_id', // The foreign key of the permission
    //         'model_type' // The name of the column that stores the model type
    //     );
    // }
}
