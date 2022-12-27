<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenPendukung extends Model
{
    use HasFactory;
    protected $table = 'dokumen_pendukung';
    protected $fillable = [
        'file_dokumen_pendukung',
        'nama_dokumen',
        'dokumen_akta_id'
        
    ];
    public function dokumenAkta(){
        return $this->belongsTo(DokumenAkta::class,'dokumen_akta_id');
    }
}
