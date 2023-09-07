<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        for ($i=1; $i <3 ; $i++) { 

            DB::table('users')->insert([
                [
                    // 'name' => fake()->name(),
                    // 'email' => fake()->unique()->safeEmail(),
                    // 'email_verified_at' => now(),
                    // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    // 'remember_token' => Str::random(10),
    
                    'name' => '小竹プログラム設計指導員'.$i,
                    'email' => 'kotake_program_instructor_'.$i.'@email.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
    
                    'position_id' => 2,   //指導員ユーザ
                    'classroom_id' => 1,  //プログラム設計科
                    'school_id' => 1,     //小竹高等技術専門校
                ],
                [
                    'name' => '小竹自動車整備指導員'.$i,
                    'email' => 'kotake_maintenance_instructor_'.$i.'@email.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
    
                    'position_id' => 2,   //指導員ユーザ
                    'classroom_id' => 2,  //自動車整備科
                    'school_id' => 1,     //小竹高等技術専門校
                ],
                [
                    'name' => '小竹建築指導員'.$i,
                    'email' => 'kotake_architecture_instructor_'.$i.'@email.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
    
                    'position_id' => 2,   //指導員ユーザ
                    'classroom_id' => 3,  //建築科
                    'school_id' => 1,     //小竹高等技術専門校
                ],
                [
                    'name' => '小竹介護指導員'.$i,
                    'email' => 'kotake_nursing_instructor_'.$i.'@email.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),
    
                    'position_id' => 2,   //指導員ユーザ
                    'classroom_id' => 4,  //建築科
                    'school_id' => 1,     //小竹高等技術専門校
                ],
            ]);


            
        }

        for ($i=1; $i <4 ; $i++) { 
        
            DB::table('users')->insert([
                [
                    // 'name' => fake()->name(),
                    // 'email' => fake()->unique()->safeEmail(),
                    // 'email_verified_at' => now(),
                    // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    // 'remember_token' => Str::random(10),

                    'name' => '小竹プログラム設計生徒'.$i,
                    'email' => 'kotake_program_student_'.$i.'@email.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),

                    'position_id' => 1,   //生徒ユーザ
                    'classroom_id' => 1,  //プログラム設計科
                    'school_id' => 1,     //小竹高等技術専門校
                ],
                [
                    'name' => '小竹自動車整備生徒'.$i,
                    'email' => 'kotake_maintenance_student_'.$i.'@email.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),

                    'position_id' => 1,   //生徒ユーザ
                    'classroom_id' => 2,  //自動車整備科
                    'school_id' => 1,     //小竹高等技術専門校
                ],
                [
                    'name' => '小竹建築生徒'.$i,
                    'email' => 'kotake_architecture_student_'.$i.'@email.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),

                    'position_id' => 1,   //生徒ユーザ
                    'classroom_id' => 3,  //建築科
                    'school_id' => 1,     //小竹高等技術専門校
                ],
                [
                    'name' => '小竹介護生徒'.$i,
                    'email' => 'kotake_nursing_student_'.$i.'@email.com',
                    'email_verified_at' => now(),
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => Str::random(10),

                    'position_id' => 1,   //生徒ユーザ
                    'classroom_id' => 4,  //介護科
                    'school_id' => 1,     //小竹高等技術専門校
                ],
            ]);

        }
    }
}
