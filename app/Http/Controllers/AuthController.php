<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginHandler(Request $request)
    {
        if (\Auth::attempt([
            'username' => $request->username,
            'password' => $request->password,
        ])) {

            return redirect('/home');
        }

        //$users = DB::table('users')->get();
        //var_dump($users);
        return redirect('/');
    }
}