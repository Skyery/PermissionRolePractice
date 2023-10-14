<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index () {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    public function show (User $user) {
        $roles = Role::all();

        return view('admin.users.show', compact('user', 'roles'));
    }

    public function destroy (User $user) {
        $user->delete();

        toastr()->success('刪除 帳號 成功!');
        return back();
    }

    public function assignRoles (Request $request, User $user) {
        if($user->hasRole($request->role)){
            toastr()->error('身分已存在!');
            return back();
        }

        $user->assignRole($request->role);
        toastr()->success('分配 身分 成功!');
        return back();
    }

    public function removeRoles (User $user, Role $role) {
        if($user->hasRole($role)){
            $user->removeRole($role);

            toastr()->success('移除 身分 成功!');
            return back();
        }

        toastr()->error('身分不存在!');
        return back();
    }

    public function givePermissions (Request $request, User $user) {
        if($user->hasPermissionTo($request->permission)){
            toastr()->error('權限已存在!');
            return back();
        }

        $user->givePermissionTo($request->permission);
        toastr()->success('分配 權限 成功!');
        return back();
    }
    public function revokePermissions (User $user, Permission $permission) {
        if($user->hasPermissionTo($permission)){
            $user->revokePermissionTo($permission);

            toastr()->success('移除 ccc 成功!');
            return back();
        }

        toastr()->error('權限不存在!');
        return back();
    }
}
