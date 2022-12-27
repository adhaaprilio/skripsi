<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Klien;
use App\Models\DokumenAkta;
use App\Models\Status;
use App\Models\MinutaAkta;
use App\Models\SalinanAkta;
use App\Models\DokumenPendukung;
use App\Models\Timeline;

class DokumenAktaController extends Controller
{
    //public function listAkta()
    //{
     //   $dokumenAkta = DokumenAkta::all();
      //  $klien = Klien::all();
      //  $karyawan = User::all();
       // return view('dokumenAkta.listDokumenAkta',compact('klien','dokumenAkta','karyawan'));
    //}
    public function listAkta()
    {
        $data = DokumenAkta::join('users', 'users.id','=','dokumen_akta.user_id')
        ->join('klien','klien.id','=','dokumen_akta.klien_id')
        ->join('status','status.id','=','dokumen_akta.status_id')
        ->get(['dokumen_akta.id','dokumen_akta.judul_akta','klien.nama_klien','users.nama_karyawan','dokumen_akta.tanggal_mulai'
        ,'status.nama_status']);
        //$dokumenAkta = DokumenAkta::all();
        //$dokumenAkta = DokumenAkta::all();
        //$klien = Klien::where('id',$id)->first();
        //$user = User::where('id',$id)->first();
        //$status = Status::all()->last();
        //$terbaru = $status->last();
        //return view('dokumenAkta.listDokumenAkta',compact('klien','dokumenAkta','user','status'));
        //}));
        //$terbaru = $data->nama_status->last();      
        return view('dokumenAkta.listDokumenAkta',compact('data'));
    }
    public function tambahAkta()
    {
        $klien = Klien::all();
        return view('dokumenAkta.tambahDokumenAkta', compact('klien'));
    }
    public function store(request $request)
    {
        $dokumenAkta = new DokumenAkta;
        $dokumenAkta->klien_id = $request -> klien_id;
        $dokumenAkta->judul_akta = $request -> judul_akta;
        $dokumenAkta->jenis_akta = $request -> jenis_akta;
        $dokumenAkta->nomor_akta = $request -> nomor_akta;
        $dokumenAkta->tanggal_mulai = $request -> tanggal_mulai;
        $dokumenAkta->tanggal_selesai = $request -> tanggal_selesai;
        $dokumenAkta->user_id = auth()->user()->id;
        $dokumenAkta->status_id = 1;
        $dokumenAkta->save();

        $timeline = new Timeline;
        $timeline->nama_timeline = 'Draft akta sudah dibuat, menunggu minuta akta';
        $timeline->dokumen_akta_id = $dokumenAkta->id;
        $timeline->created_at = now();
        $timeline->save();

        return redirect('/listAkta')->with('success', 'Pertanyaan berhasil disimpan');
    }
    public function detailAkta($id)
    {
        $dokumenAkta = DokumenAkta::where('id',$id)->first();
        $klien = Klien::all();
        $user = User::all();
        $status = Status::where('id',$dokumenAkta->status_id)->first();
        $timeline = Timeline::where('dokumen_akta_id',$id)->get();
        $minutaAkta = MinutaAkta::where('dokumen_akta_id',$id)->get();
        $salinanAkta = SalinanAkta::where('dokumen_akta_id',$id)->get();
        $dokumenPendukung = DokumenPendukung::where('dokumen_akta_id',$id)->get();
        $terbaru = $timeline->last();
        $minutaTerbaru = $minutaAkta->last();
        $salinanTerbaru = $salinanAkta->last();
        
        //$data = DokumenAkta::join('users', 'users.id','=','dokumen_akta.user_id')
        //->join('klien','klien.id','=','dokumen_akta.klien_id')
        //->join('status','dokumen_akta.id','=','status.dokumen_akta_id')
        //->where('dokumen_akta.id','=', $id)
        //->orWhere('status.dokumen_akta_id','=',$id)
        //->get()->first();

        
        //return view('dokumenAkta.detailAkta',compact('data'));
        return view('dokumenAkta.detailAkta',compact('dokumenAkta','klien','user','status','timeline','minutaAkta','terbaru','minutaTerbaru'
    ,'salinanTerbaru','dokumenPendukung'));
    }
    public function minutaAkta($id)
    {
        $timeline = new Timeline;
        $timeline->nama_timeline = 'Minuta akta sudah disetujui';
        $timeline->dokumen_akta_id = $id;
        $timeline->created_at = now();
        $timeline->save();

        DokumenAkta::where('id', $id)->update([
            'status_id' => 3
        ]);
        return redirect('detailAkta/'.$id);

    }
    public function tambahMinutaAkta(request $request,$id)
    {
        $minutaAkta = new MinutaAkta;
        $file = $request->file('file_minuta_akta');
 
	    $nama_file = $file->getClientOriginalName();
 
      	$tujuan_upload = 'storage/post-image/';
	    $file->move($tujuan_upload,$nama_file);
        $minutaAkta->file_minuta_akta = $nama_file;
        $minutaAkta->dokumen_akta_id = $id;
        $minutaAkta->save();
        return redirect()->back(); 
    }
    public function uploadMinutaAkta($id)
    {
        $timeline = new Timeline;
        $timeline->nama_timeline = 'Minuta akta sudah di upload';
        $timeline->dokumen_akta_id = $id;
        $timeline->created_at = now();
        $timeline->save();
        
        DokumenAkta::where('id', $id)->update([
            'status_id' => 2
        ]);
        return redirect('detailAkta/'.$id);

    }
    public function uploadSalinanAkta($id)
    {
        $timeline = new Timeline;
        $timeline->nama_timeline = 'Salinan akta sudah di upload';
        $timeline->dokumen_akta_id = $id;
        $timeline->created_at = now();
        $timeline->save();
        DokumenAkta::where('id', $id)->update([
            'status_id' => 4
        ]);
        return redirect('detailAkta/'.$id);

    }
    public function uploadRevisiSalinan($id)
    {
        $timeline = new timeline;
        $timeline->nama_timeline = 'Revisi salinan akta sudah di upload';
        $timeline->dokumen_akta_id = $id;
        $timeline->created_at = now();
        $timeline->save();
        DokumenAkta::where('id', $id)->update([
            'status_id' => 7
        ]);
        return redirect('detailAkta/'.$id);

    }
    public function salinanAkta($id)
    {
        $timeline = new timeline;
        $timeline->nama_timeline = 'Salinan akta telah disetujui';
        $timeline->dokumen_akta_id = $id;
        $timeline->created_at = now();
        $timeline->save();
        DokumenAkta::where('id', $id)->update([
            'status_id' => 5
        ]);
        return redirect('detailAkta/'.$id);

    }
    public function revisiSalinanAkta($id)
    {
        $timeline = new timeline;
        $timeline->nama_timeline = 'Revisi salinan akta';
        $timeline->dokumen_akta_id = $id;
        $timeline->created_at = now();
        $timeline->save();
        DokumenAkta::where('id', $id)->update([
            'status_id' => 6
        ]);
        return redirect('detailAkta/'.$id);

    }
    public function tambahSalinanAkta(request $request,$id)
    {
        $salinanAkta = new SalinanAkta;
        $file = $request->file('file_salinan_akta');
 
	    $nama_file = $file->getClientOriginalName();
 
      	$tujuan_upload = 'storage/post-image/';
	    $file->move($tujuan_upload,$nama_file);
        $salinanAkta->file_salinan_akta = $nama_file;
        $salinanAkta->dokumen_akta_id = $id;
        $salinanAkta->save();
        return redirect()->back(); 
    }
    public function tambahDokumenPendukung(request $request,$id)
    {
        //foreach ($request->file_dokumen_pendukung as $request){
       // $dokumenPendukung = new DokumenPendukung;
       // $file = $request->file('file_dokumen_pendukung');
 
	    //$nama_file = $file->getClientOriginalName();
 
      //	$tujuan_upload = 'storage/post-image/';
	  //  $file->move($tujuan_upload,$nama_file);
      //  $dokumenPendukung->file_dokumen_pendukung = $nama_file;
      //  $dokumenPendukung->file_dokumen_pendukung = $id;
      //  $dokumenPendukung->save();
      //  }
        //return redirect()->back();
        
            $files = $request->file('file_dokumen_pendukung');
            $namas = $request->nama_file;
            foreach($namas as $nama ){
                foreach($files as $file){
                $nama_file = $file->getClientOriginalName();
                $tujuan_upload = 'storage/post-image/';
                $file->move($tujuan_upload,$nama_file);
                $dokumenPendukung = new DokumenPendukung;
                $dokumenPendukung->file_dokumen_pendukung = $nama_file;
                $dokumenPendukung->nama_file = $nama;
                $dokumenPendukung->dokumen_akta_id = $id;
                $dokumenPendukung->save();
                }
        //foreach ($request->file_dokumen_pendukung as $value) {
            //DokumenPendukung::create(
               // [
               //     'file_dokumen_pendukung' => $value,
               //     'dokumen_akta_id' => $id
               // ]
           // );
       // }
            }
            return redirect()->back();
    }
    public function hapusDokumenPendukung($id)
    {
        //
        $klien = DokumenPendukung::find($id);
        $klien->delete();
        return redirect()->back(); 
        
    }
    public function editAkta($id)
    {
        $dokumenAkta = DokumenAkta::where('id', $id)->first();
        
        
            return view('dokumenAkta.editAkta', compact('dokumenAkta'));
    }
    public function updateAkta(Request $request,$id)
    {
        //
        $dokumenAkta = DokumenAkta::where('id', $id)
            ->update([
                'judul_akta' => $request->judul_akta,
                'nomor_akta' => $request->nomor_akta,
                'jenis_akta' => $request->jenis_akta,
                
                
            ]);
        
        return redirect('detailAkta/'.$id);
    }
    public function hasilPencarian()
    {
        return view('dokumenAkta.hasilPencarian');
    }
}
