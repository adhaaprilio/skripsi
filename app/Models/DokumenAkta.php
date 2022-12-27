<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Status;
use App\Models\Timeline;

class DokumenAkta extends Model
{
    use HasFactory;
    
    protected $table = 'dokumen_akta';
    protected $fillable = [
        'nomor_akta',
        'judul_akta',
        'jenis_akta',
        'tanggal_mulai',
        'tanggal_tandatangan',
        'tanggal_selesai',
        'klien_id',
        'user_id',
        'status_id'
    ];

    public function minutaAkta(){
        return $this->hasMany(MinutaAkta::class,'dokumen_akta_id');
    }
    public function salinanAkta(){
        return $this->hasMany(SalinanAkta::class,'dokumen_akta_id');
    }
    public function dokumenPendukung(){
        return $this->hasMany(DokumenPendukung::class,'dokumen_akta_id');
    }
    public function timeline(){
        return $this->hasMany(Timeline::class,'dokumen_akta_id');
    }
    public function status(){
        return $this->belongsTo(Status::class,'status_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function klien(){
        return $this->belongsTo(Klien::class,'klien_id');
    }
}
