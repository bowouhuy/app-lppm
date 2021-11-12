<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Session;

class AuthController extends Controller
{
    public function login() {
        return view('login');
    }

    public function loginUser(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'username'  => $request->input('username'),
            'password'  => $request->input('password'),
        ];

        Auth::attempt($data);
        if (Auth::check()) { 
            //Login Success
            Session::flash('success', 'Berhasil Login');
            if (Auth::user()->role === 'dosen'){
                return redirect('/dosen');
            } else if (Auth::user()->role === 'lppm'){
                return redirect('/lppm');
            } else if (Auth::user()->role === 'reviewer'){
                return redirect('/reviewer');
            } else {
                return redirect('/');
            }
        } else { 
            //Login Fail
            Session::flash('error', 'Email atau password salah');
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect('/');
    }
}
