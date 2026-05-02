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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

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
