<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Status;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('status')->insert([
            'id' => 1,
            'nama_status' => 'Draft akta sudah dibuat, menunggu minuta akta',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('status')->insert([
            'id' => 2,
            'nama_status' => 'Minuta akta sudah diupload',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('status')->insert([
            'id' => 3,
            'nama_status' => 'Minuta akta sudah disetujui',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('status')->insert([
            'id' => 4,
            'nama_status' => 'Salinan akta sudah di upload',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('status')->insert([
            'id' => 5,
            'nama_status' => 'Salinan akta sudah disetujui',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('status')->insert([
            'id' => 6,
            'nama_status' => 'Revisi salinan akta',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('status')->insert([
            'id' => 7,
            'nama_status' => 'Revisi salinan akta sudah di upload',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        
        
    }
}
