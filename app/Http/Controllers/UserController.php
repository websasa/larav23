<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Metoda koja prikazuje sve korisnike u sustavu
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    // Metoda koja prikazuje formu za stvaranje novog korisnika
    public function create()
    {
        return view('users.create');
    }

    // Metoda koja sprema novog korisnika u bazu podataka
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return redirect()->route('users.index')->with('success', 'Korisnik je uspješno stvoren.');
    }

    // Metoda koja prikazuje formu za uređivanje postojećeg korisnika
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    // Metoda koja ažurira korisnika u bazi podataka
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect()->route('users.index')->with('success', 'Korisnik je uspješno ažuriran.');
    }

    // Metoda koja briše korisnika iz baze podataka
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('success', 'Korisnik je uspješno izbrisan.');
    }
}