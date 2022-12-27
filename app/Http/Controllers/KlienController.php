<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Klien;
use App\Models\DokumenAkta;
use Illuminate\Support\Facades\Validator;

class KlienController extends Controller
{
    public function listKlien()
    {
        //$data = DokumenAkta::join('klien', 'klien.id','=','dokumen_akta.klien_id')
        //->get(['klien.id','klien.nama_klien','dokumen_akta.tanggal_mulai','dokumen_akta.klien_id']);
        //
        
        $klien = Klien::all();
        
       // $jumlahOrder = DokumenAkta::where('klien_id',$klien)->count();
        
        //$jumlahOrder = DokumenAkta::all();
        return view('klien.listKlien', compact('klien'));
    }
    public function tambahKlien()
    {
        return view('klien.tambahKlien');
    }
    public function store(Request $request)
    {
        //$validated = $request->validate([
        //    'nama_klien' => 'required|unique:Klien|max:255',
        //]);
        
        $klien = new Klien;
        $klien->nama_klien = $request->nama_klien;
        $klien->nama_perusahaan = $request -> nama_perusahaan;
        $klien->nomor_hp = $request -> nomor_hp;
        $klien->email = $request -> email;
        $klien->alamat = $request -> alamat;
        $klien->save();

        return redirect('/listKlien')->with('success', 'Pertanyaan berhasil disimpan');
    }
    public function show($id)
    {
        $klien = Klien::where('id',$id)->first();
        $dokumenAkta = DokumenAkta::where('klien_id',$id)->get();
        return view('klien.detailKlien', compact('klien','dokumenAkta'));
    }
    public function edit($id)
    {
        $klien = Klien::where('id',$id)->first();
        return view('klien.editKlien', compact('klien'));
    }
    public function update(Request $request, $id)
    {
        //
        $klien = Klien::where('id', $id)
            ->update([
                'nama_klien' => $request->nama_klien,
                'nama_perusahaan' => $request->nama_perusahaan,
                'nomor_hp' => $request->nomor_hp,
                'email' => $request->email,
                'alamat' => $request->alamat
            ]);
        return redirect('detailKlien/'.$id);
    }
    public function destroy($id)
    {
        //
        DokumenAkta::where('klien_id', $id)->delete();
        $klien = Klien::find($id);
        $klien->delete();
        return redirect('/listKlien')->with('success', 'Pertanyaan Berhasil Dihapus');
    }
}
