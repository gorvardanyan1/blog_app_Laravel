<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit()
    {
        return view('user.edit');
    }
    public function update()
    {
        request()->validate([
            'name' => "required|min:3|max:30"
        ]);

        $user = User::findOrfail(Auth::user()->id);
        $user->update([
            'name' => request('name')
        ]);
        return redirect('/');
    }
}
