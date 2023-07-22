<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schools')->insert([
            ['name' => '小竹高等技術専門校','created_at' => now(),'updated_at' => now()],
            ['name' => '福岡高等技術専門校','created_at' => now(),'updated_at' => now()],
            ['name' => '久留米高等技術専門校','created_at' => now(),'updated_at' => now()],
            ['name' => '田川高等技術専門校','created_at' => now(),'updated_at' => now()],
        ]);

    }
}
