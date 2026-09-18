<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Beat;
use App\Models\License;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Crear tu perfil de productor
        $erik = User::create([
            'name' => 'Prod. Erik',
            'handle' => '@erikmvl',
            'bio' => 'Making hits. Specialized in Boom Bap. Let\'s work.',
            'avatar_url' => 'assets/images/avatar_erik.png',
            'followers_count' => 10500,
            'email' => 'erik@example.com', // Campo requerido por Laravel por defecto
            'password' => bcrypt('password123'),
        ]);

        // 2. Crear las opciones de Licencias
        License::insert([
            [
                'type' => 'Basic Lease (MP3)',
                'price' => 29.99,
                'features' => json_encode(['1 Tagged File', '50,000 Streams', 'Distribute to 1 platform']),
            ],
            [
                'type' => 'Premium Lease (WAV)',
                'price' => 49.99,
                'features' => json_encode(['Untagged WAV', '100,000 Streams', 'Distribute to 3 platforms']),
            ],
            [
                'type' => 'Trackout Lease (Stems)',
                'price' => 149.99,
                'features' => json_encode(['Tagged Stems', 'Unlimited Streams', 'Distribute to All platforms']),
            ]
        ]);

        // 3. Crear tus Beats de Boom Bap
        Beat::create([
            'user_id' => $erik->id,
            'title' => '90s VIBE',
            'genre' => 'Boom Bap',
            'bpm' => 88,
            'price' => 29.99,
            'cover_url' => 'assets/images/beat_1.jpg',
            'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3', // Audio de prueba temporal
        ]);

        Beat::create([
            'user_id' => $erik->id,
            'title' => 'MIDNIGHT CHORDS',
            'genre' => 'Boom Bap',
            'bpm' => 92,
            'price' => 39.99,
            'cover_url' => 'assets/images/beat_2.jpg',
            'audio_url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-2.mp3',
        ]);
    }
}