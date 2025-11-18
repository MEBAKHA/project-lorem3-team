<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::count();
        $recentUsers = User::latest()->take(5)->get();
        
        return view('admin.dashboard', [
            'totalUsers' => $totalUsers,
            'recentUsers' => $recentUsers,
        ]);
    }

    public function users()
    {
        $users = User::paginate(10);
        return view('admin.users.index', ['users' => $users]);
    }

    public function userShow(User $user)
    {
        return view('admin.users.show', ['user' => $user]);
    }

    public function userEdit(User $user)
    {
        return view('admin.users.edit', ['user' => $user]);
    }

    public function userUpdate(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update($validated);
        
        return redirect()->route('admin.users')->with('success', 'User updated successfully!');
    }

    public function userDelete(User $user)
    {
        $user->delete();
        return redirect()->route('admin.users')->with('success', 'User deleted successfully!');
    }
}
