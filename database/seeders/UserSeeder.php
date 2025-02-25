<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@crm.com',
            'password' => Hash::make('admin123'),
            'email_verified_at' => now(),
        ]);

        $admin->assignRole('admin');

        $user = User::create([
            'name' => 'Jhon Doe',
            'email' => 'jhon@crm.com',
            'password' => Hash::make('user123'),
            'email_verified_at' => now(),
        ]);

        $user->assignRole('user');

        User::factory()
            ->count(5)
            ->create()
            ->each(function ($user) {
                $user->assignRole('user');
        });

        User::factory()
            ->count(2)
            ->trashed()
            ->create();
    }
}
