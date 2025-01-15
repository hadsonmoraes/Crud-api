<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        if (!User::where('email', 'joão@teste.com')->first()) {
            User::create(
                [
                    'name' => 'João',
                    'email' => 'joão@teste.com',
                    'password' => Hash::make('password'),
                ]
            );
        }

        if (!User::where('email', 'maria@teste.com')->first()) {
            User::create(
                [
                    'name' => 'Maria',
                    'email' => 'maria@teste.com',
                    'password' => Hash::make('password'),
                ]
            );
        }

        if (!User::where('email', 'gabriel@teste.com')->first()) {
            User::create(
                [
                    'name' => 'Gabriel',
                    'email' => 'gabriel@teste.com',
                    'password' => Hash::make('password'),
                ]
            );
        }

        if (!User::where('email', 'enzo@teste.com')->first()) {
            User::create(
                [
                    'name' => 'Enzo',
                    'email' => 'enzo@teste.com',
                    'password' => Hash::make('password'),
                ]
            );
        }
    }
}
