<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationData;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function store(Request $request){
        
        $credentials = $request->validate([
            'email' => 'email|max:255|required',
            'password' => 'required|max:255'
        ]);

        if(! Auth::attempt($credentials)){
            throw ValidationException::withMessages([
                'email'=>'sorry, not correct !'
            ]);
            
        }
        $request->session()->regenerate();
        return redirect('/');

    }

    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
