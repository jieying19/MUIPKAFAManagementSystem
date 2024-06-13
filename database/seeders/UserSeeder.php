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
            'phone_num' => "0123456789",
            'role' => "KAFAadmin",
            'email' => "kafa@test",
            'password' => bcrypt("test"), // password
        ]);

        User::factory()->create([
            'name' => "MUIP",
            'phone_num' => "0123456789",
            'role' => "MUIPadmin",
            'email' => "muip@test",
            'password' => bcrypt("test"), // password
        ]);
        
        User::factory()->create([
            'name' => "Wan",
            'phone_num' => "0123456789",
            'role' => "parent",
            'email' => "wan@test",
            'password' => bcrypt("test"), // password
        ]);

        User::factory()->create([
            'name' => "Junta",
            'phone_num' => "0123456789",
            'role' => "parent",
            'email' => "junta@test",
            'password' => bcrypt("test"), // password
        ]);

        User::factory()->create([
            'name' => "Abby",
            'phone_num' => "0123456789",
            'role' => "parent",
            'email' => "abby@test",
            'password' => bcrypt("test"), // password
        ]);

        User::factory()->create([
            'name' => "Jie Ying",
            'phone_num' => "0123456789",
            'role' => "parent",
            'email' => "jie@test",
            'password' => bcrypt("test"), // password
        ]);
    }
}
