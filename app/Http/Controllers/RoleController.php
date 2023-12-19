<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    public function index()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('pages.dashboards.roles.index', compact('roles', 'permissions'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('pages.dashboards.roles.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|unique:roles,name',
            'permissions' => 'nullable|array',
        ]);
        
        $role = Role::create([
            'name' => $request->input('name'),
        ]);

        if ($request->has('permissions')) {
            $role->givePermissionTo($request->input('permissions'));
        }

        return redirect()->route('roles.index')->with('success', 'Role created successfully');
    }

    public function edit(Role $role)
    {
        $permissions = Permission::all();
        return view('pages.dashboards.roles.edit', compact('role', 'permissions'));
    }
}
