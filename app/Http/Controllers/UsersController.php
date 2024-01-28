<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Validation\Rules\File;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class UsersController extends Controller
{
    public function index()
    {
        return Inertia::render('User', [
            'foo' => 'bar'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => ['required', 'max:50'],
            'last_name' => ['required', 'max:50'],
            'email' => ['required', 'max:50', 'email'],
            'avatar' => ['required', File::image()],
        ]);

         $uploadedFileUrl = Cloudinary::upload($request->file('avatar')->getRealPath())->getSecurePath();
        
        return Inertia::render('User', [
            'foo' => 'bar',
            'avatar' => $uploadedFileUrl,
        ]);
    }
}
