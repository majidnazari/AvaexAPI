<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //dd("hi this is index");

        //$role = Role::create(['name' => 'writer']);
        // $role = Role::create(['name' => 'admin']);
        // $role = Role::create(['name' => 'secrtery']);
        // $role = Role::create(['name' => 'user']);
        // $role = Role::create(['name' => 'manager']);


        //$role = Role::where(['id' => '11'])->first();

        //$permission = Permission::create(['name' => 'create articles']);
        // $permission = Permission::create(['name' => 'edit articles']);
        //$permission = Permission::create(['name' => 'delete articles']);
        //$permission = Permission::create(['name' => 'show articles']);

        //$permission = Permission::where(['name' => 'create articles'])->first();
        //$permissions = Permission::whereIn('id', [7, 8, 11])->get();

        //$role->givePermissionTo($permissions);


        //$permissions->assignRole($role);
        // $permission->assignRole($role);
        // $permission->assignRole($role);
        // $permission->assignRole($role);


        $user = User::where("id", 3)->first();
        $role = Role::where("id", 8)->first();

        //$user->givePermissionTo(['edit articles', 'delete articles', 'show articles', 'create articles']);
        //$user->revokePermissionTo(['edit articles', 'delete articles', 'show articles', 'create articles']);
        //$user->syncPermissions(['edit articles', 'delete articles', 'show articles', 'create articles']);

        //$hasPermission = $user->hasAnyPermission(['publish articles', 'unpublish articles']);
        //$hasPermission = $user->hasAllPermissions(['edit articles', 'publish articles', 'unpublish articles']);

        //$hasPermission = $user->hasAllPermissions(['edit articles', 7, 8, 9, 10]);
        //$hasPermission = $user->can('edit articles');

        //dd($hasPermission);
        // get a list of all permissions directly assigned to the user
        // $permissionNames = $user->getPermissionNames(); // collection of name strings
        // $permissions = $user->permissions; // collection of permission objects

        // // get all permissions for the user, either directly, or from roles, or from both
        // $permissions = $user->getDirectPermissions();
        // $permissions = $user->getPermissionsViaRoles();
        // $permissions = $user->getAllPermissions();

        // // get the names of the user's roles
        // $roles = $user->getRoleNames(); // Returns a collection

        //$permissionNames = $user->getPermissionNames(); // collection of name strings

        //$roles = $user->assignRole('manager', 'admin');

        //$roles = $role->givePermissionTo('edit articles');

        // $roles = $role->syncPermissions(['create articles', 'delete articles']);
        // //$roles = $role->hasPermissionTo('edit articles');
        // $p = $role->permissions->pluck('name');

        // $role = Role::findByName('writer');
        // $role->givePermissionTo('edit articles');

        // $user->assignRole('writer');

        // $user->givePermissionTo('create articles');

        $test = $user->getDirectPermissions();
        $test2 = $user->getPermissionsViaRoles();
        $test3 = $user->getAllPermissions();

        $users = User::role('writer')->get();

        dd($users);


        // dd($role, $permission);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
