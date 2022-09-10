<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function loginHandler(Request $request)
    {
        if (\Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {

            return redirect('/home')->with('success', 'Berhasil Login');
        }

        //$users = DB::table('users')->get();
        //var_dump($users);
        return redirect('/')->with('error', 'Username atau Password Salah');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
