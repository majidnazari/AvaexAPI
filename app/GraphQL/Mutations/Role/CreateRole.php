<?php

namespace App\GraphQL\Mutations\Role;

use Spatie\Role\Models\Role;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Error\Error;
use Log;
use Spatie\Permission\Models\Role as ModelsRole;
use Throwable;

final class CreateRole
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
        $RoleData = [

            'name' => $args['name'],
            "guard_name" => $args['guard_name']  
        ];
               
        $Role = ModelsRole::create($RoleData);       
        
        return $Role;
    }
     
}
