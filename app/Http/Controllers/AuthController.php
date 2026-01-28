<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login(Request $request)
    {
        $user = User::where('name', $request->name)->first();
        //dd($user);

        if (!$user) {
            return back()->with('error', 'Usuário não encontrado');
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->with('error', 'Senha incorreta');
        }

        Auth::login($user);

        return redirect()->route('dashboard');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

}
