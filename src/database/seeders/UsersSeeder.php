<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Seed the application's users with the practice password.
     */
    public function run(): void
    {
        User::query()->delete();

        User::factory(200)->create([
            'password' => '12345678',
        ]);
    }
}
