<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            'psicoterapia',
            'trauma',
            'traumapsicologico',
            'mindfulness',
            'salutementale',
            'benessere',
            'ansia',
            'stress',
            'crescitaspersonale',
            'consapevolezza',
            'emozioni',
            'guarigione',
            'autostima',
            'meditazione'
        ];

        foreach ($tags as $tagName) {
            Tag::firstOrCreate(['name' => $tagName]);
        }
    }
}
