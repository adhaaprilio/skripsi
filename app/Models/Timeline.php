<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    protected $table = 'timeline';
    protected $fillable = [
        'nama_timeline',
        'waktu',
        'dokumen_akta_id'
        
    ];
    public function dokumenAkta(){
        return $this->belongsTo(DokumenAkta::class,'dokumen_akta_id');
    }
}
