<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index() {

        return view('login');
    }

    function login(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ],[
            'email.required' => 'Email harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $infologin =[
            'email' => $request->email,
            'password' => $request->password,
        ];
        
        if(Auth::attempt($infologin)) {
            if(auth::user()->role == 'admin') {
                return redirect('home/admin');
            }
            if(auth::user()->role == 'siswa') {
                return redirect('home/siswa');
            }
            return redirect('/home');
        } else {
            
            return redirect('')->withErrors('Email atau password yang dimasukkan tidak sesuai')->withInput();
            
        }
    }

    function logout() {
        Auth::logout();
        return redirect('');
    }   
}
