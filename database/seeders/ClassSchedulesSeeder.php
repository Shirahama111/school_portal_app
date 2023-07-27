<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i=1; $i < 11; $i++) { 

            $random = mt_rand(1, 9);
            
            DB::table('class_schedules')->insert([
                'title' => 'タイトル'.$i,
                'description' => '予定の詳細'.$i.'です' ,
                'start_date' => now()->addDays($i*$random)->format('Y-m-d'),
                'end_date' => now()->addDays($i*$random+$random)->format('Y-m-d'),
                'user_id' => 1,
                'school_id' => 1,
                'classroom_id' => 1,
            ]);

        }

    }
}
