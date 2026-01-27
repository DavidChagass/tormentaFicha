<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'a
ndre',
            'password' => Hash::make('123456'),
        ]);

        User::factory()->create([
            'name' => 'david',
            'password' => Hash::make('tomasmaneiro'),
        ]);

        User::factory()->create([
            'name' => 'fernando',
            'password' => Hash::make('1aaaa6'),
        ]);

        User::factory()->create([
            'name' => 'ramon',
            'password' => Hash::make('nomaximo20caracter'),
        ]);

        User::factory()->create([
            'name' => 'tomas',
            'password' => Hash::make('d4vidgoat'),
        ]);

        User::factory()->create([
            'name' => 'yoyozilton',
            'password' => Hash::make('123456'),
        ]);
    }
}
