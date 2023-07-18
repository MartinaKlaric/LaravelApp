<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Role::all();
        // return Role::orderBy('name')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = new Role();
        $role->fill($request->all());
        // $role->name = $request->input('name');
        $role->save();

        // Role::create([
        //     'name' => $request->input('name')
        // ]);

        return redirect()->route('role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $role)
    {
        $role = Role::withTrashed()->find($role);

        if ($role->trashed()) {
            $role->restore();
        }

        return $role;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role->name = $request->input('name');
        $role->save();

        return redirect()->route('role.show', ['role' => $role]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('role.index'); 
    }
}