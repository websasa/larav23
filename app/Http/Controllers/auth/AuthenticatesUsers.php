<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers as BaseAuthenticatesUsers;

class AuthenticatesUsers
{
    use BaseAuthenticatesUsers;

    protected $redirectTo = '/dashboard'; // Putanja na koju će se preusmjeriti korisnik nakon prijave

    // Metoda za prilagodbu postupka prijave, ako je potrebno
    protected function credentials(Request $request)
    {
        return $request->only('email', 'password');
    }

    // Možete dodati i druge prilagodbe u prijavu, npr. provjeru dodatnih uvjeta prijave
    // protected function attemptLogin(Request $request)
    // {
    //     return $this->guard()->attempt(
    //         $this->credentials($request), $request->filled('remember')
    //     );
    // }

    // Metoda koja se poziva nakon uspješne prijave
    protected function authenticated(Request $request, $user)
    {
        // Ovdje možete dodati postupke koji se izvršavaju nakon prijave
    }

    // Metoda za ručno odjavu korisnika
    public function logout(Request $request)
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return redirect('/');
    }
}