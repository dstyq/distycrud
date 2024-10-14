<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('master.user.index', compact('users'));
    }

    public function create()
    {
        return view('master.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users',
            'nomor_handphone' => 'required|string|max:15',
        ]);

        User::create($request->all());
        return redirect()->route('master.user.index')->with('success', 'User created successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('master.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'nomor_handphone' => 'required|string|max:15',
        ]);

        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('master.user.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('master.user.index')->with('success', 'User deleted successfully.');
    }
}
