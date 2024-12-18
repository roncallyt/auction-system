<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::firstOrCreate([
            'email' => 'test@example.com',
        ], [
            'name' => 'Administrador',
            'password' => Hash::make('12345678'),
        ]);

        $user->assignRole('administrator');

        $user = User::firstOrCreate([
            'email' => 'user1@example.com',
        ], [
            'name' => 'User 1',
            'password' => Hash::make('12345678'),
        ]);

        $user->assignRole('user');

        $user = User::firstOrCreate([
            'email' => 'user2@example.com',
        ], [
            'name' => 'User 2',
            'password' => Hash::make('12345678'),
        ]);

        $user->assignRole('user');
    }
}
