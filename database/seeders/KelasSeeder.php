<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    \App\Models\Kelas::create(['class_name' => 'X IPA']);
    \App\Models\Kelas::create(['class_name' => 'X TKJ']);
    \App\Models\Kelas::create(['class_name' => 'XI IPA']);
    // Tambahkan kelas lainnya
}
}
