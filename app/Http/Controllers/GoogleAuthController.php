<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleAuthController extends Controller
{
    /**
     * Redirect the user to the Google authentication page.
     */
    public function redirect()
    {
        // Check if Google OAuth is configured
        if (empty(config('services.google.client_id')) || empty(config('services.google.client_secret'))) {
            return redirect('/login')->with('error', 'Google OAuth is not configured. Please contact the administrator.');
        }
        
        return Socialite::driver('google')->redirect();
    }

    /**
     * Obtain the user information from Google.
     */
    public function callback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            
            $user = User::where('google_id', $googleUser->getId())->first();
            
            if (!$user) {
                $user = User::where('email', $googleUser->getEmail())->first();
                
                if ($user) {
                    $user->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                } else {
                    $name = explode(' ', $googleUser->getName(), 2);
                    $user = User::create([
                        'first_name' => $name[0] ?? 'User',
                        'last_name' => $name[1] ?? '',
                        'email' => $googleUser->getEmail(),
                        'google_id' => $googleUser->getId(),
                        'password' => null, // No password for Google users
                    ]);
                }
            }
            
            Auth::login($user);
            
            return redirect('/');
        } catch (\Exception $e) {
            return redirect('/login')->with('error', 'Unable to login with Google. Please try again.');
        }
    }
}
