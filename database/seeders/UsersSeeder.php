<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                // 'name' => fake()->name(),
                // 'email' => fake()->unique()->safeEmail(),
                // 'email_verified_at' => now(),
                // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                // 'remember_token' => Str::random(10),

                'name' => '指導員',
                'email' => 'shidouin@email.com',
                'email_verified_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'remember_token' => Str::random(10),

                'position_id' => 2,   //指導員ユーザ
                'classroom_id' => 1,  //プログラム設計科
                'school_id' => 1,     //小竹高等技術専門校
            ],
            
        ]);

    }
}
