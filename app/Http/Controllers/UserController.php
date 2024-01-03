<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Cache\RedisStore;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::orderBy('created_at', 'DESC')->get();

        return view('user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Role::all();

        return view('user.create', compact('role'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'nomor_hp' => 'required',
            'id_role' => 'required',
            'nama_warehouse' => 'required',
        ]);

        User::create($request->all());

        return redirect()->route('user.index')
            ->with('success','User added succesfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        $role = Role::all();

        return view('user.edit', compact('user', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        // $role = Role::findOrFail($id);

        // $user->update($request->all());

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'nomor_hp' => $request->nomor_hp,
            'id_role' => $request->id_role,
            'nama_warehouse' => $request->nama_warehouse,
        ]);

        return redirect()->route('user.index')
            ->with('Sucess', 'User updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('user.index')
            ->with('success', 'User deleted succesfully.');
    }

    public function status($userId)
    {
        $user = User::find($userId);

        if($user){
            if($user->status){
                $user->status = 0;
            }
            else{
                $user->status = 1;
            }
        }

        $user->save();

        return back();
    }
}
