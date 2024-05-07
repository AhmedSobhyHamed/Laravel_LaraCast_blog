<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('registers.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name'     => ['required', 'min:3', 'max:255'],
            'username' => ['required', 'min:3', 'max:255',          'unique:users,username'],
            'email'    => ['required',          'max:255', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'max:255'],
        ]);

        $user = User::create([
            'name'     => $validate['name'],
            'username' => $validate['username'],
            'email'    => $validate['email'],
            'password' => $validate['password']
        ]);

        auth()->login($user);

        return redirect('/posts')
            ->with('popup message', 'user have been successfuly registered');
    }
}
