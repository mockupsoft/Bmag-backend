<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function me()
    {
        $role = Role::findByName('editor', 'api');
        dd($role->permissions->pluck('name'));
        dd(\Auth::user()->can('publish post'));
    }
}
