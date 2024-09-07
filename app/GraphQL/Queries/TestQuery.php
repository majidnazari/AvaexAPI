<?php

namespace App\GraphQL\Queries;

use App\Models\User;
use Illuminate\Container\Attributes\Auth;
use Log;
use Spatie\Permission\Models\Permission;

class TestQuery
{
    public function test1($root, array $args)
    {
        $user=auth()->user();
        Permission::create(['name' => 'edit user', 'guard_name' => 'api']);
        //$user_tmp=User::find($user->id);
        // Adding permissions to a user
        $user->givePermissionTo('edit user');

        Log::info("the per is: " .  $user->can('edit user'));

        return $user->first_name;
    }
}
