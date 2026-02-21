<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Super Admin'
        ]);
        User::create([
            'name' => 'Admin Erp',
            'username' => 'admintest',
            'email' => 'test@abpeworks.com',
            'password' => Hash::make('password'),
        ]);
    }
}
