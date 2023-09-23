<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthLoginController extends Controller
{
    use AuthenticatesUsers;

    // Ovo je putanja na koju će korisnik biti preusmjeren nakon uspješne prijave
    protected $redirectTo = '/home';

    // Metoda koja prikazuje formu za prijavljivanje korisnika
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Metoda koja obavlja prijavljivanje korisnika
    public function login(Request $request)
    {
        // Provjeravamo unesene podatke koristeći ugrađenu Laravelovu validaciju
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Pokušavamo prijaviti korisnika s unesenim podacima
        if ($this->attemptLogin($request)) {
            // Uspješna prijava, preusmjeravamo korisnika na željenu stranicu
            return redirect()->intended($this->redirectPath());
        }

        // Neuspješna prijava, preusmjeravamo korisnika nazad na formu za prijavu s greškom
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors([
            'email' => 'Krivi podaci za prijavu.',
        ]);
    }

    // Metoda koja odjavljuje korisnika
    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();

        return redirect('/');
    }
}