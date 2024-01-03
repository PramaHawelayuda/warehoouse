<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $role = Role::orderBy('created_at', 'DESC')-> get();

        return view('role.index', compact('role'));
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(Request $request)
    {
        Role::create($request->all());

        return redirect()->route('role.index')-> with('success','Role added successfully');
    }

    public function show(string $id)
    {
        $role = Role::findOrFail($id);

        return view('role.show', compact('role'));
    }

    public function edit(string $id)
    {
        $role = Role::findOrFail($id);

        return view('role.edit', compact('role'));
    }

    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);

        $role->update($request->all());

        return redirect()->route('role.index')
            ->with('success','Role updated successfully');
    }

    public function destroy(string $id)
    {
        $role = Role::findOrFail($id);
        
        $role->delete();

        return redirect()->route('role.index')->with('success', 'Kategori deleted succesfully');
    }
}
