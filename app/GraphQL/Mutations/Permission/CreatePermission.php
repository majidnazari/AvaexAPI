<?php

namespace App\GraphQL\Mutations\Permission;

use Spatie\Permission\Models\Permission;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Error\Error;
use Log;
use Spatie\Permission\Models\Role;
use Throwable;

final class CreatePermission
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }
    public function resolver($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        $user_id = auth()->guard('api')->user()->id;
        $user = auth()->guard('api')->user();

        //$role=Role::find(4);
        //$user->hasRole(['create role permission relation', 'moderator']);

       // $role->hasPermissionTo('create role permission relation');

       // $user->hasDirectPermission('edit articles');

        //$user->getPermissionsViaRoles();

        //Log::info("test permission:".   $user->hasPermissionTo('create role permission relation'));
        //Log::info("test permission:".   $user->hasDirectPermission('create role permission relation'));
        //Log::info("test permission:".   $role->hasPermissionTo('create role permission relation'));
        //Log::info("test permission:" . $user->hasRole(RolesEnum::SECRATARY));
        //Log::info("test permission:" . $user->hasRole('secratary'));
        //Log::info("test permission:" . $user->hasRole('secratary'));
       
        $PermissionData = [

            'name' => $args['name'],
            "guard_name" => $args['guard_name']  
        ];
               
        $Permission = Permission::create($PermissionData);
        return $Permission;
        
    }
     
}


 