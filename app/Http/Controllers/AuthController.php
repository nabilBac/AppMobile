<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function login()
{
    $existingUser = User::where('email', 'nabil@bachir.fr')->first();

    if (!$existingUser) {
        User::create([
            'name' => 'Nabil',
            'email' => 'nabil@bachir.fr',
            'password' => Hash::make('0000'),
        ]);
    }

    return view('auth.login');
}

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();
    
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended(route('admin.property.index'));
        }
    
        return back()->withErrors([
            'email'=> 'identifiants incorrect'
        ])->onlyInput('email');
    }
    public function logout(){
        Auth::logout();
        return to_route('login')->with('success', 'Vous êtes maintenant déconnecté');
    }

    public function showRegistrationForm()
    {
         return view('auth.register');
    }

    public function register(RegisterRequest $request)
{
    $user = User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ]);

    // Authentifie automatiquement l'utilisateur nouvellement inscrit.
    Auth::login($user);

    return redirect()->intended(route('admin.property.index'));
}

    
}
