<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }
    /**
     * Handle an authentication attempt.
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
            //essai de connexion avec les infos du formulaire 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            //redirection vers l'index des films
            return redirect()->intended('/categories');
        }
        
        //redirection avec erreur sur la page de login
        return back()->withErrors([
            'email' => 'Identifiants incorrects.',
        ])->onlyInput('email'); //mail qui sera laissé dans le champ
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }


}

