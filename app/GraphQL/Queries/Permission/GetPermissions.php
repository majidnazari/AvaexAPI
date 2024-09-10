<?php

namespace App\GraphQL\Queries\Permission;

use Spatie\Permission\Models\Permission;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Error\Error;
use Log;
use Throwable;

final class GetPermissions  
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }
    public function resolvePermissions($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        $user_id = auth()->guard('api')->user()->id; 
               
        $Permissions = Permission::where('name','like','%'.$args['name'].'%')->where('guard_name','like','%'.$args['guard_name'].'%')->get();       
        
        return $Permissions;
    }

    
}
