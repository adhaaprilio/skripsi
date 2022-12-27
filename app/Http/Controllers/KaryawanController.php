<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\DokumenAkta;

class KaryawanController extends Controller
{
    public function listKaryawan()
    {
        $karyawan = User::where('isKaryawan','0')->get();
        return view('karyawan.listKaryawan', compact('karyawan'));
    }
    public function detailKaryawan($id)
    {
        $karyawan = User::where('id',$id)->first();
        //$profileKaryawan = Profile::where('user_id',$id)->first();
        $dokumenAkta = DokumenAkta::where('user_id',$id)->get();
        //if($profileKaryawan==null){
            return view('karyawan.detailKaryawanBaru', compact('karyawan','dokumenAkta'));
        //}
        //else{
          //  return view('karyawan.detailKaryawan', compact('karyawan','profileKaryawan'));
        //}
        
    }
    public function profile()
    {
        $karyawan = User::where('id', auth()->user()->id)->first();
       
        
            return view('karyawan.profileBaru', compact('karyawan'));
       
    }
    public function editProfile()
    {
        $karyawan = User::where('id', auth()->user()->id)->first();
        
        
            return view('karyawan.editProfile', compact('karyawan'));
       
    }
    public function updateProfile(Request $request)
    {
        //
        $karyawan = User::where('id', auth()->user()->id)
            ->update([
                'nama_karyawan' => $request->username,
                'username' => $request->username,
                'email_karyawan' => $request->email_karyawan,
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp
                
            ]);
        
        return redirect('/profile');
    }
}
