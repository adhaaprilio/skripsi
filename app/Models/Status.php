<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\DokumenAkta;

class Status extends Model
{
    use HasFactory;
    protected $table = 'status';
    protected $fillable = [
        'nama_status',
             
    ];
    public function dokumenAkta(){
        return $this->hasMany(DokumenAkta::class,'status_id');
    }
}
