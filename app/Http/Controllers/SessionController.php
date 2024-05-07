<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create()
    {
        return view('session.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'email'   => ['required', 'max:255'],
            'password' => ['required', 'max:255'],
        ]);

        if (!auth()->attempt(['email' => $validate['email'], 'password' => $validate['password']]))
            throw ValidationException::withMessages(['login fail' => 'email or password may not correct']);

        session()->regenerate();
        return redirect(route('posts-index'))->with('popup message', 'welcome back !');

        // return back()
        //     ->withInput()
        //     ->withErrors(['login fail' => 'email or password may not correct']);
    }

    public function destroy()
    {
        auth()->logout();
        return redirect(RouteServiceProvider::HOME)->with('popup message', 'good bye');
    }
}
