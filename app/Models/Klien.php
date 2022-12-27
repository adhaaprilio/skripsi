<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klien extends Model
{
    use HasFactory;
    protected $table = 'klien';
    protected $fillable = [
        'nama_klien',
        'nama_perusahaan',
        'nomor_hp',
        'email',
        'alamat',
        
    ];

    public function profile(){
        return $this->hasMany(DokumenAkta::class,'klien_id');
    }
}
