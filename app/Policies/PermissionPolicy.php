<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Spatie\Permission\Models\Permission;

use Log;

class PermissionPolicy
{
    use HandlesAuthorization;
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user)
    {

        //Log::info("inside the policyc permission" . json_encode($user));
        return true;
        // if ($Permission->published) {
        //     return true;
        // }

        // visitors cannot view unpublished items
        if ($user === null) {
            return false;
        }

        // admin overrides published status
        if ($user->can('view unpublished Permissions')) {
            return true;
        }

        // authors can view their own unpublished Permissions
        //return $user->id == $Permission->user_id;
    }

    public function create(User $user)
    {
        return ($user->can('create Permissions'));
    }

    public function update(User $user, Permission $Permission)
    {
        if ($user->can('edit all Permissions')) {
            return true;
        }

        if ($user->can('edit own Permissions')) {
            return $user->id == $Permission->user_id;
        }
    }

    public function delete(User $user, Permission $Permission)
    {
        if ($user->can('delete any Permission')) {
            return true;
        }

        if ($user->can('delete own Permissions')) {
            return $user->id == $Permission->user_id;
        }
    }
}
