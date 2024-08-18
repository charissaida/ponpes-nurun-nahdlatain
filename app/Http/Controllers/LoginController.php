<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }
    public function loginProses(Request $request)
    {
        // dd($request->all());
        if (Auth::attempt($request->only('email','password'))){
            return redirect('/home');
        }
        return redirect('admin');
    }
}
