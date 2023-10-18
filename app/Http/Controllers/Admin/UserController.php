<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use function Laravel\Prompts\error;

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

    public function create () {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }

    public function store (Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|min:4|max:255',
            'email' => 'required|email|unique:users,email|max:255',
            'password' => 'required|string|min:8'
        ]);

        $user = User::create($validated);
        $selectedRoles = collect($request->input('roles'));

        if($selectedRoles->isNotEmpty()){
            $avaliableRoles = Role::pluck('name');
            $validRoles = $selectedRoles->filter(function ($role) use ($avaliableRoles) {
                return $avaliableRoles->contains($role);
            });
            $user->assignRole($validRoles);
        }

        toastr()->success('新增 用戶 成功!');
        return to_route('admin.users.index');
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
}
