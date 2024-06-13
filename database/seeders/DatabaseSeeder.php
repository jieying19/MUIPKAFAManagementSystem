<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


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

        DB::table('ManageActivityEntity')->insert([
            'id' => '1',
            'activity_name' => 'Trip to Masjid Zahir',
            'activity_desc' => 'Going on a trip',
            'activity_dateTime' => '2024-06-13 14:30:00',
            'activity_studentAge' => '12',
            'activity_studentNum' => '6',
            'activity_comment' => ''
        ]);
    }
}