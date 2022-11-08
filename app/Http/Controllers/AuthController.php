<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;   
use Session;

class AuthController extends Controller
{
    public function loginView()
    {
        return view('login');
    }

    public function registerView()
    {
        return view('register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = User::where('email', $request->email)->first();
            foreach($user->roles as $role){
                if(strtolower($role->role) == 'admin'){
                    return redirect()->route('admin.dashboard');
                }
            }
            return redirect()->route('homepage');
        }

        return redirect()->route("login")->withErrors('Email or password is not valid!');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'confirm_password' => 'required|same:password'
        ]);
        
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $user_role_id = Role::where('role', 'user')->first();

        $user->roles()->attach($user_role_id);


        auth()->login($user);

        return redirect()->route('homepage');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }
}
