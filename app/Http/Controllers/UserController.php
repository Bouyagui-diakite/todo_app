<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function create()
    {
        return view('users.register');
    }

    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        
        $user = User::create($formFields);

        auth()->login($user);

        toast('Votre compte a bien ete cree','success');
        return redirect('/home');
    }

    public function login()
    {
        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required|min:6',
        ]);

        if (auth()->attempt($formFields)) {

            $request->session()->regenerate();
            toast('Vous etes connecte','success');
            return redirect('/home');
        }

        return back()->withErrors([
            'email' => 'Invalid Credentials'])->onlyInput('email');


            
        
    }

    public function logout(Request $request)
    {
        auth()->logout();


        $request->session()->invalidate();
        $request->session()->regenerateToken();

        toast('Vous etes deconnecte','success');
        return redirect('/login');
    }


    
}
