<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use League\CommonMark\Extension\DescriptionList\Parser\DescriptionTermContinueParser;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index () {
        $permissions = Permission::all();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create () {
        return view('admin.permissions.create');
    }

    public function store (Request $request) {
        $validated = $request->validate(['name' => 'required|min:4']);
        Permission::create($validated);

        toastr()->success('新增 權限 成功!');
        return to_route('admin.permissions.index');
    }

    public function edit (Permission $permission) {
        $roles = Role::all();
        return view('admin.permissions.edit', compact('permission', 'roles'));
    }

    public function update (Request $request, Permission $permission) {
        $validated = $request->validate(['name' => 'required|min:4']);
        $permission->update($validated);

        toastr()->success('更新 權限 成功!');
        return to_route('admin.permissions.index');
    }

    public function assignRoles (Request $request, Permission $permission) {
        if($permission->hasRole($request->role)){
            toastr()->error('身分已存在!');
            return back();
        }

        $permission->assignRole($request->role);
        toastr()->success('分配 身分 成功!');
        return back();
    }

    public function removeRoles (Permission $permission, Role $role) {
        if($permission->hasRole($role)){
            $permission->removeRole($role);
            toastr()->success('移除 身分 成功!');
            return back();
        }

        toastr()->error('身分不存在!');
        return back();
    }

    public function destroy (Permission $permission) {
        $permission->delete();

        toastr()->success('刪除 權限 成功!');
        return back();
    }
}
