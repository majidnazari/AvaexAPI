<?php

namespace App\GraphQL\Mutations\Role;

use App\Models\User;
use Spatie\Permission\Models\Permission;

use GraphQL\Type\Definition\ResolveInfo;
use Nuwave\Lighthouse\Support\Contracts\GraphQLContext;
use GraphQL\Error\Error;
use Log;
use Spatie\Permission\Models\Role;
use Throwable;

final class CreateModelRole
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
        $creator_id = auth()->guard('api')->user()->id;

        $user=User::where('id',$args['user_id'])->first();
        $role_names=Role::whereIn('id',$args['role_ids'])->pluck('name');
        $user->syncRoles($role_names);
        //$user = User::with('permissions')->find($args['user_id']); 
        return  $user; 
    }
     
}
