<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Database\Seeders\CategorySeeder;
use Database\Seeders\CustomerSeeder;
use Database\Seeders\OrderSeeder;
use Database\Seeders\ProductSeeder;
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
        $roleAdmin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Super Admin'
        ]);
        User::create([
            'name' => 'Admin Erp',
            'role_id' => $roleAdmin->id,
            'username' => 'admintest',
            'msisdn' => '+6289783475975',
            'email' => 'test@abpeworks.com',
            'password' => Hash::make('password'),
        ]);

        $this->call([
            CategorySeeder::class,
            CustomerSeeder::class,
            ProductSeeder::class,
            OrderSeeder::class,
        ]);
    }
}
