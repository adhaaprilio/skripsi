<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Klien;
use App\Models\DokumenAkta;
use App\Models\Status;
use App\Models\MinutaAkta;
use App\Models\SalinanAkta;
use App\Models\DokumenPendukung;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $jumlahTotal= DokumenAkta::all()->count();
        $jumlahSelesai= DokumenAkta::where('status_id', 5)->count();
        $jumlahBelum= DokumenAkta::where('status_id','!=', 5)->count();
        $dokumenAktaNotaris =DokumenAkta::all();
        
        $dokumenAktaMinuta = DokumenAkta::where('status_id',2)->get();
        $dokumenAktaSalinan = DokumenAkta::where('status_id', 4 )->where('status_id',6)->get();
        $dokumenAkta = DokumenAkta::where('user_id',auth()->user()->id)->get();
        return view('dashboard.dashboard',compact('jumlahTotal','jumlahSelesai','jumlahBelum',
        'dokumenAktaMinuta','dokumenAktaSalinan','dokumenAkta'));
    }
    public function detailAkta($id)
    {
        $dokumenAkta = DokumenAkta::where('id',$id)->first();
        return view('dokumenAkta.detailAkta',compact('dokumenAkta'));
    }
}
