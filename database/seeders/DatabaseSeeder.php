<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */

    public function run(): void
    {
        // Crea un usuario específico con ID 1
        User::factory()->create([
            'name' => 'Usuario Test',
            'email' => 'test@example.com',
        ]);
    }
}
