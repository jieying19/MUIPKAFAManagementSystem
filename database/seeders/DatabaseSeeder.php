<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            UserSeeder::class,
            PaymentSeeder::class,
            AnnouncementSeeder::class,
        ]);

        DB::table('students')->insert([
            'student_name' => 'Taib',
            'student_age' => '12',
            'student_gender' => 'male',
            'student_birthRegNo' => 'jhgjhg',
        'student_ic' => 'jhgjhg',
        'student_health' => 'jhgjhg',
        'student_birthPlace' => 'jhgjhg',
        'student_homeAddress' => 'jhgjhg',
        'student_regStatus' => 'Approved',
        'id' => '4'
        ]);
    }
}