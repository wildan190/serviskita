<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class SuperadminController extends Controller
{
    // Menampilkan daftar pengguna
    public function index(Request $request)
    {
        $query = $request->get('search');
        $users = User::where('name', 'LIKE', "%$query%")
                    ->orWhere('email', 'LIKE', "%$query%")
                    ->paginate(10);
        return view('superadmin.users.index', compact('users', 'query'));
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
            'role' => 'required|in:superadmin,admin,user'
        ]);

        Alert::success('Success', 'User updated successfully.');

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('superadmin.users.index')->with('success', 'User updated successfully.');
    }
}