<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'phone' => 'required|string|max:15',
            'email'     =>  'required|unique:users',
            'address' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'role_id' => 'required|in:1,2,3',
        ]);

        $user = new User([
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'phone' => $request->get('phone'),
            'email' => $request->get('email'),
            'address' => $request->get('address'),
            'status' => $request->get('status'),
            'role_id' => $request->get('role_id'),
        ]);

        $user->save();

        return redirect()->route('usersmanagement.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'address' => 'required|string|max:255',
            'status' => 'required|in:active,inactive',
            'role_id' => 'required|in:1,2,3',
        ]);
    
        $user->update([
            'username' => $request->username,
            'phone' => $request->phone,
            'address' => $request->address,
            'status' => $request->status,
            'role_id' => $request->role_id,
        ]);
    
        return redirect()->route('usersmanagement.index')->with('success', 'User updated successfully.');
    }    

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('usersmanagement.index')->with('success', 'User deleted successfully.');
    }
}
