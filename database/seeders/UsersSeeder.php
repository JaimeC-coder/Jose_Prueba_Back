<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'name' => 'firetensor',
                'email' => 'admin@example.com',
                'password' => 'fire123',
            ],
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'password' => 'password123',
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'password' => 'password123',
            ],
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => 'password123',
            ],
        ];

        foreach ($users as $user) {
            User::create([
                'name' => $user['name'],
                'email' => $user['email'],
                'password' => Hash::make($user['password']),
            ]);
        }

    }
}
