<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'Luigi', 'email' => 'luigi@example.com'],
            ['name' => 'Davide', 'email' => 'davide@example.com'],
            ['name' => 'Valentina', 'email' => 'valentina@example.com'],
        ];

        foreach ($users as $userData) {
            User::factory()->create($userData);
        }

        $tags = [
            'ansia', 'stress', 'paura', 'trauma', 'terapia', 
            'psicologia', 'mindfulness', 'meditazione', 
            'benessere', 'mente', 'corpo', 'depressione'
        ];

        foreach ($tags as $tagName) {
            Tag::create(['name' => $tagName]);
        }
    }
}
