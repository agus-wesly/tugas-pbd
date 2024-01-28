<?php

namespace App\Http\Controllers;
use Inertia\Inertia;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(Request $request) {

       
        return Inertia::render('Profile', [
        ]);
    }

    public function editProfile(Request $request) {
        $validated = $request->validate([
            'email' => 'email' ,
            'username' => 'min:3|max:255' ,
            'name' => 'min:5|max:255',
        ]);

        if($request->file('profile')) {
            $uploadedFileUrl = Cloudinary::upload($request->file('profile')->getRealPath())->getSecurePath();
            $validated['profile_url'] = $uploadedFileUrl;
        }

        $request->user()->update($validated);

        return to_route('profile');
       
    }
}
