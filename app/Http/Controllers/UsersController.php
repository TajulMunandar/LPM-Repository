<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $page = 'User';
        $users = User::all();
        return view('dashboard.pages.users')->with(compact('page', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users',
                'password' => 'required|min:6',
                'isAdmin' => 'required',
            ]);

            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'isAdmin' => $request->isAdmin,
            ]);

            return back()->with('success', 'User berhasil ditambahkan');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menambahkan user: ' . $e->getMessage());
        }
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
    public function update(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);

            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $user->id,
                'isAdmin' => 'required',
            ]);

            $user->update($request->only('name', 'email', 'isAdmin'));

            return back()->with('success', 'User berhasil diupdate');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal mengupdate user: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            User::findOrFail($id)->delete();
            return back()->with('success', 'User berhasil dihapus');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal menghapus user: ' . $e->getMessage());
        }
    }

    public function updatePassword(Request $request, $id)
    {
        try {
            $request->validate([
                'password' => 'required|min:6',
            ]);

            $user = User::findOrFail($id);
            $user->update(['password' => Hash::make($request->password)]);

            return back()->with('success', 'Password berhasil diubah');
        } catch (Exception $e) {
            return back()->with('error', 'Gagal mengubah password: ' . $e->getMessage());
        }
    }
}
