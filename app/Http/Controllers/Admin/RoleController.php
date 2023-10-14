<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\FuncCall;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index () {
        $roles = Role::whereNotIn('name', ['super admin', 'admin'])->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function create () {
        return view('admin.roles.create');
    }

    public function store (Request $request) {
        $validated = $request->validate(['name' => 'required|min:4']);
        Role::create($validated);

        toastr()->success('新增 身分 成功!');
        return to_route('admin.roles.index');
    }

    public function edit (Role $role) {
        $permissions =  Permission::all();
        return view('admin.roles.edit', compact('role', 'permissions'));
    }

    public function update (Request $request, Role $role) {
        $validated = $request->validate(['name' => 'required|min:4']);
        $role->update($validated);

        toastr()->success('更新 身分 成功!');
        return to_route('admin.roles.index');
    }

    public function givePermissions (Request $request, Role $role) {
        if($role->hasPermissionTo($request->permission)){
            toastr()->error('權限已存在!');
            return back();
        }

        $role->givePermissionTo($request->permission);
        toastr()->success('分配 權限 成功!');
        return back();
    }

    public function revokePermissions (Role $role, Permission $permission) {
        if($role->hasPermissionTo($permission)){
            $role->revokePermissionTo($permission);
            toastr()->success('移除 權限 成功!');
            return back();
        }

        toastr()->error('權限不存在!');
        return back();
    }

    public function destroy (Role $role) {
        $role->delete();

        toastr()->success('刪除 身分 成功!');
        return to_route('admin.roles.index');
    }
}
