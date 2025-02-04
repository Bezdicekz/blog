<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pokud uživatel není přihlášen, přesměruj na login
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Pokud uživatel nemá roli 'admin', přesměruj na dashboard
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard');
        }

        // Pokud je uživatel admin, zobrazí se stránka uzivatele.blade.php
        $users = User::all();
        return view('uzivatele', compact('users')); // Předání uživatelů do šablony
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
        //
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
        $user = User::findOrFail($id); // Získání uživatele podle ID
        return view('edit_user', compact('user')); // Předání uživatele do šablony
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        // Validace vstupních dat
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'role' => 'required|in:admin,user',
        ]);

        // Aktualizace údajů uživatele
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
        ]);

        return redirect()->route('admin.uzivatele')->with('success', 'Uživatel byl úspěšně aktualizován!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
