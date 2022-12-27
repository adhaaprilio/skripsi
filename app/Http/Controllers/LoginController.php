<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use App\Models\User;

class LoginController extends Controller
{
    public function home(){
        return view('home.home');
    }
    public function authenticate(Request $request){
        $credentials = $request->validate([
            'username' => ['required','exists:users'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            Alert::success('Selamat datang di','TanyaDok')->autoClose(3000);
            return redirect()->intended('/new_dashboard');
        }
        return back()->with('loginError', 'Login Gagal');
    }   
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/home');
    }
}
