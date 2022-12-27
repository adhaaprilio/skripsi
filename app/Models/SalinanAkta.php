<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalinanAkta extends Model
{
    use HasFactory;
    protected $table = 'salinan_akta';
    protected $fillable = [
        'file_salinan_akta',
        'keterangan',
        'dokumen_akta_id'                
    ];
    public function dokumenAkta(){
        return $this->belongsTo(DokumenAkta::class,'dokumen_akta_id');
    }
}
