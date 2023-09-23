<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthRegisterController extends Controller
{
    // Prikazuje obrazac za registraciju
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Obrada podataka iz obrasca za registraciju
    public function register(Request $request)
    {
        // Validacija unesenih podataka
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Stvaranje novog korisnika
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Možete dodati dodatne postupke koji će se izvršiti nakon registracije korisnika, npr. slanje emaila za potvrdu

        // Preusmjeravanje na željenu rutu nakon uspješne registracije
        return redirect()->route('home')->with('success', 'Registracija je uspješna. Dobrodošli na našu stranicu!');
    }
}
