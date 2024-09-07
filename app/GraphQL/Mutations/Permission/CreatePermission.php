<?php

namespace App\GraphQL\Mutations\Permission;

use Spatie\Permission\Models\Permission;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Error\Error;
use Log;
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
        $PermissionData = [

            'name' => $args['name'],
            "guard_name" => $args['guard_name']  
        ];
               
        $Permission = Permission::create($PermissionData);       
        
        return $Permission;
    }
     
}
