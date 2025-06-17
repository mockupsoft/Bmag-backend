<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoleStoreRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserGroupController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('admin.role.create', compact('permissions'));
    }

    public function store(RoleStoreRequest $request)
    {
        $role = Role::create(['name' => $request->label, 'label' => $request->label]);
        $role->syncPermissions($request->permissions);

        session_success("Rol kaydedildi");
        return redirect()->route('admin.role.index');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        $permissionNames = $role->permissions->pluck('name')->toArray();
        return view('admin.role.edit', compact('role', 'permissions', 'permissionNames'));
    }

    public function update(Request $request, Role $role)
    {
        $role->syncPermissions($request->permissions);
        $role->update($request->all());

        session_success("Rol güncellendi");
        return redirect()->route('admin.role.index');
    }
}
