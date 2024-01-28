<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use App\Models\User;


use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function show() {
        return Inertia::render('Register', [
        ]);
    }

    public function register(Request $request) {
        $credential = $request->validate([
            'email' => 'required|email' ,
            'username' => 'required|min:3|max:255' ,
            'password' => 'required|min:3|max:16|confirmed',
            'name' => 'required|min:5|max:255' ,
        ]);

        $credential['profile_url'] = '/profile.jpeg';

        $user = User::create($credential);

        return to_route('login');
        
    }
}
