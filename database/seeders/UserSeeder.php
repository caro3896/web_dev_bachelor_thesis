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
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'is_admin' => '1',
            'credits' => '2',
            'password' => Hash::make('admin123'),
        ]);

        User::create([
            'name' => 'John Doe',
            'email' => 'john@doe.com',
            'is_admin' => '0',
            'credits' => '5',
            'password' => Hash::make('kea123'),
        ]);
    }
}
