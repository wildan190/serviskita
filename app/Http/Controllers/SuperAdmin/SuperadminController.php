<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SuperadminController extends Controller
{
    // Menampilkan daftar pengguna
    public function index()
    {
        $users = User::all();
        return view('superadmin.users.index', compact('users'));
    }

    // Menampilkan form untuk mengedit pengguna
    public function edit(User $user)
    {
        return view('superadmin.users.edit', compact('user'));
    }

    // Menyimpan perubahan pada pengguna
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'role' => 'required|in:superadmin,admin,user' // Atur peran yang diperbolehkan
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('superadmin.users.index')->with('success', 'User updated successfully.');
    }
}
