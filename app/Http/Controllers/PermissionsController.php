<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data['permissions'] = Permission::all();
        return view('role-permissions.permissions.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('role-permissions.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => [
                'required', 'unique:permissions,name', 'string'
            ]
        ]);
        // $role = Role::create(['name' => 'writer']);
        $permission = Permission::create(['name' => $request->name]);
        return redirect('permissions')->with('success','permissions created successfully');
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
        Permission::find($id)->delete();
        return redirect('permissions')->with('success','permissions deleted successfully');

    }
}
