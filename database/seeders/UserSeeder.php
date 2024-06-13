<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => "KAFA",
            'matric_id' => "CB19000",
            'phone_num' => "0123456789",
            'role' => "KAFAadmin",
            'email' => "kafa@test",
            'password' => bcrypt("test"), // password
        ]);

        User::factory()->create([
            'name' => "MUIP",
            'matric_id' => "CB19000",
            'phone_num' => "0123456789",
            'role' => "MUIPadmin",
            'email' => "muip@test",
            'password' => bcrypt("test"), // password
        ]);
        
        User::factory()->create([
            'name' => "Wan",
            'matric_id' => "CB21042",
            'phone_num' => "0123456789",
            'role' => "parent",
            'email' => "wan@test",
            'password' => bcrypt("test"), // password
        ]);

        User::factory()->create([
            'name' => "Junta",
            'matric_id' => "CB21001",
            'phone_num' => "0123456789",
            'role' => "parent",
            'email' => "junta@test",
            'password' => bcrypt("test"), // password
        ]);

        User::factory()->create([
            'name' => "Abby",
            'matric_id' => "CB21002",
            'phone_num' => "0123456789",
            'role' => "parent",
            'email' => "abby@test",
            'password' => bcrypt("test"), // password
        ]);

        User::factory()->create([
            'name' => "Jie Ying",
            'matric_id' => "CB21003",
            'phone_num' => "0123456789",
            'role' => "parent",
            'email' => "jie@test",
            'password' => bcrypt("test"), // password
        ]);
    }
}
