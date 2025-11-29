<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function index(){
        return view('register');
    }
    public function store(Request $request){
        $validated = $request->validate([
            'first_name'=>['required'],
            'last_name'=>['required'],
            'email'=>['email','required'],
            'password'=>['required',Password::min(6),'confirmed'],
             
        ]);
        $user = User::create($validated);
        Auth::login($user);

        return redirect('/');
    }
}
