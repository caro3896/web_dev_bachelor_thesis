<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Credits;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'is_admin' => '1',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'is_admin' => '0',
            'password' => Hash::make('kea123'),
        ]);

        Credits::create([
            'amount' => '0',
        ]);
    }
}
