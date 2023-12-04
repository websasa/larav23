<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function submitForm(Request $request)
    {
        // processing data from the form
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $request->input('password');

        // save data to the database:
        // User::create([
        //     'username' => $username,
        //     'email' => $email,
        //     'password' => bcrypt($password),
        // ]);

      

        return redirect('/')->with('success', 'Form submitted successfully!');
    }
}