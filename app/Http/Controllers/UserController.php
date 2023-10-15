<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{   
    public function logout(){
        auth()->logout();
        return redirect('/register');
    }
    public function register(){
        return view('auth.register');
    }
    public function registerUser(Request $request){
        $incoming = $request->validate([
            'username'=>'required',
            'email'=>['required', 'unique:users'],
            'password'=>'required'
        ]);

        $incoming['password'] = bcrypt($incoming['password']);
        $user = User::create($incoming);
        auth()->login($user);
        return redirect('/home');
    }

    public function login(){
        return view('auth.login');
    }
    public function loginUser(Request $request){
        $incoming = $request->validate([
            'email'=>'required',
            'password'=>'required',
        ],[
            'email'=>'Please fill in the field',
            'password'=>'Please fill in the field', 
        ]);
        if (auth()->attempt(['email'=> $incoming['email'],'password'=> $incoming['password'], ]))  {
            $request->session()->regenerate();
            return redirect('/home');                      
        }
        else{
            return redirect('/');
        }
    }
}
