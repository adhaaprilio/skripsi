<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use DB;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(Request $request)
    {
    	$validatedData = $request->validate([  
            'nama_karyawan' => 'required|unique:App\Models\User,nama_karyawan|max:255',
            'username' => 'required|unique:App\Models\User,username',
            'email_karyawan' => 'required|email:rfc,dns',
            'password' => 'required|min:8',
        ]);
        $validatedData['password'] = hash::make($validatedData['password']);
        User::create($validatedData);
                
        if(Auth::attempt($request->only('username', 'password'))){
            $request->session()->regenerate();
            Alert::success('Selamat', 'Akun anda telah terdaftar!')->autoClose(3000);
            return redirect()->intended('/new_dashboard');
        }
    	
	}
}
