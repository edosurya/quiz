<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::factory()->admin()->create();
        User::create([
            'name' => 'Admin',
            'email' => 'admin@test.test',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'is_admin' => 1,
            'remember_token' => Str::random(10),
        ]);
    }
}
