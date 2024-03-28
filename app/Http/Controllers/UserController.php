<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use function PHPUnit\Framework\isNull;

class UserController extends Controller
{

    public function user()
    {
        return view('user.user', ["user" => Auth::user()]);
    }

    public function show($id)
    {
        $user = User::findOrfail($id);

        return view('user.show', ['user' => $user]);
    }
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
            'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'bio' => 'string|min:5|max:350'
        ]);


        if (request()->hasFile('profile_image')) {

            $imagePath = request()->file('profile_image')->store('profile_images', 'public');

            $user->update([
                'name' => request()->name,
                'profile_image' => $imagePath,
                'bio' => request()->bio
            ]);


            return redirect('/');
        } else {
            $user->update([
                'name' => request()->name,
                'bio' => request()->bio
            ]);
            return redirect('/');
        }
    }
}
