<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserGroupController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $permissionNames = $role->permissions->pluck('name')->toArray();
        return view('admin.roles.edit', compact('role', 'permissions', 'permissionNames'));
    }

    public function update(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);
        $role->update($request->all());
        return redirect()->route('admin.role.index');
    }
}
