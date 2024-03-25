<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function edit()
    {
        return view('user.edit');
    }
    public function update($id)
    {
        // Validate the form inputs
        $user = User::findOrfail($id);

        request()->validate([
            'name' => 'required|string|max:255',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if (request()->hasFile('profile_image')) {

            $imagePath = request()->file('profile_image')->store('profile_images', 'public');

            $user->update([
                'name' => request()->name,
                'profileImage' => $imagePath
            ]);

            return redirect('/');
        } else {
            return back()->with('error', 'Failed to update profile.');
        }


    }
}
