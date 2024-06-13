<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subjects = [
            [
                'subjectName' => 'Bidang Al Quran',
                'subjectExamDate' => '2024-01-11',
            ],
            [
                'subjectName' => 'Sirah',
                'subjectExamDate' => '2024-01-14',
            ],
            [
                'subjectName' => 'Jawi Dan Khat',
                'subjectExamDate' => '2024-01-16',
            ],
            [
                'subjectName' => 'Penghayatan Cara Hidup Islam',
                'subjectExamDate' => '2024-01-18',
            ],
            [
                'subjectName' => 'Ulum Syariah',
                'subjectExamDate' => '2024-01-19',
            ],
        ];

        foreach ($subjects as $subject) {
            DB::table('subjects')->insert($subject);
        }
    }
}
