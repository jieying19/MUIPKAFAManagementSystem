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
            'student_birthRegNo' => '123',
            'student_ic' => '12414124',
            'student_health' => 'good',
            'student_birthPlace' => 'Kedah',
            'student_homeAddress' => 'Kedah',
            'student_regStatus' => 'Approved',
            'id' => '4'
        ]);

        DB::table('students')->insert([
            'student_name' => 'Afiq',
            'student_age' => '11',
            'student_gender' => 'male',
            'student_birthRegNo' => '1234',
            'student_ic' => '421412414',
            'student_health' => 'good',
            'student_birthPlace' => 'Perak',
            'student_homeAddress' => 'Perak',
            'student_regStatus' => 'Approved',
            'id' => '4'
        ]);

        DB::table('students')->insert([
            'student_name' => 'Fatimah',
            'student_age' => '14',
            'student_gender' => 'female',
            'student_birthRegNo' => '1214',
            'student_ic' => '442312414',
            'student_health' => 'good',
            'student_birthPlace' => 'Pahang',
            'student_homeAddress' => 'Pahang',
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
            'activity_comment' => 'Budget'
        ]);

        DB::table('ManageActivityEntity')->insert([
            'id' => '2',
            'activity_name' => 'Reading Compettion',
            'activity_desc' => 'Al-Quran reading',
            'activity_dateTime' => '2024-07-11 10:30:00',
            'activity_studentAge' => '14',
            'activity_studentNum' => '1',
            'activity_comment' => ''
        ]);
    }
}