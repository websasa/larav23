<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class CMSUserRoleController extends Controller
{
    // Metoda koja prikazuje sve korisnike i pripadajuće uloge u sustavu
    public function index()
    {
        $users = User::with('roles')->get();
        return view('cms.user_roles.index', compact('users'));
    }

    // Metoda koja prikazuje formu za dodjelu uloge korisniku
    public function edit(User $user)
    {
        $roles = Role::all();
        return view('cms.user_roles.edit', compact('user', 'roles'));
    }

    // Metoda koja sprema promjene uloga za korisnika u bazu podataka
    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'roles' => 'array', // Očekujemo da je odabir uloga predstavljen kao array
        ]);

        $roles = $request->input('roles', []); // Ako nisu odabrane uloge, postavljamo prazan array

        $user->roles()->sync($roles); // Sinkroniziramo uloge korisnika s odabranim ulogama

        return redirect()->route('cms.user_roles.index')->with('success', 'Uloge korisnika su uspješno ažurirane.');
    }
}