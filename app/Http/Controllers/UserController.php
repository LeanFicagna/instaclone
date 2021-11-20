<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function login(Request $request) {
        // TODO sistema de login
        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)) {
            return redirect()->route('home');
        }
        return redirect()->back();
    }


    public function register(Request $request) {
        $user = new User();
        $user->email = $request['email'];
        $user->name = $request['name'];
        $user->user = $request['user'];
        $user->password = bcrypt($request['password']);

        $user->save();
        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }

}
