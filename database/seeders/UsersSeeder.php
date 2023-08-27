<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    //passwordバリデーションルールを変えたのでseedも変更が必要
    public function run(): void
    {
        for ($i=1; $i <5 ; $i++) { 

            for ($j=1; $j <6 ; $j++) { 
                
                DB::table('users')->insert([
                    [
                        // 'name' => fake()->name(),
                        // 'email' => fake()->unique()->safeEmail(),
                        // 'email_verified_at' => now(),
                        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        // 'remember_token' => Str::random(10),
        
                        'name' => '小竹プログラム設計指導員'.$j,
                        'email' => 'kotake_program_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 1,  //プログラム設計科
                        'school_id' => 1,     //小竹高等技術専門校
                    ],
                    [
                        'name' => '小竹自動車整備指導員'.$j,
                        'email' => 'kotake_maintenance_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 2,  //自動車整備科
                        'school_id' => 1,     //小竹高等技術専門校
                    ],
                    [
                        'name' => '小竹建築指導員'.$j,
                        'email' => 'kotake_architecture_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 3,  //建築科
                        'school_id' => 1,     //小竹高等技術専門校
                    ],
                    [
                        'name' => '小竹介護指導員'.$j,
                        'email' => 'kotake_nursing_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 4,  //建築科
                        'school_id' => 1,     //小竹高等技術専門校
                    ],
                ]);

                DB::table('users')->insert([
                    [
                        'name' => '福岡プログラム設計指導員'.$j,
                        'email' => 'fukuoka_program_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 1,  //プログラム設計科
                        'school_id' => 2,     //福岡高等技術専門校
                    ],
                    [
                        'name' => '福岡自動車整備指導員'.$j,
                        'email' => 'fukuoka_maintenance_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 2,  //自動車整備科
                        'school_id' => 2,     //福岡高等技術専門校
                    ],
                    [
                        'name' => '福岡建築指導員'.$j,
                        'email' => 'fukuoka_architecture_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 3,  //建築科
                        'school_id' => 2,     //福岡高等技術専門校
                    ],
                    [
                        'name' => '福岡介護指導員'.$j,
                        'email' => 'fukuoka_nursing_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 4,  //建築科
                        'school_id' => 2,     //福岡高等技術専門校
                    ],
                ]);

                DB::table('users')->insert([
                    [
                        'name' => '久留米プログラム設計指導員'.$j,
                        'email' => 'kurume_program_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 1,  //プログラム設計科
                        'school_id' => 3,     //久留米高等技術専門校
                    ],
                    [
                        'name' => '久留米自動車整備指導員'.$j,
                        'email' => 'kurume_maintenance_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 2,  //自動車整備科
                        'school_id' => 3,     //久留米高等技術専門校
                    ],
                    [
                        'name' => '久留米建築指導員'.$j,
                        'email' => 'kurume_architecture_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 3,  //建築科
                        'school_id' => 3,     //久留米高等技術専門校
                    ],
                    [
                        'name' => '久留米介護指導員'.$j,
                        'email' => 'kurume_nursing_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 4,  //建築科
                        'school_id' => 3,     //久留米高等技術専門校
                    ],
                ]);

                DB::table('users')->insert([
                    [
                        'name' => '田川プログラム設計指導員'.$j,
                        'email' => 'tagawa_program_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 1,  //プログラム設計科
                        'school_id' => 4,     //田川高等技術専門校
                    ],
                    [
                        'name' => '田川自動車整備指導員'.$j,
                        'email' => 'tagawa_maintenance_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 2,  //自動車整備科
                        'school_id' => 4,     //田川高等技術専門校
                    ],
                    [
                        'name' => '田川建築指導員'.$j,
                        'email' => 'tagawa_architecture_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 3,  //建築科
                        'school_id' => 4,     //田川高等技術専門校
                    ],
                    [
                        'name' => '田川介護指導員'.$j,
                        'email' => 'tagawa_nursing_instructor_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 2,   //指導員ユーザ
                        'classroom_id' => 4,  //建築科
                        'school_id' => 4,     //田川高等技術専門校
                    ],
                ]);

                DB::table('users')->insert([
                    [
                        // 'name' => fake()->name(),
                        // 'email' => fake()->unique()->safeEmail(),
                        // 'email_verified_at' => now(),
                        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        // 'remember_token' => Str::random(10),
        
                        'name' => '小竹プログラム設計生徒'.$j,
                        'email' => 'kotake_program_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 1,  //プログラム設計科
                        'school_id' => 1,     //小竹高等技術専門校
                    ],
                    [
                        'name' => '小竹自動車整備生徒'.$j,
                        'email' => 'kotake_maintenance_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 2,  //自動車整備科
                        'school_id' => 1,     //小竹高等技術専門校
                    ],
                    [
                        'name' => '小竹建築生徒'.$j,
                        'email' => 'kotake_architecture_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 3,  //建築科
                        'school_id' => 1,     //小竹高等技術専門校
                    ],
                    [
                        'name' => '小竹介護生徒'.$j,
                        'email' => 'kotake_nursing_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 4,  //建築科
                        'school_id' => 1,     //小竹高等技術専門校
                    ],
                ]);

                DB::table('users')->insert([
                    [
                        'name' => '福岡プログラム設計生徒'.$j,
                        'email' => 'fukuoka_program_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 1,  //プログラム設計科
                        'school_id' => 2,     //福岡高等技術専門校
                    ],
                    [
                        'name' => '福岡自動車整備生徒'.$j,
                        'email' => 'fukuoka_maintenance_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 2,  //自動車整備科
                        'school_id' => 2,     //福岡高等技術専門校
                    ],
                    [
                        'name' => '福岡建築生徒'.$j,
                        'email' => 'fukuoka_architecture_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 3,  //建築科
                        'school_id' => 2,     //福岡高等技術専門校
                    ],
                    [
                        'name' => '福岡介護生徒'.$j,
                        'email' => 'fukuoka_nursing_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 4,  //建築科
                        'school_id' => 2,     //福岡高等技術専門校
                    ],
                ]);

                DB::table('users')->insert([
                    [
                        'name' => '久留米プログラム設計生徒'.$j,
                        'email' => 'kurume_program_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 1,  //プログラム設計科
                        'school_id' => 3,     //久留米高等技術専門校
                    ],
                    [
                        'name' => '久留米自動車整備生徒'.$j,
                        'email' => 'kurume_maintenance_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 2,  //自動車整備科
                        'school_id' => 3,     //久留米高等技術専門校
                    ],
                    [
                        'name' => '久留米建築生徒'.$j,
                        'email' => 'kurume_architecture_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 3,  //建築科
                        'school_id' => 3,     //久留米高等技術専門校
                    ],
                    [
                        'name' => '久留米介護生徒'.$j,
                        'email' => 'kurume_nursing_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 4,  //建築科
                        'school_id' => 3,     //久留米高等技術専門校
                    ],
                ]);

                DB::table('users')->insert([
                    [
                        'name' => '田川プログラム設計生徒'.$j,
                        'email' => 'tagawa_program_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 1,  //プログラム設計科
                        'school_id' => 4,     //田川高等技術専門校
                    ],
                    [
                        'name' => '田川自動車整備生徒'.$j,
                        'email' => 'tagawa_maintenance_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 2,  //自動車整備科
                        'school_id' => 4,     //田川高等技術専門校
                    ],
                    [
                        'name' => '田川建築生徒'.$j,
                        'email' => 'tagawa_architecture_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 3,  //建築科
                        'school_id' => 4,     //田川高等技術専門校
                    ],
                    [
                        'name' => '田川介護生徒'.$j,
                        'email' => 'tagawa_nursing_student_'.$j.'@email.com',
                        'email_verified_at' => now(),
                        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                        'remember_token' => Str::random(10),
        
                        'position_id' => 1,   //生徒ユーザ
                        'classroom_id' => 4,  //建築科
                        'school_id' => 4,     //田川高等技術専門校
                    ],
                ]);
            }

        }

    }
}
