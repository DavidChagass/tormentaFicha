<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SeederSecundario extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Carlos',
            'password' => Hash::make('Carlos6426'),
        ]);

        User::factory()->create([
            'name' => 'usuarioTestes700',
            'password' => Hash::make('123456'),
        ]);

        User::factory()->create([
            'name' => 'SergioAlgo100',
            'password' => Hash::make('123456'),
        ]);

        User::factory()->create([
            'name' => 'CertezaQueNaoVouUsar',
            'password' => Hash::make('123456'),
        ]);
    }
}
