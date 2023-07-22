<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('classrooms')->insert([
            ['name' => 'プログラム設計科','created_at' => now(),'updated_at' => now()],
            ['name' => '自動車整備科','created_at' => now(),'updated_at' => now()],
            ['name' => '建築科','created_at' => now(),'updated_at' => now()],
            ['name' => '介護科','created_at' => now(),'updated_at' => now()],
        ]);
    }
}
