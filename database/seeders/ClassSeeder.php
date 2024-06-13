<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassSeeder extends Seeder
{
    public function run(): void //Seeds data into classes table
  {
    $classes = [
      [
        'studentID' => '100',
        'className' => 'CLASS A',
        'studentName' => 'ABBY',
      ],
      [
        'studentID' => '101',
        'className' => 'CLASS A',
        'studentName' => 'JUN',
      ],
      [
        'studentID' => '102',
        'className' => 'CLASS A',
        'studentName' => 'JIE YING',
      ],
      [
        'studentID' => '103',
        'className' => 'CLASS A',
        'studentName' => 'WAN',
      ],
      [
        'studentID' => '104',
        'className' => 'CLASS A',
        'studentName' => 'NANA',
      ],
      [
        'studentID' => '105',
        'className' => 'CLASS B',
        'studentName' => 'DADA',
      ],
      [
        'studentID' => '106',
        'className' => 'CLASS B',
        'studentName' => 'FAFA',
      ],
      [
        'studentID' => '107',
        'className' => 'CLASS B',
        'studentName' => 'YOYO',
      ],
      [
        'studentID' => '108',
        'className' => 'CLASS B',
        'studentName' => 'ERER',
      ],
      [
        'studentID' => '109',
        'className' => 'CLASS B',
        'studentName' => 'WOWO',
      ],
      [
        'studentID' => '110',
        'className' => 'CLASS B',
        'studentName' => 'POPO',
      ],
      [
        'studentID' => '111',
        'className' => 'CLASS B',
        'studentName' => 'KOKO',
      ],
      [
        'studentID' => '112',
        'className' => 'CLASS B',
        'studentName' => 'LOLO',
      ],
    ];

    foreach ($classes as $classes) {
      DB::table('classes')->insert($classes);
    }
  }
}
