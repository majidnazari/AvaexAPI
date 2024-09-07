<?php

namespace App\GraphQL\Queries\Role;

use Spatie\Role\Models\Role;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Error\Error;
use Log;
use Spatie\Permission\Models\Role as ModelsRole;
use Throwable;

final class GetRoles  
{
    /**
     * @param  null  $_
     * @param  array{}  $args
     */
    public function __invoke($_, array $args)
    {
        // TODO implement the resolver
    }
    public function resolveRoles($rootValue, array $args, GraphQLContext $context = null, ResolveInfo $resolveInfo)
    {
        $user_id = auth()->guard('api')->user()->id;    
        
        
               
        $Roles = ModelsRole::where('name','like','%'.$args['name'].'%')->where('guard_name','like','%'.$args['guard_name'].'%')->get();       
        
        return $Roles;
    }

    
}
