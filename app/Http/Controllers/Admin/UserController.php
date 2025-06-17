<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserStoreRequest;
use App\Http\Requests\Admin\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.user.create', compact('roles'));
    }

    public function store(UserStoreRequest $request)
    {
        $user = User::create(array_merge($request->all(), ['password' => Hash::make($request->password)]));
        $user->assignRole($request->roles);

        session_success("Kullanıcı eklendi");
        return redirect()->route('admin.user.index');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(UserUpdateRequest $request, User $user)
    {
        $user->update($request->all());
        $user->refresh()->syncRoles($request->roles);

        session_success("Kullanıcı güncellendi");
        return redirect()->route('admin.user.index');
    }
}
